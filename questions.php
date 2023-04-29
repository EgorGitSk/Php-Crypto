<?php
include "classes/db.classes.php";
include "classes/user.classes.php";
if(!isset($_SESSION))
{
    session_start();
}
if (isset($_SESSION["name"])) {

    $user = new User();
}else {
    header("Location: index.php?error=usersonly");
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
        <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Page</a>
    </li>
</ul>
<div class="jumbotron">
    <br>
    <h2>Questions and Answers</h2>

    <table class="table ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Answer</th>
            <th scope="col">Answered</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $messages = $user->Get_User_Questions_Answers($_SESSION['id']);
        $message = $messages[0];
        $sql = $messages[1];
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo "<tr>";

            echo '<th scope="row">'. $message[$i]["question_id"] .'</th>';
            echo '<td> <abbr title="'.$message[$i]["sent_date"].'">'.$message[$i]["name"].'</abbr></td>';
            echo '<td>'.$message[$i]["email"].'</td>';
            echo '<td>'.$message[$i]["message"].'</td>';
            echo '<td>'.$message[$i]["answer"].'</td>';
            echo '<td>'.$message[$i]["answered"].'</td>';



        }
        ?>
        </tbody>
    </table>





</div>
</body>
</html>
