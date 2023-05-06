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
    <h2> Modify Learning table</h2>
    <form action="functions.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="add_learning"><br>
        <input type="text" name="name" id="name" placeholder="name"><br>
        <textarea name="text" cols="60" rows="5"></textarea><br>
        <input type="file" name="image"><br>
        <input type="submit" value="Add Learning">
    </form>
    <h2>Learning table</h2>
    <table class="table ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Text</th>
            <th scope="col">Image</th>
            <th scope="col">Change</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $prices = $admin->Get_All_Learning();
        $learn = $prices[0];
        $sql = $prices[1];
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo "<tr>";
            echo '<form action="functions.php" method="post">';
            echo '<th scope="row">'. $learn[$i]["id"] .'</th>>';
            echo '<td>'.'<input type="text" value="'.$learn[$i]["name"].'" name="name" size="50" placeholder="'.$learn[$i]["id"].'">'.'</td>';
            echo '<td>'.'<textarea name="text" cols="60" rows="5">'.$learn[$i]["text"].'</textarea>'.'</td>';
            echo '<td>'.'<img src="../img/learn/'.$learn[$i]["image"].'" width="200" height="200" alt="">'.'</td>';

            echo '<td>
            <input type="hidden" name="change_learning">
            <input type="hidden" name="id" value="' . $learn[$i]["id"] . '">
            <input type="submit" value="Change data" class="btn btn-outline-success"></form></td>';
            echo '<td><form action="functions.php" method="post">
            <input type="hidden" name="delete_learning">
            <input type="hidden" name="id" value="' . $learn[$i]["id"] . '">
            <input type="submit" value="Delete Learning" class="btn btn-outline-danger"></form></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

</div>
</body>
</html>
