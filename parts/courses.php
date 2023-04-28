<?php
include_once "classes/db.classes.php";
include_once "classes/admin.php";
$admin = new Admin();
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
            $prices = $admin->Get_All_Prices();
            $price = $prices[0];
            $sql = $prices[1];
            for($i = 0; $i < $sql->rowCount(); $i++){
                echo "<tr>";
                echo '<td>'.strtoupper($price[$i]["course"]).'</td>';
                echo '<td>'.$price[$i]["investing"].'</td>';
                echo '<td>'.$price[$i]["mining"].'</td>';
                echo '<td>'.$price[$i]["portfolio"].'</td>';
                echo '<td>'.$price[$i]["price"].'</td>';
                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
    </div>
</section>