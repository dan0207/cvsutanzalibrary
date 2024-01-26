<?php
session_start();
require_once('db_local_connection.php');

$sql = "CALL UpdateReservationStatus();";
mysqli_query($db, $sql);
