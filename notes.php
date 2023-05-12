<?php
include "classes/db.classes.php";
include "classes/user.classes.php";
if(!isset($_SESSION))
{
    session_start();
    $_SESSION['popup'] = false;
}
if (isset($_SESSION["name"])) {

    $user = new User();
    if (isset($_GET['show'])) {
        if ($_GET['show'] == 'true') {
            $_SESSION['popup'] = true;
        } else {
            $_SESSION['popup'] = false;
        }
    }
}else {
    header("Location: index.php?error=usersonly");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Notes App in JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="css/style-notes.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Iconscout Link For Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<?php
if($_SESSION['popup'] == true){
   echo ' <div class="popup-box show">';
}else if($_SESSION['popup'] == false){
    echo ' <div class="popup-box">';
}
?>

    <div class="popup">
        <div class="content">
            <a href="notes.php?show=false">
            <header>

                <p></p>
                <i class="uil uil-times"></i>

            </header>
            </a>
            <form action="includes/notes.inc.php" method="post">
                <input type="hidden" name="add_note">
                <?php

                    echo '<input type="hidden" name="user_id" value="'.$_SESSION["id"].'">';
                ?>
                <div class="row title">
                    <label>Title</label>
                    <input type="text" name="title_note">
                </div>
                <div class="row description">
                    <label>Description</label>
                    <textarea name="note_text" placeholder="Your Note"> </textarea>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
<div class="wrapper">
    <a href="notes.php?show=true">
    <li class="add-box">
        <div class="icon"><i class="uil uil-plus" ></i></div>
        <p>Add new note</p>
    </li>
    </a>
    <?php
    $notes = $user->Ger_All_Notes($_SESSION['id']);
    $note = $notes[0];
    $sql = $notes[1];
    for($i = 0; $i < $sql->rowCount(); $i++){
        echo '<li class="note">
                <div class="details">';
        echo '<p>'. $note[$i]["title_note"] .'</p>';
        echo '<span>'.$note[$i]["note_text"].'</span>';
        echo '</div>
        <div class="bottom-content">';
        echo '<span>'. $note[$i]["date_created"] .'</span>';
        echo '<div class="settings">
                <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
                <ul class="menu ">
                    <li onclick=""><i class="uil uil-pen"></i>Edit</li>
                    <li onclick=""><i class="uil uil-trash"></i>Delete</li>
                </ul>
            </div>';
        echo '</div>
    </li>';


    }
    ?>
</div>


<script src="js/script.js"></script>

</body>
</html>