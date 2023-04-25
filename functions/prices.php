<?php

$db = new Db();
$connection = $db->getConnection();
// Prepare and execute a SELECT query
$query = "SELECT * FROM pricelist";


// Generate HTML table rows dynamically
function get_prices(){
    global $db;
    global $connection;
    $query = "SELECT * FROM pricelist";
    $result = $connection->query($query);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td scope='row' data-label='Course'>" . $row['course'] . "</td>";
        echo "<td data-label='Investing'>" . $row['investing'] . "</td>";
        echo "<td data-label='Mining'>" . $row['mining'] . "</td>";
        echo "<td data-label='Portfolio'>" . $row['portfolio'] . "</td>";
        echo "<td data-label='Price Change'>" . $row['price'] . "</td>";
        echo "</tr>";
    }
}

?>

