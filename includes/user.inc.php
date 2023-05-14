<?php

if(isset($_POST['submit'])){
    //Grabbing the data
    $name = $_POST['name'];
    $id = $_POST['id'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    //Instantiate signup controller class
    include "../classes/db.classes.php";
    include "../classes/user.classes.php";

    $change = new User();
    $errors = array();
    if(!empty($name)){
        $change->ChangeName($name,$id);

    }
    if(!empty($surname)){
        $change->ChangeSurName($surname,$id);

    }
    if(!empty($email)){
        $change->ChangeEmail($email,$id);

    }
    header("Location: ../index.php?error=none");
}

?>