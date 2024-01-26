<?php
session_start();

require_once('db_local_connection.php');

$sql = "SELECT * FROM users WHERE user_token = '$user_token'";
$result = mysqli_query($db, $sql);

$user = $result->fetch_assoc();
$update = "UPDATE users SET user_status = 'Offline'";
mysqli_query($db, $update);
mysqli_close($db);

unset($_SESSION['user_token']);
session_destroy();
header("Location: ../../user/pages/login.php");
exit();
