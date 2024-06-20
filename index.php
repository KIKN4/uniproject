<?php
session_start();

if (isset($_GET['logout'])) {
    $_SESSION = array();

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    session_destroy();

    header("Location: index.php");
    exit;
}

$authenticated = false;
if (isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
    if (isset($_COOKIE['user_name']) && isset($_COOKIE['user_type']) &&
        $_SESSION['user_name'] === $_COOKIE['user_name'] &&
        $_SESSION['user_type'] === $_COOKIE['user_type']) {
        $authenticated = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
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
                <!-- <ul> -->
                    <!-- <li class="nav-book-tour"> -->
                        <a class="main-nav-link nav-book-tour" href="register-now.php">Register now</a>
                    <!-- </li> -->
                     <div class="hamburger">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                     </div>

                <!-- </ul> -->

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


        <section class="popular-tours">
    <div class="container">
        <div class="small-heading container">
            <h2 class="header-secondary">Popular tours</h2>
            <p class="small-title">There will be a small title here</p>
        </div>

        <div class="images">
            <div class="first-class flex--container">
                <div class="tours-text-box">
                    <p class="tours-number">01</p>
                    <h3 class="heading-tertiary">First title</h3>
                    <p class="tours-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste enim debitis qui dolorem
                        laboriosam, harum tempora alias corrupti esse reprehenderit nobis suscipit temporibus
                        incidunt! Fugiat consectetur harum corrupti iusto debitis.
                    </p>
                </div>
                <div class="tours-img-box">
                    <img src="img/photo-1.jpg" class="tours-img" alt="Travelling" />
                </div>
            </div>

            <div class="second-class flex--container">
                <div class="tours-img-box">
                    <img src="img/photo-2.jpg" class="tours-img" alt="Travelling" />
                </div>
                <div class="tours-text-box">
                    <p class="tours-number">02</p>
                    <h3 class="heading-tertiary">Second title</h3>
                    <p class="tours-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste enim debitis qui dolorem
                        laboriosam, harum tempora alias corrupti esse reprehenderit nobis suscipit temporibus
                        incidunt! Fugiat consectetur harum corrupti iusto debitis.
                    </p>
                </div>
            </div>

            <div class="third-class flex--container">
                <div class="tours-text-box">
                    <p class="tours-number">03</p>
                    <h3 class="heading-tertiary">Third title</h3>
                    <p class="tours-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste enim debitis qui dolorem
                        laboriosam, harum tempora alias corrupti esse reprehenderit nobis suscipit temporibus
                        incidunt! Fugiat consectetur harum corrupti iusto debitis.
                    </p>
                </div>
                <div class="tours-img-box">
                    <img src="img/photo-3.jpg" class="tours-img" alt="Travelling" />
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
    <script src="index.js"></script>
</body>
</html>