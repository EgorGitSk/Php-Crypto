<?php
include_once "classes/db.classes.php";
include_once "classes/admin.classes.php";
$admin = new Admin();
?>
<section class="FAQ" id="faq-section">
    <h1 class="name">FAQ</h1>
    <div class="accordion">
        <?php
        $prices = $admin->Get_All_Faqs();
        $faq = $prices[0];
        $sql = $prices[1];
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo '<div class="content">';
            echo '<div class="head">';
            echo '<h1>'.strtoupper($faq[$i]["name"]).'</h1><i class="fa-solid fa-plus"></i>';
            echo '</div>';
            echo '<div class="text">';
            echo '<p>'.$faq[$i]["text"].'</p>';
            echo '</div>';
            echo '</div>';
        }

        ?>
    </div>
</section>

