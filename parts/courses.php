<?php
include_once "classes/db.classes.php";
include_once "functions/prices.php";
?>
<section class="course-price" id="price-section">
    <h1 class="name">Course PRICELIST</h1>
    <div class="table-price">
        <table>
            <thead>
            <tr>
                <th scope="col">Course</th>
                <th scope="col">Investing</th>
                <th scope="col">Mining</th>
                <th scope="col">Portfolio</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            get_prices();
            ?>
            </tbody>
        </table>
    </div>
</section>