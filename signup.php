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
            
            <form action="thank.php" class="signup-form" id="signup-form">
                <div class="head grid-span-2">
                    <h1>Sign Up To Crypto</h1>
                    <h2>And Start Learning</h2>
                </div>
                <div class="input-text ">
                <input type="text" id="name" placeholder="Name:" required>
                <div class="error"></div>
                </div>
                <div class="input-text">
                <input type="text" id="surname" placeholder="Surname:" required>
                <div class="error"></div>
                </div>
                <div class="input-text">
                <input type="email" id="email" placeholder="Email:" required>
                <div class="error"></div>
                </div>  
                <div class="input-text">
                <input type="password" id="password" placeholder="password:" required>
                <div class="error"></div>
                </div>
                <div class="input-submit">
                <input type="submit" value="Sign Up">
                </div>
                <div class="change-page">
                    <a href="signin.php">Sign In</a>
            </form>
    </section>
<script src="js/form.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>