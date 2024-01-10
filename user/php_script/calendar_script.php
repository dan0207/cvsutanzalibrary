
<?php
session_start();

require_once('db_local_connection.php');

$user_token = $_SESSION['user_token'];

$event = json_decode(file_get_contents('php://input'), true);

$eventTitle = $event['title'];
$eventTimeFrom = $event['timeFrom'];
$eventTimeTo = $event['timeTo'];
$eventDay = $event['day'];
$eventMonth = $event['month'];
$eventYear = $event['year'];

$event_date = sprintf('%04d-%02d-%02d', $eventYear, $eventMonth, $eventDay);

// Validate and sanitize user input to prevent SQL injection
$eventTitle = mysqli_real_escape_string($db, $eventTitle);
$eventTimeFrom = mysqli_real_escape_string($db, $eventTimeFrom);
$eventTimeTo = mysqli_real_escape_string($db, $eventTimeTo);
$event_date = mysqli_real_escape_string($db, $event_date);

// Verify the user exists and retrieve user information
$sql = "SELECT * FROM users WHERE user_token = '$user_token'";
$result = mysqli_query($db, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($db));
}

// Insert the event into the 'events' table
$insert = "INSERT INTO events (event_title, event_timeFrom, event_timeTo, event_date) VALUES ('$eventTitle', '$eventTimeFrom', '$eventTimeTo', '$event_date')";

if (mysqli_query($db, $insert)) {
    $response = array('message' => 'Event inserted successfully');
    echo json_encode($response);
} else {
    $response = array('error' => 'Error inserting event: ' . mysqli_error($db));
    echo json_encode($response);
}

mysqli_close($db);
?>


