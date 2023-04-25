<?php
    class Db{
        public function connect(){
            try{
                $host = "localhost";
                $port = 3306;
                $name = "root";
                $dbName = "crypto";
                $pwd = "";

                $db = new PDO('mysql:charset=utf8;host='.$host.';dbname='.$dbName.";port=".$port,
                    $name,
                    $pwd);
                return $db;
            }catch(PDOException $e){
                print("Error!: " . $e->getMessage(). "<br>");
                die();
            }
        }
    }
?>