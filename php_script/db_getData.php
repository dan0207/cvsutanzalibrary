<?php
session_start();
require_once('db_connection.php');

function getDataFromTable($tableName) {
    global $db;
    $result = mysqli_query($db, "SELECT * FROM $tableName");
    $data = array();
    $user_token = $_SESSION['user_token'];
    while ($row = mysqli_fetch_assoc($result)) {
        if($tableName === 'users') if($row['user_token'] === $user_token) $data['active'] = $row;
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
    $allData[$table] = getDataFromTable($table);
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($allData);



// $user_token = $_SESSION['user_token'];

// // $sql = "SELECT * FROM users WHERE user_token = '$user_token'";
// $sql = "SELECT * FROM users";
// $result = $db->query($sql);

// $data = array();
// while ($row = $result->fetch_assoc()) {
//     if($row['user_token'] === $user_token) $data['active'] = $row;
//     else $data[] = $row;
// }

// echo json_encode($data);
