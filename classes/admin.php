<?php
class Admin extends Db{
    public function Get_All_Users(){
        $sql = $this->connect()->prepare("SELECT * FROM users");
        $sql->execute();
        $user = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($user,$sql);
    }
    public function Delete_User($id){
        $sql = $this->connect()->prepare("DELETE FROM users WHERE id = ?");
        $sql->execute(array($id));
    }
    public function Add_User($name,$surname,$email){
        $user = new SignUp();
    }
    public function Get_All_Prices(){
        $sql = $this->connect()->prepare("SELECT * FROM pricelist");
        $sql->execute();
        $price = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($price,$sql);
    }
    public function Delete_Price($id){
        $sql = $this->connect()->prepare("DELETE FROM pricelist WHERE id = ?");
        $sql->execute(array($id));
    }
}
?>