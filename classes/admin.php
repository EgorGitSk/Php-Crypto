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
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo 'Id: '. $price[$i]["id"] .'<br>';
            echo 'Course: '.$price[$i]["course"].'<br>';
            echo 'Investing: '.$price[$i]["investing"].'<br>';
            echo 'Mining: '.$price[$i]["mining"].'<br>';
            echo 'Portfolio: '.$price[$i]["portfolio"].'<br>';
            echo 'Price: '.$price[$i]["price"].'<br>';
            echo '---------------------<br>';
        }
    }
}
?>