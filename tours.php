<label?php
session_start();

if (isset($_GET['logout'])) {

    $_SESSION = array();

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    session_destroy();

    header("Location: tours.php");
    exit;
}

$authenticated = false;
if (isset($_COOKIE['user_name']) && isset($_COOKIE['user_type'])) {
    if (isset($_SESSION['user_name']) && isset($_SESSION['user_type']) &&
        $_SESSION['user_name'] === $_COOKIE['user_name'] &&
        $_SESSION['user_type'] === $_COOKIE['user_type']) {
        $authenticated = true;
    }
}

$signed_up = false; 
if ($signed_up) {
    $authenticated = true; 
    $_SESSION['user_name'] = $_COOKIE['user_name'];
    $_SESSION['user_type'] = $_COOKIE['user_type'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="css/style.css" />

    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
</head>

<body>

<header class="header">
        <h1>
            <a href="index.php">
                <img class="logo" alt="Logo" src="img/logo.png" />
            </a>
        </h1>
        <nav class="main-nav">
            <ul class="main-nav-list">
                <li class="list-item"><a class="main-nav-link" href="index.php">Main</a></li>
                <li class="list-item"><a class="main-nav-link" href="about-us.php">About us</a></li>
                <li class="list-item"><a class="main-nav-link" href="tours.php">Tours</a></li>
                <li class="list-item"><a class="main-nav-link" href="gallery.php">Gallery</a></li>
         <?php if ($authenticated): ?>
                <li class="list-item mob-item"><a class="main-nav-link" href="index.php?logout=true">Log Out</a></li>
         <?php else: ?>
                <li class="list-item mob-item"><a class="main-nav-link" href="register-now.php">Register now</a></li>
        <?php endif; ?>
            </ul>
        </nav>
        <?php if ($authenticated): ?>
                <ul>
                    <li class="nav-logout">
                        <a class="main-nav-link nav-logout" href="index.php?logout=true">Log Out</a>
                    </li>
                     <div class="hamburger">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                     </div>

                </ul>
        <?php else: ?>
                <ul>
                    <li class="nav-book-tour">
                        <a class="main-nav-link nav-book-tour" href="register-now.php">Register now</a>
                    </li>
                     <div class="hamburger">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                     </div>

                </ul>

        <?php endif; ?>
    </header>

    <main>
        <section class="main-section">
            <div class="text-box">
                <h1 class="header-primary">Time to Travell</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est voluptatem
                    neque optio, explicabo facere non suscipit iure, doloremque odit
                    repellat incidunt? Illum quod qui ut consequuntur voluptatibus deserunt tempora</p>
            </div>

            <div class="cards">
                <div class="card">
                    <ion-icon class="icon" name="map-outline"></ion-icon>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia vitae officia ratione quos
                            blanditiis temporibus ex impedit nihil, voluptatem eos beatae cupiditate doloribus
                            doloremque nemo</p>
                        <a href="#" class="more-detailed">More detailed &rarr;</a>
                    </div>
                </div>

                <div class="card">
                    <ion-icon class="icon" name="map-outline"></ion-icon>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia vitae officia ratione quos
                            blanditiis temporibus ex impedit nihil, voluptatem eos beatae cupiditate doloribus
                            doloremque nemo</p>
                        <a href="#" class="more-detailed">More detaled &rarr;</a>
                    </div>
                </div>

                <div class="card">
                    <ion-icon class="icon" name="map-outline"></ion-icon>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia vitae officia ratione quos
                            blanditiis temporibus ex impedit nihil, voluptatem eos beatae cupiditate doloribus
                            doloremque nemo</p>
                        <a href="#" class="more-detailed">More detaled &rarr;</a>
                    </div>
                </div>

            </div>
        </section>

        <section class="tours-search">
            <div class="container">
                <div class="head">
                    <div class="search-box">
                        <form action="" onsubmit="return false">
                            <label for="search" class="tours-filter">Tours filter</label>
                            <input type="text" id="search" placeholder="Search Tour" />
                        </form>
                    </div>

                    <div class="filter-box">
                        <a href="book-tour.html" class="btn" data-filter="all">All</a>
                        <a href="book-tour.html" class="btn" data-filter="italy">Italy</a>
                        <a href="book-tour.html" class="btn" data-filter="spain">Spain</a>
                        <a href="book-tour.html" class="btn" data-filter="portugal">Portugal</a>
                        <a href="book-tour.html" class="btn" data-filter="england">England</a>
                        <a href="book-tour.html" class="btn" data-filter="germany">Germany</a>
                        <a href="book-tour.html" class="btn" data-filter="belgium">Belgium</a>
                        <a href="book-tour.html" class="btn" data-filter="netherlands">Netherlands</a>
                        <a href="book-tour.html" class="btn" data-filter="sweden">Sweden</a>
                    </div>
                </div>

                <div class="slide-container">
                    <div class="container--for-grid" id="store-products">

                        <div class="store-product italy">
                            <img src="img/milano.jpeg" class="tours-images" alt="Milano, Italy" />
                            <div class="tours-detail">
                                <h3>Italy, Milano</h3>
                                <p class="tours-paragraph"><span>$569.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product italy">
                            <img src="img/rome.jpeg" class="tours-images" alt="Rome, Italy" />
                            <div class="tours-detail">
                                <h3>Italy, Rome</h3>
                                <p class="tours-paragraph"><span>$749.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product spain">
                            <img src="img/barcelona.jpeg" class="tours-images" alt="Barcelona, Spain" />
                            <div class="tours-detail">
                                <h3>Spain, Barcelona</h3>
                                <p class="tours-paragraph"><span>$699.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product spain">
                            <img src="img/madrid.jpeg" class="tours-images" alt="Madrid, Spain" />
                            <div class="tours-detail">
                                <h3>Spain, Madrid</h3>
                                <p class="tours-paragraph"><span>$554.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product portugal">
                            <img src="img/pontapiedade.jpeg" class="tours-images" alt="Ponta Piedade, Portugal" />
                            <div class="tours-detail">
                                <h3>Portugal, Ponta Piedade</h3>
                                <p class="tours-paragraph"><span>$569.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product england">
                            <img src="img/london.jpeg" class="tours-images" alt="London, England" />
                            <div class="tours-detail">
                                <h3>England, London</h3>
                                <p class="tours-paragraph"><span>$869.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product germany">
                            <img src="img/berlin.jpeg" class="tours-images" alt="Berlin, Germany" />
                            <div class="tours-detail">
                                <h3>Germany, Berlin</h3>
                                <p class="tours-paragraph"><span>$589.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product germany">
                            <img src="img/Hamburg.jpeg" class="tours-images" alt="Hamburg, Germany" />
                            <div class="tours-detail">
                                <h3>Germany, Hamburg</h3>
                                <p class="tours-paragraph"><span>$459.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product belgium">
                            <img src="img/brussel.jpeg" class="tours-images" alt="Brussel, Belgium" />
                            <div class="tours-detail">
                                <h3>Belgium, Brussel</h3>
                                <p class="tours-paragraph"><span>$659.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product belgium">
                            <img src="img/Antwerpn.jpeg" class="tours-images" alt="Antwerpn, Belgium" />
                            <div class="tours-detail">
                                <h3>Belgium, Antwerpn</h3>
                                <p class="tours-paragraph"><span>$499.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product netherlands">
                            <img src="img/amsterdam.jpeg" class="tours-images" alt="Amsterdam, Netherlands" />
                            <div class="tours-detail">
                                <h3>Netherlands, Amsterdam</h3>
                                <p class="tours-paragraph"><span>$769.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>

                        <div class="store-product sweden">
                            <img src="img/stockholm.jpeg" class="tours-images" alt="Stockholm, Sweden" />
                            <div class="tours-detail">
                                <h3>Sweden, Stockholm</h3>
                                <p class="tours-paragraph"><span>$865.99</span></p>
                                <a href="#">Buy a tour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="container grid grid--footer">
            <div class="logo-col">
                <a href="#" class="footer-logo">
                    <img class="logo-footer" alt="logo" src="img/logo.png" />
                </a>

                <ul class="social-links">
                    <li>
                        <a class="footer-link" href="#"><ion-icon class="social-icon"
                                name="logo-instagram"></ion-icon></a>
                    </li>
                    <li>
                        <a class="footer-link" href="#"><ion-icon class="social-icon"
                                name="logo-facebook"></ion-icon></a>
                    </li>
                    <li>
                        <a class="footer-link" href="#"><ion-icon class="social-icon"
                                name="logo-twitter"></ion-icon></a>
                    </li>
                </ul>

                <p class="copyright">
                    Copyright &copy; 2024 by Retro, Inc. All rights reserved.
                </p>
            </div>
            <div class="address-col">
                <p class="footer-heading">Contact us</p>
                <address class="contacts">
                    <p class="address">
                        Tbilis Ganivi
                    </p>
                    <p>
                        <a class="footer-link" href="tel:415-201-6370">415-201-6370</a><br />
                        <a class="footer-link" href="mailto:hello@omnifood.com">travelling.com</a>
                    </p>
                </address>
            </div>

            <nav class="nav-col">
                <p class="footer-heading">Company</p>
                <ul class="footer-nav">
                    <li><a class="footer-link" href="#">About our company</a></li>
                    <li><a class="footer-link" href="#">For Business</a></li>
                    <li><a class="footer-link" href="#">Partners</a></li>
                    <li><a class="footer-link" href="#">Careers</a></li>
                </ul>
            </nav>

            <nav class="nav-col">
                <p class="footer-heading">Resources</p>
                <ul class="footer-nav">
                    <li><a class="footer-link" href="#">Recipe directory </a></li>
                    <li><a class="footer-link" href="#">Help center</a></li>
                    <li><a class="footer-link" href="#">Privacy & terms</a></li>
                </ul>
            </nav>
        </div>
    </footer>

    <script src="search.js"></script>
    <script src="index.js"></script>
</body>
</html>