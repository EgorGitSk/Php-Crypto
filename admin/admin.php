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
</ul>
<div class="jumbotron">
    <br>
    <form action="functions.php" method="post">
        <input type="hidden" name="add_user">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="surname" placeholder="Surname">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="password">
        <input type="submit" value="Add user">
    </form>
    <h2> Users table</h2>


    <?php
    $users = $admin->Get_All_Users();
    $user = $users[0];
    $sql = $users[1];
    for($i = 0; $i < $sql->rowCount(); $i++){
        echo 'Id: '. $user[$i]["id"] .'<br>';
        echo 'Name: '.$user[$i]["name"] .'<br>';
        echo 'Surname: '.$user[$i]["surname"] .'<br>';
        echo 'Email: '.$user[$i]["email"] .'<br>';
        echo '<form action="functions.php" method="post">
            <input type="hidden" name="delete">
            <input type="hidden" name="id" value="' . $user[$i]["id"] . '">
            <input type="submit" value="Delete user"></form>';
        echo '---------------------<br>';
    }
    ?>


    <h2> Prices table</h2>
        <?php
        $prices = $admin->Get_All_Prices();
        $price = $prices[0];
        $sql = $prices[1];
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo 'Id: '. $price[$i]["id"] .'<br>';
            echo 'Course: '.$price[$i]["course"].'<br>';
            echo 'Investing: '.$price[$i]["investing"].'<br>';
            echo 'Mining: '.$price[$i]["mining"].'<br>';
            echo 'Portfolio: '.$price[$i]["portfolio"].'<br>';
            echo 'Price: '.$price[$i]["price"].'<br>';
            echo '<form action="functions.php" method="post">
            <input type="hidden" name="delete_price">
            <input type="hidden" name="id" value="' . $price[$i]["id"] . '">
            <input type="submit" value="Delete price"></form>';
            echo '---------------------<br>';
        }
        ?>

</div>
</body>
</html>
