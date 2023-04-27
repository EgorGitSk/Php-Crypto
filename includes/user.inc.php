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

    }
    if(!empty($surname)){
        $change->ChangeSurName($surname);

    }
    if(!empty($email)){
        $change->ChangeEmail($email);

    }


    header("Location: ../index.php?error=none");
}

?>