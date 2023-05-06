<?php
include '../classes/db.classes.php';
include '../classes/admin.php';
include "../classes/signup.classes.php";
include "../classes/signup-contr.classes.php";
$change = new Admin();
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $change->Delete_User($id);
    header("Location: ./admin.php?error=userdeleted");
}
if(isset($_POST['delete_price'])){
    $id = $_POST['id'];
    $change->Delete_Price($id);
    header("Location: ./admin.php?error=pricedeleted");
}
if(isset($_POST['change_price'])){
    $course = $_POST['course'];
    $investing = $_POST['investing'];
    $mining = $_POST['mining'];
    $portfolio = $_POST['portfolio'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $change->Change_Price($course,$investing,$mining,$portfolio,$price,$id);
    header("Location: ./admin.php?error=pricechanged");
}
if(isset($_POST['add_price'])){
    $course = $_POST['course'];
    $investing = $_POST['investing'];
    $mining = $_POST['mining'];
    $portfolio = $_POST['portfolio'];
    $price = $_POST['price'];
    $change->Add_Price( $course,$investing, $mining, $portfolio, $price);
    header("Location: ./admin.php?error=priceadded");
}
if(isset($_POST['add_user'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $signup = new SignUpController( $name,$surname, $email, $pwd, $pwd);
    $signup->SignUpUser();
    header("Location: ./admin.php?error=useradded");
}
if(isset($_POST['change_answer'])){
    $id = $_POST['id'];
    $answer = $_POST['answer'];
    $answered = $_POST['answered'];
    $change->Add_Answer($id,$answer,$answered);
    header("Location: ./answers.php?error=answerchanged");
}
if(isset($_POST['add_faq'])){
    $name = $_POST['name'];
    $text = $_POST['text'];
    $change->Add_Faqs($name,$text);
    header("Location: ./faq.php?error=faqadded");
}
if(isset($_POST['change_faq'])){
    $name = $_POST['name'];
    $text = $_POST['text'];
    $id = $_POST['id'];
    $change->Change_Faqs($name,$text,$id);
    header("Location: ./faq.php?error=faqchanged");
}
if(isset($_POST['delete_faq'])){
    $id = $_POST['id'];
    $change->Delete_Faqs($id);
    header("Location: ./faq.php?error=faqdeleted");
}
if(isset($_POST['add_learning']) && isset($_FILES['image'])){
    $name = $_POST['name'];
    $text = $_POST['text'];
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    if ($error === 0){
        if($img_size > 350000){
            $em = "image is too big";
            header("Location: ./learning.php?error=$em");
        }else{
              $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
              $img_ex_lc = strtolower($img_ex);
              $allowed_exs = array("jpg","jpeg","png");
              if(in_array($img_ex_lc,$allowed_exs)){
                  $new_img_name = $name.'.'.$img_ex_lc;
                  $img_upload_path = '../img/learn/'.$new_img_name;
                  move_uploaded_file($tmp_name,$img_upload_path);
                  $change->Add_Learning($name,$text,$new_img_name);
                  header("Location: ./learning.php?error=imageadded");
              }else{
                  $em = "wrong format";
                  header("Location: ./learning.php?error=$em");
              }
        }
    }else{
        header("Location: ./learning.php?error=error");
    }
}else{
    header("Location: ./learning.php?error=imageisnotset");
}
if(isset($_POST['delete_learning'])){
    $id = $_POST['id'];
    $change->Delete_Learning($id);
    header("Location: ./learning.php?error=learningdeleted");
}
?>