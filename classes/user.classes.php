<?php
if(!isset($_SESSION))
{
    session_start();
}
    class User extends db{
        public function ChangeName($name,$id){
            $sql = $this->connect()->prepare("SELECT * FROM users WHERE name = ?");
            $sql->execute(array($name));
            $check = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($check) > 0) {
                header("Location: ../account.php?error=nameistaken");
                exit();
            }

            $check = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($check ) > 0) {
                header("Location: ../account.php?error=nameistaken");
            }
            $sql = $this->connect()->prepare('UPDATE users SET name = ? WHERE id= ?;');
            $sql->execute(array($name,$id));
            $_SESSION["name"] = $name;
        }
        public function ChangeSurName($surname,$id){
                $sql = $this->connect()->prepare('UPDATE users SET surname = ? where id = ?;');
                $sql->execute(array($surname,$id));
                $_SESSION["surname"] = $surname;
        }
        public function ChangeEmail($email,$id){
            $sql = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
            $sql->execute(array($email));
            $check = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($check) > 0) {
                header("Location: ../account.php?error=emailistaken");
                exit();
            }
            $check = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($check ) > 0) {
                header("Location: ../account.php?error=emailistaken");
            }
            $sql = $this->connect()->prepare('UPDATE users SET email = ? WHERE id= ?;');
            $sql->execute(array($email,$id));
            $_SESSION["email"] = $email;
        }
        public function Get_User_Questions_Answers($id){
            $sql = $this->connect()->prepare("SELECT * FROM question left join answers on answers.questions_id = question.question_id WHERE user_id = ? group by question.question_id;");
            $sql->execute(array($id));
            $contact = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($contact,$sql);
        }
        public function Get_All_Sections_Lessons(){
            $sql = $this->connect()->prepare("SELECT lesson_id,s.title AS section_title, l.lesson_title AS lesson_title, l.link, l.content
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
        public function Get_Lesson_By_Id($id){
            $sql = $this->connect()->prepare("SELECT * FROM lessons WHERE lesson_id = ?");
            $sql->execute(array($id));
            $lesson = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($lesson,$sql);
        }

        public function Ger_All_Notes($id){
            $sql = $this->connect()->prepare("SELECT * FROM notes WHERE user_id = ?");
            $sql->execute(array($id));
            $note = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($note,$sql);
        }
        public function Add_Notes($title_note,$note_text,$user_id){
            $sql = $this->connect()->prepare("INSERT INTO notes (`title_note`, `note_text`,`user_id`) VALUES (?, ?, ?)");
            $sql->execute(array($title_note,$note_text,$user_id));
        }
        public function Delete_Note($id){
            $sql = $this->connect()->prepare("DELETE FROM notes WHERE id = ?");
            $sql->execute(array($id));
        }
        public function Get_Comments($lesson_id){
            $sql = $this->connect()->prepare("SELECT count(replies.comment_id) as amount,comments.comment_id,comment,comments.user_id,comments.date,lesson_id,users.name,users.surname FROM comments 
            join users on comments.user_id = users.id
            left join replies on replies.comment_id = comments.comment_id
            WHERE lesson_id = ?
            group by comments.comment_id;");
            $sql->execute(array($lesson_id));
            $comment = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($comment,$sql);
        }
        public function Get_Comment($comment_id){
            $sql = $this->connect()->prepare("SELECT comment,comments.date,comments.comment_id as comment_id,users.name,users.surname FROM comments 
join users on comments.user_id = users.id
WHERE comments.comment_id =  ?;");
            $sql->execute(array($comment_id));
            $comment = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($comment,$sql);
        }
        public function Get_Replies($lesson_id){
            $sql = $this->connect()->prepare("SELECT reply,date,users.name,users.surname,user_id,comment_id,replies.id as reply_id FROM replies 
            join users on replies.user_id = users.id
            WHERE comment_id = ?;");
            $sql->execute(array($lesson_id));
            $replies = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($replies,$sql);
        }
        public function Add_Comment($comment,$lesson_id,$user_id){
            $sql = $this->connect()->prepare("INSERT INTO comments (`comment`, `lesson_id`,`user_id`) VALUES (?, ?, ?)");
            $sql->execute(array($comment,$lesson_id,$user_id));
        }

        public function Delete_Comment($id){
            $sql = $this->connect()->prepare("DELETE FROM comments WHERE comment_id = ?");
            $sql->execute(array($id));
        }
        public function Add_Reply($reply,$comment_id,$user_id){
            $sql = $this->connect()->prepare("INSERT INTO replies (`reply`, `comment_id`,`user_id`) VALUES (?, ?, ?)");
            $sql->execute(array($reply,$comment_id,$user_id));
        }
        public function Delete_Reply($id){
            $sql = $this->connect()->prepare("DELETE FROM replies WHERE id = ?");
            $sql->execute(array($id));
        }
    }
?>