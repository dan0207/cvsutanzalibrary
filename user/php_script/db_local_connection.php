<?php
if ($_SERVER['HTTP_HOST'] === 'localhost:3000') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cvsutanzalib_db";
} else {
    $servername = "localhost";
    $username = "u303407946_cvsutanzalib";
    $password = "uTQ^zBHA*k1";
    $database = "u303407946_cvsutanzalib";
}

$db = new mysqli($servername, $username, $password, $database);

if ($db->connect_error) {
    die("Connection failed: " . $d->connect_error);
}
