<?php

    if (isset($_POST['submit'])) {
        //Grabbing the data
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];

        //Instantiate signup controller class
        include "../classes/db.classes.php";
        include "../classes/login.classes.php";
        include "../classes/login-contr.classes.php";
        $login = new LoginController($username, $pwd);

        $login->loginUser();

        header("Location: ../index.php?error=none");
    }

?>