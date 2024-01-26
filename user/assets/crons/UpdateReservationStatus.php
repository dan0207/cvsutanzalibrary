<?php
session_start();
require_once('../../php_script/db_local_connection.php');

$sql = "CALL UpdateReservationStatus();";
mysqli_query($db, $sql);
mysqli_close($db);
