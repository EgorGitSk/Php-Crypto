<?php

    class SignUpController extends SignUp {
        private string $username;
        private string $email;
        private string $pwd;
        private string $rpwd;

        public function __construct(string $username,string $email,string $pwd,string $rpwd){
            $this->username=$username;
            $this->email=$email;
            $this->pwd=$pwd;
            $this->rpwd=$rpwd;
        }
        public function SignUpUser(){
            if(!$this->EmptyInput()){
                header("Location: ../index.php?error=emptyinput");
                exit();
            }
            if(!$this->InvalidName()){
                header("Location: ../index.php?error=invalidname");
                exit();
            }
            if(!$this->InvalidEmail()){
                header("Location: ../index.php?error=invalidemail");
                exit();
            }
            if(!$this->InvalidPassword()){
                header("Location: ../index.php?error=invalidepassword");
                exit();
            }
            if(!$this->checkExistence()){
                header("Location: ../index.php?error=userexists");
                exit();
            }
            $this->SetUser($this->username,$this->email,$this->pwd);
        }
        private function EmptyInput(){
            $result = true;
            if(empty($this->username) || empty($this->email) || empty($this->pwd) || empty($this->rpwd)){
                $result = false;
            }
            return $result;
        }
        private function InvalidName(){
            $result = true;
            if(!preg_match("/^[a-zA-Z0-9]*$/",$this->username)){
                $result = false;
            }
            return $result;
        }
        private function InvalidEmail(){
            $result = true;
            if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
                $result = false;
            }
            return $result;
        }
        private function InvalidPassword(){
            $result = true;
            if($this->pwd!==$this->rpwd){
                $result = false;
            }
            return $result;
        }
        private function checkExistence(){
            $result = true;
            if(!$this->checkUser($this->username,$this->email)){
                $result = false;
            }
            return $result;
        }
    }
?>
