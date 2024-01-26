<?php
session_start();
require('db_local_connection.php');
$sql = "CALL UpdateReservationStatus();";
mysqli_query($db, $sql);
$sql = "CALL UpdateBookStatus();";
mysqli_query($db, $sql);


$currentDate = new DateTime();
$formattedDate = $currentDate->format('Y-m-d H:i:s');

$to = "danilojr.abancia@cvsu.edu.ph";
$subject = "Your Email Subject";
$message = "$formattedDate";
$headers = "From: Campus Librarian";

// Send email
mail($to, $subject, $message, $headers);
