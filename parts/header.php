<?php

?>
<header>
    <nav>
        <h1 class="logo">Crypto</h1>
        <ul class="nav-menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#learn-section">What you'll learn</a></li>
            <li><a href="#price-section">Prices</a></li>
            <li><a href="#faq-section">FAQ</a></li>

            <?php
            if(isset($_SESSION["name"])){

            ?>
                <li><a href="#questions-section">Contact Us</a></li>
                <li><a href="includes/logout.inc.php">Logout</a></li>
            <?php
            }
            ?>
            <?php
            if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1){

                ?>
                <li><a href="admin/admin.php">Admin</a></li>

                <?php
            }
            ?>
        </ul>
        <div></div>
        <div class="burger-menu" ><i class="fa-solid fa-bars" ></i></div>
    </nav>
</header>