<?php
session_start();
require_once('db_local_connection.php');


$sql = "CALL UpdateBookStatus();";
mysqli_query($db, $sql);
