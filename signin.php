<!DOCTYPE html>
<html lang="en">
<?php
include_once "parts/head.php";
session_start();
if (isset($_SESSION["name"])) {
    header("Location: index.php?error=none");
}else {
if (isset($_SESSION['errors'])) {
    // get the errors array from the session
    $errors = $_SESSION['errors'];
}
?>
<body class="sign-bg">
    <section class="sign">
            <div class="close-page">
                <a href="index.php">
                <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
            <form action="includes/login.inc.php" id="signin-form" class="signup-form" method="POST">
                <div class="head grid-span-2">
                    <h1>Sign In To Crypto</h1>
                </div>
                <div class="input-text">
                <input type="text" id="email" name="name" placeholder="Name:" >
                    <?php
                    if (isset($_SESSION['errors']) and in_array('userNotFound', $errors)) {
                        echo '<div class="error">User does not exist</div>';
                    }
                    ?>
                </div>  
                <div class="input-text">
                <input type="password" id="password" name="pwd" placeholder="password:" >
                    <?php
                    if (isset($_SESSION['errors']) and in_array('passwordNotMatch', $errors)) {
                        echo '<div class="error">Password is incorrect!</div>';
                    }
                    ?>
                </div>
                <div class="input-submit">
                <input type="submit" name="submit" value="Sign in">
                </div>
                <div class="change-page">
                    <a href="signup.php">Sign Up</a>
            </form>
    </section>
    <script src="js/form.js"></script>
</body>
</html>
<?php
}
unset($_SESSION['errors']);
?>