<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location: index.php?error=none");
}else {
include_once "classes/db.classes.php";
include_once "classes/user.classes.php";
$user = new User();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title></title>
</head>
<body>
<!--Preloader start-->

<div class="preloader">
    <span></span>
</div>

<!--Preloader end-->

<header class="header">
    <div class="header__container">


        <a href="index.php" class="header__logo">CRYPTO</a>

        <div class="header__search">

        </div>
        <a  href="account.php" style="text-decoration:none;">Go to User Page</a>
        <div class="header__toggle">
            <i class="fas fa-bars"id="header-toggle"></i>

        </div>
    </div>
</header>

<!--========== NAV ==========-->
<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="index.php" class="nav__link nav__logo">
                <i class='bx bx-bitcoin' ></i>
                <span class="nav__logo-name">CRYPTO</span>
            </a>
            <div class="nav__list">
                <div class="nav__items">
                    <a href="index.php" class="nav__link active">
                        <i class="fas fa-home"></i>
                        <span class="nav__name">Home</span>
                    </a>
                </div>
                <?php
                $result = $user->Get_All_Sections_Lessons();
                $sl = $result[0];
                $sql = $result[1];
                $current_section = '';
                for($i = 0; $i < $sql->rowCount(); $i++){

                    if ($sl[$i]['section_title'] != $current_section) {
                        echo '<a href="index.php" class="nav__link active">';
                        echo '<i class="fas fa-dot-circle"></i>';
                        echo '<span class="nav__name">'.$sl[$i]['section_title'].'</span>';
                        $current_section = $sl[$i]['section_title'];
                        echo '</a>';

                    }
                    echo '<a href="parts/lesson_redirect.php?lesson_id='.$sl[$i]['lesson_id'].'" class="nav__dropdown-item" id="les1-1"> <i class="fas fa-dot-circle"></i> '.$sl[$i]['lesson_title'].'</a>';
                }
                ?>
                <a href="contact.php" class="nav__link active">
                    <i class="fas fa-phone"></i>
                    <span class="nav__name">Contact us</span>
                </a>
                <a href="includes/logout.inc.php" class="nav__link nav__logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav__name">Log Out</span>
                </a>
    </nav>
</div>

<!--========== CONTENTS ==========-->
<main>
    <section>
        <div class="videoWrapper">
            <!-- Copy & Pasted from YouTube -->
            <?php
            if(isset($_SESSION['video_link'])){
                echo '<iframe width="560" height="315" src="'.$_SESSION['video_link'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="ifr"></iframe>';
            }else{
                echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/AMcXbvZuLrg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="ifr"></iframe>';
            }
            ?>
        </div>
    </section>
    <div class="lesson-overview">
        <div class="overview">
            <p>Overview</p>
        </div>
        <div class="description"><p>About this lesson</p></div>
        <?php
        if(isset($_SESSION['lesson_description'])){
            echo '<div class="description-p"><p>'.$_SESSION['lesson_description'].'</p></div>';
        }else{
            echo '<div class="description-p"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus ut voluptate deserunt maxime aliquid ullam ducimus, provident doloribus aspernatur assumenda atque odit! Nemo repellat nisi dolorem ipsum unde tempore, tempora ducimus placeat aspernatur voluptatem laborum, odit quam. Consequatur, perspiciatis nulla quia porro corrupti voluptates adipisci laboriosam consequuntur neque earum? Veniam?</p></div>';
        }
        ?>
        <div class="description"><p>Requirements</p></div>
        <ul>
            <li><i class="fas fa-check"></i>Any computer will work: Windows, macOS or Linux</li>
            <li><i class="fas fa-check"></i>Wallet</li>
            <li><i class="fas fa-check"></i>Accounts</li>

        </ul>
    </div>
</main>

<!--========== MAIN JS ==========-->
<script src="js/main-courses.js"></script>
<script src="js/app.js"></script>
<script src="js/lessons.js"></script>
</body>
</html>
<?php
}
unset($_SESSION['lesson_description']);
unset($_SESSION['video_link']);
?>