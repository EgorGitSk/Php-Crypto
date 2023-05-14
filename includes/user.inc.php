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
        header("Location: ../account.php?error=none");
    }
    if(!empty($surname)){
        $change->ChangeSurName($surname,$id);
        header("Location: ../account.php?error=none");
    }
    if(!empty($email)){
        $change->ChangeEmail($email,$id);
        header("Location: ../account.php?error=none");
    }

}

?>