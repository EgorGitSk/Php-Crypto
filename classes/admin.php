<?php
class Admin extends Db{
    public function Get_All_Users(){
        $sql = $this->connect()->prepare("SELECT * FROM users");
        $sql->execute();
        $user = $sql->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo "<tr>";
            echo '<td>'. $user[$i]["id"] .'</td>';
            echo '<td>'.$user[$i]["name"].'</td>';
            echo '<td>'.$user[$i]["surname"].'</td>';
            echo '<td>'.$user[$i]["email"].'</td>';
            echo "</tr>";

        }
    }
    public function Get_All_Prices(){
        $sql = $this->connect()->prepare("SELECT * FROM pricelist");
        $sql->execute();
        $price = $sql->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < $sql->rowCount(); $i++){
            echo "<tr>";
            echo '<td>'. $price[$i]["id"] .'</td>';
            echo '<td>'.$price[$i]["course"].'</td>';
            echo '<td>'.$price[$i]["investing"].'</td>';
            echo '<td>'.$price[$i]["mining"].'</td>';
            echo '<td>'.$price[$i]["portfolio"].'</td>';
            echo '<td>'.$price[$i]["price"].'</td>';
            echo "</tr>";

        }
    }
}
?>