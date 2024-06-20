<?php
session_start();

if (isset($_GET['logout'])) {

    $_SESSION = array();

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    session_destroy();

    header("Location: abour-us.php");
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

        <section class="about-us">
            <div class="container">
                <div class="small-heading">
                    <h2 class="header-secondary">About us</h2>
                    <p class="small-title">There will be a small title here</p>
                </div>

                <div class="flex--container flex--container--about">
                    <div class="image">
                        <img class="img-about" src="img/about-us.jpg" alt="about-us-photo" />
                    </div>
                    <div class="text-about">
                        <h3 class="heading-tertiary heading-tertiary--about">
                            Get to know us
                        </h3>
                        <p class="about-us-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Quibusdam
                            similique
                            atque nemo ab a
                            voluptas quia repellat aliquam sed, quisquam veritatis odio. Veniam expedita natus ut, error
                            blanditiis ullam magni. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
                            sint sed illo quaerat. Maiores saepe ratione aspernatur quibusdam unde officiis perspiciatis
                            dolorum porro quaerat est quo earum, ipsam, numquam nihil!</p>
                    </div>
                </div>
            </div>

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