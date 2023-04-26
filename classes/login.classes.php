<?php
class Login extends Db{

    public function getUser($name,$pwd){
        $sql = $this->connect()->prepare("SELECT password FROM users WHERE name = ?");


        if(!$sql->execute(array($name))){
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
            $sql = $this->connect()->prepare("SELECT * FROM users WHERE name = ? OR email = ? and password = ?");
            if(!$sql->execute(array($name,$name,$hashed[0]['user_pwd']))){
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
            $_SESSION["name"] = $user[0]["name"];
            $_SESSION["email"] = $user[0]["email"];
            $_SESSION["surname"] = $user[0]["surname"];
            $_SESSION["admin"] = $user[0]["admin"];
            $sql = null;
        }

    }

}
?>