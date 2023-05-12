<?php
session_start();
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
    include "../classes/db.classes.php";
    include "../classes/admin.php";
    $admin = new Admin();
}else {
    header("Location: index.php?error=adminonly");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title></title>
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>
<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="../index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="faq.php">FAQ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="answers.php">Answers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="learning.php">Learning</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="lessons.php">Lessons</a>
    </li>
</ul>
<div class="jumbotron">
    <br>
    <h2>Modify Users table</h2>
    <form action="functions.php" method="post">
        <input type="hidden" name="add_user">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="surname" placeholder="Surname">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="password">
        <input type="submit" value="Add user">
    </form>
    <h2>Users table</h2>

    <table class="table ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Registered</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

    <?php
    $users = $admin->Get_All_Users();
    $user = $users[0];
    $sql = $users[1];
    for($i = 0; $i < $sql->rowCount(); $i++){
        echo "<tr>";
        echo '<th scope="row">'. $user[$i]["id"] .'</th>';
        echo '<td>'.$user[$i]["created"].'</td>';
        echo '<td>'.$user[$i]["name"] .'</td>';
        echo '<td>'.$user[$i]["surname"] .'</td>';
        echo '<td>'.$user[$i]["email"] .'</td>';
        echo '<td><form action="functions.php" method="post">
            <input type="hidden" name=delete_user">
            <input type="hidden" name="delete">
            <input type="hidden" name="id" value="' . $user[$i]["id"] . '">
            <input type="submit" value="Delete user" class="btn btn-outline-danger"></form></td>';

        echo '</tr>';
    }
    ?>
        </tbody>
    </table>


    <h2> Modify Prices table</h2>
    <form action="functions.php" method="post">
        <input type="hidden" name="add_price">
        <input type="text" name="course" id="course" placeholder="course">
        <input type="text" name="investing" id="investing" placeholder="investing">
        <input type="text" name="mining" placeholder="mining">
        <input type="text" name="portfolio" placeholder="portfolio">
        <input type="text" name="price" placeholder="price">
        <input type="submit" value="Add price">
    </form>
    <h2>Prices table</h2>
    <table class="table ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Course</th>
            <th scope="col">Investing</th>
            <th scope="col">Mining</th>
            <th scope="col">Portfolio</th>
            <th scope="col">Price</th>
            <th scope="col">Change</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $prices = $admin->Get_All_Prices();
        $price = $prices[0];
        $sql = $prices[1];
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo "<tr>";
            echo '<form action="functions.php" method="post">';
            echo '<th scope="row">'. $price[$i]["id"] .'</th>>';
            echo '<td>'.'<input type="text" value="'.$price[$i]["course"].'" name="course" size="50" placeholder="'.$price[$i]["course"].'">'.'</td>';
            echo '<td>'.'<input type="text" value="'.$price[$i]["investing"].'" name="investing" size="5" placeholder="'.$price[$i]["investing"].'">'.'</td>';
            echo '<td>'.'<input type="text" value="'.$price[$i]["mining"].'" name="mining" size="5" placeholder="'.$price[$i]["mining"].'">'.'</td>';
            echo '<td>'.'<input type="text" value="'.$price[$i]["portfolio"].'" name="portfolio" size="5" placeholder="'.$price[$i]["portfolio"].'">'.'</td>';
            echo '<td>'.'<input type="text" value="'.$price[$i]["price"].'" name="price" size="5" placeholder="'.$price[$i]["price"].'">'.'</td>';


            echo '<td>
            <input type="hidden" name="change_price">
            <input type="hidden" name="id" value="' . $price[$i]["id"] . '">
            <input type="submit" value="Change data" class="btn btn-outline-success"></form></td>';
            echo '<td><form action="functions.php" method="post">
            <input type="hidden" name="delete_price">
            <input type="hidden" name="id" value="' . $price[$i]["id"] . '">
            <input type="submit" value="Delete price" class="btn btn-outline-danger"></form></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

</div>
</body>
</html>
