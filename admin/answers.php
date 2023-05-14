<?php
session_start();
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
    include "../classes/db.classes.php";
    include "../classes/admin.classes.php";
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
<?php
include_once "parts/nav.php";
?>
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
            <th scope="col">Submit</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $messages = $admin->Get_All_Questions_Answers();
        $message = $messages[0];
        $sql = $messages[1];
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo "<tr>";
            echo '<form action="functions.php" method="post">';
            echo '<th scope="row">'. $message[$i]["question_id"] .'</th>>';
            echo '<td> <abbr title="'.$message[$i]["sent_date"].'">'.$message[$i]["name"].'</abbr></td>';
            echo '<td>'.$message[$i]["email"].'</td>';
            echo '<td>'.$message[$i]["message"].'</td>';
            echo '<td>'.'<textarea name="answer" cols="40">'.$message[$i]["answer"].'</textarea>'.'</td>';

            if(isset($message[$i]['answered'])){
                echo '<td>'.'<input type="text" value="'.$message[$i]["answered"].'" name="answered" size="5" placeholder="'.$message[$i]["answered"].'">'.'</td>';
            }else{
                echo '<td>'.'<input type="text" value="Admin" name="answered" size="5" placeholder="'.$message[$i]["answered"].'">'.'</td>';
            }
            echo '<td>
            <input type="hidden" name="change_answer">
            <input type="hidden" name="id" value="' . $message[$i]["question_id"] . '">
            <input type="submit" value="Submit Answer" class="btn btn-outline-success"></form></td>';

        }
        ?>
        </tbody>
    </table>





</div>
</body>
</html>
