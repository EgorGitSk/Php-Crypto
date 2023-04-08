<!DOCTYPE html>
<html lang="en">
<?php
include_once "parts/head.php";
?>
<body class="sign-bg">
    <section class="sign">
            <div class="close-page">
                <a href="index.php">
                <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
            <form action="thank.php" id="signin-form" class="signup-form">
                <div class="head grid-span-2">
                    <h1>Sign In To Crypto</h1>
                </div>
                <div class="input-text">
                <input type="email" id="email" placeholder="Email:" >
                </div>  
                <div class="input-text">
                <input type="password" id="password" placeholder="password:" >
                </div>
                <div class="input-submit">
                <input type="submit" value="Sign in">
                </div>
                <div class="change-page">
                    <a href="signup.php">Sign Up</a>
            </form>
    </section>
    <script src="js/form.js"></script>
</body>
</html>