<?php
session_start();

require_once('db_local_connection.php');

$update = "UPDATE users SET user_status = 'Offline' WHERE user_token = '" . $_SESSION['user_token'] . "'";
mysqli_query($db, $update);
mysqli_close($db);

unset($_SESSION['user_token']);
session_destroy();
header("Location: ../../user/pages/login.php");
exit();
