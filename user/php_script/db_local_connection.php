<?php

// $servername = "154.41.240.153";
// $username = "u303407946_cvsutanzalib";
// $password = "uTQ^zBHA*k1";
// $database = "u303407946_cvsutanzalib";

$servername = "localhost";
$username = "root";
$password = "";
$database = "cvsutanzalib_db";

$db = new mysqli($servername, $username, $password, $database);
mysqli_query($db, "SET time_zone = '+08:00'");

if ($db->connect_error) {
    die("Connection failed: " . $d->connect_error);
}