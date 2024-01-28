<?php

$serverHost = '192.168.1.32';
$serverUsername = 'user';
$serverPassword = 'User8888$$$';
$serverDatabase = 'cvsutanzalibrary-clone';

$db_server = new mysqli($serverHost, $serverUsername, $serverPassword, $serverDatabase);

if ($db_server->connect_error) {
    die("Connection failed: " . $db_server->connect_error);
}