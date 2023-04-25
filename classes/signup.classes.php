<?php
    class SignUp extends Db{

        public function SetUser($name,$surname,$email,$pwd){
            $sql = $this->connect()->prepare("INSERT INTO `users` (`name`,`surname`, `password`, `email`) VALUES (?,?, ?, ?)");

            $hashed = password_hash($pwd, PASSWORD_DEFAULT);

            if(!$sql->execute(array($name,$surname,$hashed,$email))){
                $sql = null;
                header("Location: ../index.php?error=fail");
                exit();
            }

            $sql = null;
        }
        protected function checkEmail($email){
            $sql = $this->connect()->prepare("SELECT name FROM users WHERE email = ?;");

            if(!$sql->execute(array($email))){
                $sql = null;
                header("Location: ../index.php?error=fail");
                exit();
            }

            $result = true;
            $signupData = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($signupData ) > 0) {
                $result = false;
            }

            return $result;
        }
        protected function checkName($name){
            $sql = $this->connect()->prepare("SELECT name FROM users WHERE name = ?;");

            if(!$sql->execute(array($name))){
                $sql = null;
                header("Location: ../index.php?error=fail");
                exit();
            }

            $result = true;
            $signupData = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($signupData ) > 0) {
                $result = false;
            }

            return $result;
        }
    }
?>