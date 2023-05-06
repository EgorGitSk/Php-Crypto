<?php
    include_once "classes/db.classes.php";
    include_once "classes/user.classes.php";
    $user = new User();
?>
<section class="crypto" id="learn-section">
    <h1 class="name">What you'll learn</h1>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="owl-carousel owl-theme">
                <?php
                $prices = $user->Get_All_Learning();
                $learn = $prices[0];
                $sql = $prices[1];
                for($i = 0; $i < $sql->rowCount(); $i++){
                    echo '<div class="item mb-4">';
                    echo '<div class="card border-0 bg-black">';
                    echo '<img src="img/learn/'.$learn[$i]["image"].'" class="card-img-top" alt="">';
                    echo '<div class="card-body">';
                    echo '<h1>'.strtoupper($learn[$i]["name"]).'</h1>';
                    echo '<h4>'.$learn[$i]["text"].'</h4>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                ?>

            </div>
        </div>
    </div>
</section>