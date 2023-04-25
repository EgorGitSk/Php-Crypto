<?php
session_start();
?>
<header>
    <nav>
        <h1 class="logo">Crypto</h1>
        <ul class="nav-menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#learn-section">What you'll learn</a></li>
            <li><a href="#crypto-section">Crypto</a></li>
            <li><a href="#testimonial-section">Testimonial</a></li>
            <li><a href="#price-section">Prices</a></li>
            <li><a href="#faq-section">FAQ</a></li>

            <?php
            if(isset($_SESSION["username"])){

            ?>
                <li><a href="#questions-section">Contact Us</a></li>
                <li><a href="../courses.php">Courses</a></li>
                <li><a href="../includes/logout.inc.php">Logout</a></li>
            <?php
            }
            ?>
        </ul>
        <div></div>
        <div class="burger-menu" ><i class="fa-solid fa-bars" ></i></div>
    </nav>
</header>