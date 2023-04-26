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
    <form>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" value="Delete user">
    </form>
    <br>
    <form>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="surname" placeholder="Surname">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" value="Add user">
    </form>
    <h2> Users table</h2>
<table class="jumbotron">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
    </tr>
    <?php
    $admin->Get_All_Users();
    ?>
</table>

    <h2> Prices table</h2>
    <table class="jumbotron">
        <tr>
            <th>Id</th>
            <th>Course</th>
            <th>Investing</th>
            <th>Mining</th>
            <th>Portfolio</th>
            <th>Price</th>
        </tr>
        <?php
        $admin->Get_All_Prices();
        ?>
    </table>

</div>
</body>
</html>
