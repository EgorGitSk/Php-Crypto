<?php



    if(isset($_POST['submit'])){
    //Grabbing the data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['rpwd'];

    //Instantiate signup controller class
    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignUpController( $username, $email, $pwd, $rpwd);

    $signup->SignUpUser();

    header("Location: ../index.php?error=none");
    }

?>