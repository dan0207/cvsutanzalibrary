<?php
session_start();
require_once('db_local_connection.php');

function getDataFromTable($db, $tableName)
{
    $result = mysqli_query($db, "SELECT * FROM " . mysqli_real_escape_string($db, $tableName));
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

// Get list of tables from the database
$result = mysqli_query($db, "SHOW TABLES");
$tables = array();
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

// Get data from all tables
$allData = array();
foreach ($tables as $table) {
    $allData[$table] = getDataFromTable($db, $table);
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($allData);
