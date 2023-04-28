<!DOCTYPE html>
<html lang="en">
<?php
include_once "parts/head.php";
session_start();
?>
<body class="bg-black contact-bg">
  <header>

    <nav>
        <h1 class="logo">Crypto</h1>
        <ul class="nav-menu">
            <li><a href="index.php"><span class="go-back">Go to the Home Page</span></a></li>
        </ul>
        <div></div>
        <div class="burger-menu" ><i class="fa-solid fa-bars" ></i></div>
    </nav>
</header>
<div class="contact-head">
  <h1>Contact Us</h1>
  <h2>Any question or remarks? Just write us a message</h2>
</div>
<div class="center">
  <div class="contact-info">
    <div class="text">
    <h2>Contact Information</h2>
    <p>Fill up the form and our Team will get back to you within 24 hours</p>
  </div>
    <ul>
      <li><i class="fa-solid fa-phone"></i><a href="tel:123-456-7890">  +0000000000</a></li>
      <li><i class="fa-sharp fa-solid fa-envelope"></i><a href="mailto:crypto@gmail.com">  crypto@gmail.com</a></li>
      <li><i class="fa-sharp fa-solid fa-location-dot"></i>  New York</li>
    </ul>
    <div class="social">
      <ul>
          <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
          <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
          <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
      </ul>
  </div>
  </div>
<div class="contact-form">
  <form action="includes/contact.inc.php" method="post">
      <div class="form-row">
      <?php
          echo '
                  <input type="hidden" name="send_question">
                  <input type="hidden" class="contact-form" name="user_id" value="' . $_SESSION["id"] . '">
                  <input type="text" name="name" class="contact-form" placeholder="First name" value="' . $_SESSION["name"] . '">
                  <input type="email" name="email" class="contact-form" placeholder="Email" value="' . $_SESSION["email"] . '"> ';
      ?>
    </div>

    <div class="form-row">
    <textarea name="message" id="" placeholder="Your Message" required></textarea>
  </div>
  <div class="form-row">
    <input type="submit" name="submit" id="">
  </div>
  </form>
</div>
</div>
</div>
<script src="js/app.js"></script>
</body>
</html>