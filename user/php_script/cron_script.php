<?php
session_start();
require('db_local_connection.php');
$sql = "CALL UpdateReservationStatus();";
mysqli_query($db, $sql);
$sql = "CALL UpdateBookStatus();";
mysqli_query($db, $sql);


