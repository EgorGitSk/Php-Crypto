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

    public function Get_All_Questions_Answers(){
        $sql = $this->connect()->prepare("SELECT * FROM question left join answers on answers.questions_id = question.question_id group by question.question_id;");
        $sql->execute();
        $contact = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($contact,$sql);
    }

    public function Add_Answer($id,$answer,$answered){
        $check = $this->connect()->prepare("SELECT * FROM answers WHERE questions_id = ?");
        $check->execute(array($id));
        if ($check->rowCount() > 0) {
            $sql = $this->connect()->prepare("UPDATE answers SET answer=?, answered=? WHERE questions_id=?");
            $sql->execute(array($answer, $answered, $id));
        } else {
            $sql = $this->connect()->prepare("INSERT INTO answers (questions_id, answer, answered) VALUES (?, ?, ?)");
            $sql->execute(array($id, $answer, $answered));
        }
    }
    public function Get_All_Faqs(){
        $sql = $this->connect()->prepare("SELECT * FROM faq");
        $sql->execute();
        $faq = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($faq,$sql);
    }
    public function Add_Faqs($name,$text){
        $sql = $this->connect()->prepare("INSERT INTO faq (`name`, `text`) VALUES (?, ?)");
        $sql->execute(array($name,$text));
    }
    public function Change_Faqs($name,$text,$id){
        $sql = $this->connect()->prepare("UPDATE faq SET `name` = ?,`text` = ? WHERE id = ?");
        $sql->execute(array($name,$text,$id));
    }
    public function Delete_Faqs($id){
        $sql = $this->connect()->prepare("DELETE FROM faq WHERE id = ?");
        $sql->execute(array($id));
    }
    public function Get_All_Lessons(){
        $sql = $this->connect()->prepare("SELECT * FROM lessons");
        $sql->execute();
        $lesson = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($lesson,$sql);
    }
    public function Get_All_Sections(){
        $sql = $this->connect()->prepare("SELECT * FROM sections");
        $sql->execute();
        $lesson = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($lesson,$sql);
    }
    public function Get_All_Sections_Lessons(){
        $sql = $this->connect()->prepare("SELECT s.title AS section_title, l.lesson_title AS lesson_title, l.link, l.content
              FROM sections s
              JOIN lessons l ON s.id = l.section_id
              ORDER BY s.id, l.lesson_id");
        $sql->execute();
        $lesson = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($lesson,$sql);
    }
    public function Get_All_Learning(){
        $sql = $this->connect()->prepare("SELECT * FROM learn");
        $sql->execute();
        $lesson = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array($lesson,$sql);
    }
    public function Add_Learning($name,$text,$image){
        $sql = $this->connect()->prepare("INSERT INTO learn (`name`, `text`,`image`) VALUES (?, ?, ?)");
        $sql->execute(array($name,$text,$image));
    }
    public function Change_Learning($name,$text,$id){
        $sql = $this->connect()->prepare("UPDATE learn SET `name` = ?,`text` = ? WHERE id = ?");
        $sql->execute(array($name,$text,$id));
    }
    public function Delete_Learning($id){
        $sql = $this->connect()->prepare("DELETE FROM learn WHERE id = ?");
        $sql->execute(array($id));
    }
}
?>