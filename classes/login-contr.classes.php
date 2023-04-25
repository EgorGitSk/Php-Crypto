<?php

class LoginController extends Login {
    private string $name;
    private string $pwd;


    public function __construct(string $name,string $pwd){
        $this->name=$name;
        $this->pwd=$pwd;
    }
    public function loginUser(){
        if(!$this->EmptyInput()){
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->name,$this->pwd);
    }
    private function EmptyInput(){
        $result = true;
        if(empty($this->name) || empty($this->pwd)){
            $result = false;
        }
        return $result;
    }

}
?>
