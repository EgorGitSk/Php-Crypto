<?php

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
                $_SESSION["name"] = $name;
                header("Location: ../account.php?error=nameistaken");
            }
        }
        public function ChangeSurName($surname){
                $sql = $this->connect()->prepare('UPDATE users SET surname = ?;');
                $sql->execute(array($surname));
                $_SESSION["surname"] = $surname;
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
                $_SESSION["email"] = $email;
                header("Location: ../account.php?error=emailistaken");
            }
        }
        public function Get_User_Questions_Answers($id){
            $sql = $this->connect()->prepare("SELECT * FROM question left join answers on answers.questions_id = question.question_id WHERE user_id = ? group by question.question_id;");
            $sql->execute(array($id));
            $contact = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($contact,$sql);
        }
    }
?>