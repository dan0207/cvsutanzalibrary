<?php
//  Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "if0_35625284_cvsutanzalib_db";

// Create a new MySQLi connection
$db = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $d->connect_error);
}
