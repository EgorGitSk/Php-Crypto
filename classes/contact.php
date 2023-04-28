<?php

    class ContactForm extends Db{
        public function SendMessage($user_id,$name,$email,$message){
            $sql = $this->connect()->prepare("INSERT INTO `question` (`user_id`, `name`, `email`, `message`) VALUES (?, ?, ?, ?)");
            $sql->execute(array($user_id,$name,$email,$message));
            $message = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($message,$sql);
        }
        public function GetMessages($user_id){
            $sql = $this->connect()->prepare("SELECT * FROM question WHERE user_id = ?");
            $sql->execute(array($user_id));
            $message = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($message,$sql);
        }
    }

?>