<?php
session_start();
require_once('db_connection.php');

$user_token = $_SESSION['user_token'];

// $sql = "SELECT * FROM users WHERE user_token = '$user_token'";
$sql = "SELECT * FROM users";
$result = $db->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    if($row['user_token'] === $user_token) $data['active'] = $row;
    else $data[] = $row;
}

echo json_encode($data);
