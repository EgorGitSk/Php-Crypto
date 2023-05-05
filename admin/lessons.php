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
</ul>
<div class="jumbotron">
    <br>
    <h2>Sections</h2>
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
            echo '<td>'.'<textarea name="answer" cols="40">'.$section[$i]["title"].'</textarea>'.'</td>';
            echo '<td>
            <input type="hidden" name="change_section">
            <input type="hidden" name="id" value="' . $section[$i]["id"] . '">
            <input type="submit" value="Change Section" class="btn btn-outline-success"></form></td>';
            echo '<td>
            <input type="hidden" name="delete_section">
            <input type="hidden" name="id" value="' . $section[$i]["id"] . '">
            <input type="submit" value="Delete Section" class="btn btn-outline-danger"></form></td>';
        }
        ?>
        </tbody>
    </table>
    <br>
    <h2>Lessons</h2>
    <table class="table ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">lesson_id</th>
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
            echo '<td>'.$lesson[$i]["lesson_id"].'</td>';
            echo '<td>'.$lesson[$i]["section_id"].'</td>';
            echo '<td>'.$lesson[$i]["lesson_title"].'</td>';
            echo '<td>'.$lesson[$i]["link"].'</td>';
            echo '<td>'.'<textarea name="answer" cols="40">'.$lesson[$i]["content"].'</textarea>'.'</td>';

            echo '<td>
            <input type="hidden" name="change_lesson">
            <input type="hidden" name="id" value="' . $lesson[$i]["lesson_id"] . '">
            <input type="submit" value="Change Lesson" class="btn btn-outline-success"></form></td>';
            echo '<td>
            <input type="hidden" name="delete_lesson">
            <input type="hidden" name="id" value="' . $lesson[$i]["lesson_id"] . '">
            <input type="submit" value="Delete Lesson" class="btn btn-outline-danger"></form></td>';
        }
        ?>
        </tbody>
    </table>





</div>

        <?php
        $result = $admin->Get_All_Sections_Lessons();
        $sl = $result[0];
        $sql = $result[1];
        $current_section = '';
        for($i = 0; $i < $sql->rowCount(); $i++){
            if ($sl[$i]['section_title'] != $current_section) {
                echo '<div class="nav__items">
                      <div class="nav__dropdown">';
                echo '<a href="#" class="nav__link">';
                echo '<i class="fas fa-dot-circle"></i>';
                echo '<span class="nav__name">'.$sl[$i]['section_title'].'</span>';
                echo "<i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i></a>";
                // Set the current section to the new section
                $current_section = $sl[$i]['section_title'];
            }
            echo '<div class="nav__dropdown-collapse">
                    <div class="nav__dropdown-content">';
            // Print the lesson for the current section
            echo '<a href="#" class="nav__dropdown-item" id="les1-1">'.$sl[$i]['lesson_title'].'</a>';
            echo '</div>
                </div>    
                </div>
                </div>';
        }
        ?>

</body>
</html>
