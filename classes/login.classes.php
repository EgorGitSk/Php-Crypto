<?php
class Login extends Db{

    public function getUser($username,$pwd){
        $sql = $this->connect()->prepare("SELECT password FROM users WHERE username = ? OR email = ?");


        if(!$sql->execute(array($username,$username))){
            $sql = null;
            header("Location: ../index.php?error=fail");
            exit();
        }
        if($sql->rowCount() == 0){
            $sql = null;
            header("Location: ../index.php?error=userNotFound");
            exit();
        }

        $hashed = $sql->fetchAll(PDO::FETCH_ASSOC);

        if(!password_verify($pwd, $hashed[0]["password"])){
            $sql = null;
            header("Location: ../index.php?error=passworderror");
            exit();
        }else{
            $sql = $this->connect()->prepare("SELECT * FROM users WHERE username = ? OR email = ? and password = ?");
            if(!$sql->execute(array($username,$username,$hashed[0]['user_pwd']))){
                $sql = null;
                header("Location: ../index.php?error=fail");
                exit();
            }
            if($sql->rowCount() == 0){
                $sql = null;
                header("Location: ../index.php?error=userNotFound");
                exit();
            }
            $user = $sql->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $sql = null;
        }

    }

}
?>