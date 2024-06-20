<?php

@include 'config.php';

if(isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user-type'];


   $select = "SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0) {
      $error[] = 'Email already exists!'; 
   } else {
      if($pass != $cpass) {
         $error[] = 'Passwords do not match!';
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location: signin_form.php'); 
         exit; 
      }
   }

}

if(!empty($error)) {
   foreach($error as $err) {
      echo '<p>' . $err . '</p>';
   }
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
                <!-- <li><a class="main-nav-link nav-book-tour" href="book-tour.html">Book a tour</a></li> -->
            </ul>
        </nav>
        <a class="main-nav-link nav-book-tour" href="register-now.php">Register now</a>
    </header>
    <main>
        <section class="form-section">
            <div class="container">
                <div class="form-container">
                    <form action="register-now.php" method="post">
                        <h3 class="heading-tertiary">Register now</h3>
                        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
                        <input type="text" name="name" required placeholder="Enter your name" />
                        <input type="email" name="email" required placeholder="Enter your email" />
                        <input type="password" name="password" required placeholder="Enter your password" />
                        <input type="password" name="cpassword" required placeholder="Confirm your password" />
                        <select name="user-type">
                            <option value="user">User</option>
                            <option value="admin">Administrator</option>
                        </select>
                        <input type="submit" name="submit" value="Register now" class="form-btn">
                        <p>Already have an account? <a href="signin_form.php">Sign in</a></p>
                    </form>
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
</body>

</html>