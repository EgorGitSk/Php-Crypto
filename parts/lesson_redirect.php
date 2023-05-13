<?php
session_start();
include_once '../classes/db.classes.php';
include_once '../classes/user.classes.php';
$get = new User();
if(isset($_GET['lesson_id'])){
    $lesson_id = $_GET['lesson_id'];
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
    header("Location: ../courses.php?");
}
?>