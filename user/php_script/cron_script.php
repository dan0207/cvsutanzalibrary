<?php
session_start();
require('db_local_connection.php');
$sql = "
BEGIN
    CALL UpdateReservationStatus();
    CALL UpdateBookStatus();
END
";

mysqli_multi_query($db, $sql);
