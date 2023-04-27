<?php
    class Courses extends Db{
        public function Get_All_Courses(){
            $sql = $this->connect()->prepare("SELECT * FROM courses");
            $sql->execute();
            $course = $sql->fetchAll(PDO::FETCH_ASSOC);
            return array($course,$sql);
        }
    }
?>