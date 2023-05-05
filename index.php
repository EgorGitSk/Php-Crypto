<!DOCTYPE html>
<html lang="en">
<?php
include_once "parts/head.php";
session_start();
?>
<body class="bg-black">
<?php
include_once "parts/header.php";
?>
        <section class="main" id="home">
            <div class="intro">

                <h1>Make your first step</h1>
                <h2>And discover a whole new world</h2>
                <?php
                if(isset($_SESSION["name"])){

                    ?>
                    <h2>Hi <?php echo $_SESSION["name"] . " " .$_SESSION["surname"]; ?>!</h2><br>
                    <a href="courses.php">Go Study</a>
                    <?php
                }else{
                    ?>
                    <a href="signup.php">Start learning</a>

                    <?php
                }
                ?>


            </div>
        </section>
        <?php
            include_once "parts/learning.php";
        ?>
        <section class="crypto-prices" id="crypto-section">
            <h1 class="name">Crypto Prices</h1>
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item mb-4">
                            <div class="card border-0 bg-black">
                                    <img src="img/bitcoin.png" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h1>Bitcoin</h1>
                                        <h4>$<span id="bitcoin_2"></span></h4>
                                    </div>
                            </div>
                        </div>
                        <div class="item mb-4">
                            <div class="card border-0 bg-black">
                                    <img src="img/ethereum.png" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h1>Ethereum</h1>
                                        <h4>$<span id="ethereum_2"></span></h4>
                                    </div>
                            </div>
                        </div>
                        <div class="item mb-4">
                            <div class="card border-0 bg-black">
                                    <img src="img/litecoin.png" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h1>LiteCoin</h1>
                                        <h4>$<span id="litecoin_2"></span></h4>
                                    </div>
                            </div>
                        </div>
                        <div class="item mb-4">
                            <div class="card border-0 bg-black">
                                    <img src="img/monero.png" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h1>Monero</h1>
                                        <h4>$<span id="monero_2"></span></h4>
                                    </div>
                            </div>
                        </div>
                        <div class="item mb-4">
                            <div class="card border-0 bg-black">
                                    <img src="img/NEM.png" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h1>Nem</h1>
                                        <h4>$<span id="nem_2"></span></h4>
                                    </div>
                            </div>
                        </div>
                        <div class="item mb-4">
                            <div class="card border-0 bg-black">
                                    <img src="img/RIPPLE.png" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h1>Ripple</h1>
                                        <h4>$<span id="ripple_2"></span></h4>
                                    </div>
                            </div>
                        </div>
                        <div class="item mb-4">
                            <div class="card border-0 bg-black">
                                    <img src="img/DASH.png" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h1>Dash</h1>
                                        <h4>$<span id="dash_2"></span></h4>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            include_once "parts/testimonials.php";
        ?>
        <?php
            include_once "parts/courses.php";
        ?>
        <?php
        include_once "parts/faq.php";
        ?>

        <?php
        if(isset($_SESSION['name'])){
            include_once "parts/contact.php";
        }

        ?>
        <div class="cookies-container">
            <p>Our website uses cookies to improve your experience.</p>
            <button class="cookie-btn">Okay</button>
        </div>
<?php
include_once "parts/footer.php"
?>
        <script src="js/instructors.js"></script>
        <script src="js/crypto.js"></script>
        <script src="js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script>
            $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay: true,
    slideSpeed : 800,
    autoplayTimeout:3000,
    stopOnHover : true,

    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
        </script>
</body>
</html>
