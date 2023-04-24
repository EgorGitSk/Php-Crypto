<?php

class LoginController extends Login {
    private string $username;
    private string $pwd;


    public function __construct(string $username,string $pwd){
        $this->username=$username;
        $this->pwd=$pwd;
    }
    public function loginUser(){
        if(!$this->EmptyInput()){
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->username,$this->pwd);
    }
    private function EmptyInput(){
        $result = true;
        if(empty($this->username) || empty($this->pwd)){
            $result = false;
        }
        return $result;
    }

}
?>
