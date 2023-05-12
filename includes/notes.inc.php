<?php
include "../classes/db.classes.php";
include "../classes/user.classes.php";
$add = new User();
session_start();
if(isset($_POST['add_note'])){
    $_SESSION['popup'] = false;
    $user_id = $_POST['user_id'];
    $title_note = $_POST['title_note'];
    $note_text = $_POST['note_text'];

    $add->Add_Notes($title_note,$note_text,$user_id);
    if(isset($_POST['add_note_main'])){
        header("Location: ../courses.php?error=noteadded");
    }else{
        header("Location: ../notes.php?error=noteadded");
    }

}
if(isset($_POST['delete_note'])){
    $id = $_POST['note_id'];
    $add->Delete_Note($id);
    header("Location: ../notes.php?error=notedeleted");
}
?>