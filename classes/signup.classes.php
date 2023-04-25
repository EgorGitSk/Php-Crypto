<?php
    class SignUp extends Db{

        public function SetUser($username,$email,$pwd){
            $sql = $this->connect()->prepare("INSERT INTO `users` (`username`, `password`, `email`) VALUES (?, ?, ?)");

            $hashed = password_hash($pwd, PASSWORD_DEFAULT);

            if(!$sql->execute(array($username,$hashed,$email))){
                $sql = null;
                header("Location: ../index.php?error=fail");
                exit();
            }

            $sql = null;
        }
        protected function checkEmail($email){
            $sql = $this->connect()->prepare("SELECT username FROM users WHERE email = ?;");

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
        protected function checkName($username){
            $sql = $this->connect()->prepare("SELECT username FROM users WHERE username = ?;");

            if(!$sql->execute(array($username))){
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