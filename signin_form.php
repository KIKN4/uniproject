<?php
@include 'config.php';

session_start();

$error = []; 

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        setcookie('user_name', $row['name'], time() + (86400 * 30), "/");
        setcookie('user_type', $row['user_type'], time() + (86400 * 30), "/");

        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_type'] = $row['user_type'];

        if($row['user_type'] == 'admin' || $row['user_type'] == 'user'){
            header('location:index.php');
            exit;
        }
    } else {
        $error[] = 'Incorrect email or password!'; 
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
            </ul>
        </nav>
        <?php if (isset($_SESSION['user_name']) && isset($_SESSION['user_type'])): ?>
            <li><a class="main-nav-link nav-logout" href="index.php?logout=true">Log Out</a></li>
        <?php else: ?>
            <li><a class="main-nav-link nav-book-tour" href="register-now.php">Register now</a></li>
        <?php endif; ?>
    </header>

    <main>
        <section class="form-section">
            <div class="container">
                <div class="form-container">
                    <form action="signin_form.php" method="post">
                        <h3 class="heading-tertiary">Sign in</h3>
                        <?php
                        if(!empty($error)){
                            foreach($error as $err){
                                echo '<span class="error-msg">' . htmlspecialchars($err) . '</span>';
                            }
                        }
                        ?>
                        <input type="text" name="email" required placeholder="Enter your email" />
                        <input type="password" name="password" required placeholder="Enter your password" />
                        <input type="submit" name="submit" value="Sign in" class="form-btn">
                        <p>Do not have an account? <a href="register-now.php">Register now</a></p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <!-- Footer content -->
    </footer>
</body>

</html>
