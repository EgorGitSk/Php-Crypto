<?php
    include "classes/db.classes.php";
    include "classes/courses.php";
    $courses = new Courses();
    $course = $courses->Get_All_Courses();
    $main = $course[0];
    $sql = $course[1];
    $section = "";
    for($i = 0; $i < $sql->rowCount(); $i++){
        if ($main[$i]["section"] != $section) {
            // If the section has changed, display the section header
            echo "<h2>" . $main[$i]["section"] . "</h2>";
            $section = $main[$i]["section"];
        }

        echo $main[$i]["lesson"] . "<br>";

    }
?>