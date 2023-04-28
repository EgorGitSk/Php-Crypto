<!DOCTYPE html>
<html lang="en">
<?php
include_once "parts/head.php";
session_start();
if (isset($_SESSION["name"])) {
    header("Location: index.php?error=none");
}else {
    // check if there are any errors in the session
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
            
            <form action="includes/signup.inc.php" class="signup-form" id="signup-form" method="POST">
                <div class="head grid-span-2">
                    <h1>Sign Up To Crypto</h1>
                    <h2>And Start Learning</h2>
                </div>
                <div class="input-text ">
                    <input type="text" id="name" name="name" placeholder="Name:" >
                    <?php
                    if (isset($_SESSION['errors']) and in_array('nametaken', $errors)) {
                        echo '<div class="error">Name is already taken</div>';
                    }
                    ?>

                </div>
                </div>
                <div class="input-text">
                    <input type="text" id="surname" name="surname" placeholder="Surname:" >
                    <div class="error"></div>
                </div>
                </div>
                <div class="input-text">
                <input type="email" id="email" name="email" placeholder="Email:" >
                    <?php
                    if (isset($_SESSION['errors']) and in_array('invalidemail', $errors)) {
                        echo '<div class="error">Email is invalid</div>';
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['errors']) and in_array('emailtaken', $errors)) {
                        echo '<div class="error">Email is already taken</div>';
                    }
                    ?>
                </div>  
                <div class="input-text">
                <input type="password" id="password" name="pwd" placeholder="password:" >
                    <?php
                    if (isset($_SESSION['errors']) and in_array('invalidepassword', $errors)) {
                        echo '<div class="error">Password does not match</div>';
                    }
                    ?>
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
unset($_SESSION['errors']);
?>