<?php
//  Database connection parameters
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "cvsutanzalib_db";

$servername = "localhost";
$username = "u303407946_cvsutanzalib";
$password = "uTQ^zBHA*k1";
$database = "u303407946_cvsutanzalib";

// Create a new MySQLi connection
$db = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $d->connect_error);
}


// $sql = "CALL UpdateBookStatus();";
// mysqli_query($db, $sql);