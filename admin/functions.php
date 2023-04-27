<?php
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    include '../classes/db.classes.php';
    include '../classes/admin.php';
    $change = new Admin();
    $change->Delete_User($id);
    header("Location: ./admin.php?error=userdeleted");
}
if(isset($_POST['delete_price'])){
    $id = $_POST['id'];
    include '../classes/db.classes.php';
    include '../classes/admin.php';
    $change = new Admin();
    $change->Delete_Price($id);
    header("Location: ./admin.php?error=pricedeleted");
}
if(isset($_POST['add_price'])){
    $course = $_POST['course'];
    $investing = $_POST['investing'];
    $mining = $_POST['mining'];
    $portfolio = $_POST['portfolio'];
    $price = $_POST['price'];
    include '../classes/db.classes.php';
    include '../classes/admin.php';
    $change = new Admin();
    $change->Add_Price( $course,$investing, $mining, $portfolio, $price);
    header("Location: ./admin.php?error=priceadded");

}
if(isset($_POST['add_user'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    include '../classes/db.classes.php';

    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignUpController( $name,$surname, $email, $pwd, $pwd);

    $signup->SignUpUser();
    header("Location: ./admin.php?error=useradded");

}

?>