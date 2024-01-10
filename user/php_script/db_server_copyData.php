<?php

require_once('db_local_connection.php');
require_once('db_server_connection.php');

$remoteBookTable = 'books';
$localBookTable = 'books';


// Retrieve data from remote table
$selectQuery = "SELECT * FROM $remoteBookTable";
$result = $db_server->query($selectQuery);

if ($result === false) {
    die("Error in SELECT query: " . $db_server->error);
}

$localQuery = "TRUNCATE TABLE $localBookTable"; // Clear local table before updating
$db->query($localQuery);

// Insert or update data in the local table
while ($row = $result->fetch_assoc()) {
    $columns = implode(", ", array_keys($row));
    $values = "'" . implode("', '", $row) . "'";
    
    $insertUpdateQuery = "INSERT INTO $localBookTable ($columns) VALUES ($values) ON DUPLICATE KEY UPDATE ";

    foreach ($row as $column => $value) {
        $insertUpdateQuery .= "$column = '$value', ";
    }

    $insertUpdateQuery = rtrim($insertUpdateQuery, ", ");

    if ($db->query($insertUpdateQuery) === false) {
        die("Error in INSERT/UPDATE query: " . $db->error);
    }
}

// Close connections
$db_server->close();
$db->close();
?>
