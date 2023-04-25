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
        protected function checkUser($username,$email){
            $sql = $this->connect()->prepare("SELECT username FROM users WHERE username = ? or email = ?;");

            if(!$sql->execute(array($username,$email))){
                $sql = null;
                header("Location: ../index.php?error=fail");
                exit();
            }

            $result = true;
            $signupData = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($signupData ) == 0) {
                $result = false;
            }

            return $result;
        }
    }
?>