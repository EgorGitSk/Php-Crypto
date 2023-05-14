<?php
    session_start();
    if(isset($_POST['send_question'])){
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        include "../classes/db.classes.php";
        include "../classes/contact.classes.php";
        $send = new ContactForm();
        $send->SendMessage($user_id,$name,$email,$message);

        header("Location: ../index.php?error=messagesent");
    }
?>