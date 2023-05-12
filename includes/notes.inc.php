<?php
session_start();
if(isset($_POST['add_note'])){
    $_SESSION['popup'] = false;
    $user_id = $_POST['user_id'];
    $title_note = $_POST['title_note'];
    $note_text = $_POST['note_text'];
    include "../classes/db.classes.php";
    include "../classes/user.classes.php";
    $add = new User();
    $add->Add_Notes($title_note,$note_text,$user_id);
    header("Location: ../notes.php?error=noteadded");
}
?>