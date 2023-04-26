<?php

if(isset($_POST['submit'])){
    //Grabbing the data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    //Instantiate signup controller class
    include "../classes/db.classes.php";
    include "../classes/user.classes.php";

    $change = new User();

    if(!empty($name)){
        $change->ChangeName($name);
        $_SESSION["name"] = $name;
    }
    if(!empty($surname)){
        $change->ChangeSurName($surname);
        $_SESSION["surname"] = $surname;
    }
    if(!empty($email)){
        $change->ChangeEmail($email);
        $_SESSION["email"] = $email;
    }


    header("Location: ../index.php?error=none");
}

?>