<?php
    session_start();
    class User extends db{
        public function ChangeName($name,$id){
            $sql = $this->connect()->prepare("SELECT * FROM users WHERE name = ?");
            $sql->execute(array($name));
            $check = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($check) > 0) {
                header("Location: ../account.php?error=nameistaken");
                exit();
            }

            $check = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($check ) > 0) {
                header("Location: ../account.php?error=nameistaken");
            }
            $sql = $this->connect()->prepare('UPDATE users SET name = ? WHERE id= ?;');
            $sql->execute(array($name,$id));
            $_SESSION["name"] = $name;
        }
        public function ChangeSurName($surname,$id){
                $sql = $this->connect()->prepare('UPDATE users SET surname = ? where id = ?;');
                $sql->execute(array($surname,$id));
                $_SESSION["surname"] = $surname;
        }
        public function ChangeEmail($email,$id){
            $sql = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
            $sql->execute(array($email));
            $check = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($check) > 0) {
                header("Location: ../account.php?error=emailistaken");
                exit();
            }
            $check = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($check ) > 0) {
                header("Location: ../account.php?error=emailistaken");
            }
            $sql = $this->connect()->prepare('UPDATE users SET email = ? WHERE id= ?;');
            $sql->execute(array($email,$id));
            $_SESSION["email"] = $email;
        }
        public function Get_User_Questions_Answers($id){
            $sql = $this->connect()->prepare("SELECT * FROM question left join answers on answers.questions_id = question.question_id WHERE user_id = ? group by question.question_id;");
            $sql->execute(array($id));
            $contact = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($contact,$sql);
        }
    }
?>