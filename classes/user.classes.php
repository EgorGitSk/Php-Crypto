<?php
    session_start();
    class User extends db{
        public function ChangeName($name){
            $sql = $this->connect()->prepare("SELECT * FROM users WHERE name = ?");
            if(!$sql->execute(array($name))){
                $sql = null;
                header("Location: ../account.php?error=fail");
                exit();
            }
            if($sql->rowCount() == 0){
                $sql = $this->connect()->prepare('UPDATE users SET name = ? WHERE name= ?;');
                $sql->execute(array($name,$_SESSION["name"]));
            }
        }
        public function ChangeSurName($surname){
                $sql = $this->connect()->prepare('UPDATE users SET surname = ?;');
                $sql->execute(array($surname));
        }
        public function ChangeEmail($email){
            $sql = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
            if(!$sql->execute(array($email))){
                $sql = null;
                header("Location: ../account.php?error=fail");
                exit();
            }
            if($sql->rowCount() == 0){
                $sql = $this->connect()->prepare('UPDATE users SET email = ? WHERE email= ?;');
                $sql->execute(array($email,$_SESSION["email"]));
            }
        }
    }
?>