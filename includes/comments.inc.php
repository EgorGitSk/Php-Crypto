<?php
include "../classes/db.classes.php";
include "../classes/user.classes.php";
$add = new User();
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_POST['add_comment'])){
    $user_id = $_POST['user_id'];
    $lesson_id = $_POST['lesson_id'];
    $message = $_POST['message'];
    $add->Add_Comment($message,$lesson_id,$user_id);
    header("Location: ../courses.php?error=commentadded");
}
if(isset($_POST['delete_comment'])){
    $comment_id = $_POST['comment_id'];
    $add->Delete_Comment($comment_id);
    header("Location: ../courses.php?error=commentdeleted");
}

if(isset($_POST['report_comment'])){
    $comment_id = $_POST['comment_id'];
    $add->Delete_Comment($comment_id);
    header("Location: ../courses.php?error=reported  ");
}

if(isset($_POST['add_reply'])){
    $user_id = $_POST['user_id'];
    $comment_id = $_POST['comment_id'];
    $reply = $_POST['reply'];
    $add->Add_Reply($reply,$comment_id,$user_id);
    header('Location: ../reply.php?reply_comment=&comment_id=' . $comment_id);
}
if(isset($_POST['delete_reply'])){
    $reply_id = $_POST['reply_id'];
    $comment_id = $_POST['comment_id'];
    $add->Delete_Reply($reply_id);
    header('Location: ../reply.php?reply_comment=&comment_id=' . $comment_id);
}
?>