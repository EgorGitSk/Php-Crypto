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
    public function Change_Price($course,$investing,$mining,$portfolio,$price,$id){
        $sql = $this->connect()->prepare("UPDATE pricelist SET `course` = ?,`investing` = ?,`mining` = ?,`portfolio` = ?,`price` = ? WHERE id = ?");
        $sql->execute(array($course,$investing,$mining,$portfolio,$price,$id));
    }
    public function Add_Price($course,$investing,$mining,$portfolio,$price){
        $sql = $this->connect()->prepare("INSERT INTO pricelist (`course`, `investing`, `mining`, `portfolio`, `price`) VALUES (?, ?, ?, ?, ?)");
        $sql->execute(array($course,$investing,$mining,$portfolio,$price));
    }
    public function Get_All_Faqs(){
        $sql = $this->connect()->prepare("SELECT * FROM faq");
        $sql->execute();
        $faq = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($faq,$sql);
    }
}
?>