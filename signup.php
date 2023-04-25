<!DOCTYPE html>
<html lang="en">
<?php
include_once "parts/head.php";
session_start();
if (isset($_SESSION["name"])) {
    header("Location: index.php?error=none");
}else {
?>
<body class="sign-bg">
    <section class="sign">
            <div class="close-page">
                <a href="index.php">
                <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
            
            <form action="includes/signup.inc.php" class="signup-form" id="signup-form" method="POST">
                <div class="head grid-span-2">
                    <h1>Sign Up To Crypto</h1>
                    <h2>And Start Learning</h2>
                </div>
                <div class="input-text ">
                    <input type="text" id="name" name="name" placeholder="Name:" required>
                    <div class="error"></div>
                </div>
                </div>
                <div class="input-text">
                    <input type="text" id="surname" name="surname" placeholder="Surname:" required>
                    <div class="error"></div>
                </div>
                </div>
                <div class="input-text">
                <input type="email" id="email" name="email" placeholder="Email:" required>
                <div class="error"></div>
                </div>  
                <div class="input-text">
                <input type="password" id="password" name="pwd" placeholder="password:" required>
                <div class="error"></div>
                </div>
                <div class="input-text">
                    <input type="password" id="password" name="rpwd" placeholder="password repeat:" required>
                    <div class="error"></div>
                </div>
                <div class="input-submit">
                <input type="submit" name="submit" value="Sign Up">
                </div>
                <div class="change-page">
                    <a href="signin.php">Sign In</a>
            </form>
    </section>
<script src="js/form.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>