<?php
session_start();

require_once('db_local_connection.php');

$sql = "SELECT * FROM events";
$result = mysqli_query($db, $sql);

if ($result) {
    $events = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;  
    }

    echo json_encode($events);
} else {
    echo json_encode(array('error' => 'Error fetching events'));
}

mysqli_close($db);
