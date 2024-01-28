<?php

$servername = "154.41.240.153";
$username = "u303407946_cvsutanzalib";
$password = "uTQ^zBHA*k1";
$database = "u303407946_cvsutanzalib";


$db = new mysqli($servername, $username, $password, $database);

if ($db->connect_error) {
    die("Connection failed: " . $d->connect_error);
}