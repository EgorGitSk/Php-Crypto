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
    <h2>Sections</h2>
    <form action="functions.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="add_section"><br>
        <input type="text" name="title" id="title" placeholder="title"><br>
        <input type="submit" value="Add section">
    </form>
    <table class="table ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">Change</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $sections = $admin->Get_All_Sections();
        $section = $sections[0];
        $sql = $sections[1];
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo "<tr>";
            echo '<form action="functions.php" method="post">';
            echo '<th scope="row">'. $section[$i]["id"] .'</th>>';
            echo '<td>'.'<textarea name="title" cols="40">'.$section[$i]["title"].'</textarea>'.'</td>';
            echo '<td>
            <input type="hidden" name="change_section">
            <input type="hidden" name="id" value="' . $section[$i]["id"] . '">
            <input type="submit" value="Change Section" class="btn btn-outline-success"></form></td>';
            echo '<td><form action="functions.php" method="post">
            <input type="hidden" name="delete_section">
            <input type="hidden" name="id" value="' . $section[$i]["id"] . '">
            <input type="submit" value="Delete Section" class="btn btn-outline-danger"></form></td>';
        }
        ?>
        </tbody>
    </table>
    <br>
    <h2>Lessons</h2>
    <form action="functions.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="add_lesson"><br>
        <input type="text" name="lesson_title" id="lesson_title" placeholder="lesson_title"><br>
        <input type="text" name="link" id="link" placeholder="Link"><br>
        <textarea name="content" cols="60" rows="5"></textarea><br>
        <select name="section_id" id="section_id">
            <?php
            $sections = $admin->Get_All_Sections();
            $section = $sections[0];
            $sql = $sections[1];
            for($i = 0; $i < $sql->rowCount(); $i++){
                echo '<option value="'. $section[$i]["id"] .'">'. $section[$i]["title"] .'</option>';
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Add lesson">
        <br>
    </form>
    <table class="table ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Section_id</th>
            <th scope="col">lesson_title</th>
            <th scope="col">Link</th>
            <th scope="col">Content</th>
            <th scope="col">Change</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $lessons = $admin->Get_All_Lessons();
        $lesson = $lessons[0];
        $sql = $lessons[1];
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo "<tr>";
            echo '<form action="functions.php" method="post">';
            echo '<td>'.$lesson[$i]["section_id"].'</td>';
            echo '<td>'.'<input type="text" value="'.$lesson[$i]["lesson_title"].'" name="lesson_title" size="30" placeholder="'.$lesson[$i]["lesson_title"].'">'.'</td>';
            echo '<td>'.'<input type="text" value="'.$lesson[$i]["link"].'" name="link" size="40" placeholder="'.$lesson[$i]["link"].'">'.'</td>';
            echo '<td>'.'<textarea name="content" cols="40">'.$lesson[$i]["content"].'</textarea>'.'</td>';

            echo '<td>
            <input type="hidden" name="change_lesson">
            <input type="hidden" name="id" value="' . $lesson[$i]["lesson_id"] . '">
            <input type="submit" value="Change Lesson" class="btn btn-outline-success"></form></td>';
            echo '<td><form action="functions.php" method="post">
            <input type="hidden" name="delete_lesson">
            <input type="hidden" name="id" value="' . $lesson[$i]["lesson_id"] . '">
            <input type="submit" value="Delete Lesson" class="btn btn-outline-danger"></form></td>';
        }
        ?>
        </tbody>
    </table>





</div>

</body>
</html>
