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
        <section class="crypto" id="learn-section">
            <h1 class="name">What you'll learn</h1>
            <div class="item">
                <img src="img/wallets.png" alt="" id="crypto-img">
                <div class="present">
                    <ul id="btns">
                        <li><button class="btn active dontHover" id="wallets">Wallets</button> </li>
                        <li><button class="btn" id="mining">Mining</button> </li>
                        <li><button class="btn" id="portfolio">Portfolio</button> </li>
                        <li><button class="btn" id="trade">Trade</button> </li>

                    </ul>
                    <div class="text">
                        <h1 id="crypto-name">Wallets</h1>
                        <p id="crypto-text">Know about 4 types of wallets and how to secure your crypto currency investments</p>
                    </div>
                </div>
            </div>
        </section>
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
        <section class="testimonial-section" id="testimonial-section">
            <h1 class="name grid-span-3">Testimonials</h1>
            <article class="testimonial bg-one grid-span-2"> 
                <div class="flex">
                    <div>
                      <img  src="./img/image-daniel.jpg" alt="daniel clifford">
                    </div>
                    <div>
                      <h2 class="name">Amjad I.</h2>
                      <p class="position">Verified Graduate</p>
                    </div>
                  </div>
                  <p>
                    An excellent introduction in the cryptology world. This training is very good for people which do not have knowledge about cryptocurrencies,
                     but they are willing to learn if they want to invest.
                  </p>
                  
            </article>
            <article class="testimonial bg-two"> 
                <div class="flex">
                    <div>
                      <img  src="./img/image-jonathan.jpg" alt="daniel clifford">
                    </div>
                    <div>
                      <h2 class="name">Massimo T.</h2>
                      <p class="position">Verified Graduate</p>
                    </div>
                  </div>
                  <p>
                    Easy to understand the way of speaking as I am non English native user and
                     the clear outlook which helps me understand the roadmap of the course.
                  </p>
                  
            </article>
            <article class="testimonial bg-three"> 
                <div class="flex">
                    <div>
                      <img  src="./img/image-patrick.jpg" alt="daniel clifford">
                    </div>
                    <div>
                      <h2 class="name">marco M.</h2>
                      <p class="position">Verified Graduate</p>
                    </div>
                  </div>
                  <p>
                    Amazing teacher , funny , super smart guy .
                    thank you so much for that class i love it . hello from canada brother
                    just buy that class it worth every penny. 100%
                  </p>
                  
            </article>
            <article class="testimonial bg-four grid-span-2"> 
                <div class="flex">
                    <div>
                      <img  src="./img/image-daniel.jpg" alt="daniel clifford">
                    </div>
                    <div>
                      <h2 class="name">Ron H.</h2>
                      <p class="position">Verified Graduate</p>
                    </div>
                  </div>
                  <p>
                    Very professional thorough coverage of cryptocurrency considerations, investing, mining. Bonus material showing 
                    how the great spreadsheet was built and the programming logic behind it was very interesting and well explained. 
                  </p>
                  
            </article>
        </section>
        <?php
            include_once "parts/courses.php";
        ?>
        <section class="FAQ" id="faq-section">
            <h1 class="name">FAQ</h1>
            <div class="accordion">
            <div class="content">
                <div class="head">
                    <h1>Who this course is for?</h1><i class="fa-solid fa-plus"></i>
                </div>
                <div class="text">
                    <p>If you are serious about Making Money Online by investing in the Cryptocurrency Market, this course is for you!</p>
                </div>
            </div>
            <div class="content">
                <div class="head">
                    <h1>What exactly will you teach me?</h1><i class="fa-solid fa-plus"></i>
                </div>
                <div class="text">
                    <p>I’ll teach you exactly what to invest in, when to buy, when to sell, and most importantly teach you my best technical analysis techniques that can help you predict the next market move in less than 15 minutes with high-accuracy (and you’ll learn with dozens of real world examples).</p>
                </div>
            </div>
            </div>
        </section>
        <section class="questions" id="questions-section">
            <div class="block">
                <div class="text">
                    <h1>CONTACT US</h1>
                    <h2>Question not answered yet? We are here to help!</h2>
                </div>
                <div class="link">
                    <i class="fa-solid fa-headset"></i>
                    <div class="text">
                        <h1>HELP CENTER</h1>
                        <h2>Got questions?We've got answers!</h2>
                    </div>
                    <a href="contact.php">Contact Us</a>
                </div>
            </div>
        </section>
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
