<?php
include "../classes/db.classes.php";
include "../classes/user.classes.php";
$get = new User();
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_POST['add_note'])){
    $_SESSION['popup'] = false;
    $user_id = $_POST['user_id'];
    $lesson_id = $_POST['lesson_id'];
    $title_note = $_POST['title_note'];
    $note_text = $_POST['note_text'];
    $lesson = $get->Get_Lesson_By_Id($lesson_id);
    $ls = $lesson[0];
    $sql = $lesson[1];
    $lesson_name = $ls[0]['lesson_title'];
    $lesson_description = $ls[0]['content'];
    $video_link = $ls[0]['link'];
    $_SESSION['lesson_id'] = $lesson_id;
    $_SESSION['lesson_name'] = $lesson_name;
    $_SESSION['lesson_description'] = $lesson_description;
    $_SESSION['video_link'] = $video_link;
    $get->Add_Notes($title_note,$note_text,$user_id);
    if(isset($_POST['add_note_main'])){
        header("Location: ../courses.php?lesson_id=". $lesson_id);
    }else{
        header("Location: ../notes.php?error=noteadded");
    }

}
if(isset($_POST['delete_note'])){
    $id = $_POST['note_id'];
    $get->Delete_Note($id);
    header("Location: ../notes.php?error=notedeleted");
}
?>