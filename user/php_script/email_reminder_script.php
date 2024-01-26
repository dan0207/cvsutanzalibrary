<?php
session_start();
require('db_local_connection.php');

$returnReminder = [];

$sql = "SELECT * FROM bookreserve WHERE returnDate = CURDATE()";
$result = mysqli_query($db, $sql);

while ($row = $result->fetch_assoc()) {
    array_push($returnReminder, array(
        'id' => $row['id'],
        'libraryid' => $row['libraryid'],
        'name' => $row['name'],
        'courseSection' => $row['courseSection'],
        'email' => $row['email'],
        'bookAccessNo' => $row['bookAccessNo'],
        'bookTitle' => $row['bookTitle'],
        'bookCallNo' => $row['bookCallNo'],
        'pickupDate' => $row['pickupDate'],
        'returnDate' => $row['returnDate'],
    ));
}

foreach ($returnReminder as $reminder) {
    // Logic to fetch relevant information for each reminder
    $id = $reminder['id'];
    $libraryid = $reminder['libraryid'];
    $name = $reminder['name'];
    $courseSection = $reminder['courseSection'];
    $email = $reminder['email'];
    $bookAccessNo = $reminder['bookAccessNo'];
    $bookTitle = $reminder['bookTitle'];
    $bookCallNo = $reminder['bookCallNo'];
    $returnDate = $reminder['returnDate'];
    $pickupDate = $reminder['pickupDate'];

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "campuslibrarian@cvsutanzalibrary.site";
    $to = $email;
    $subject = "Checking PHP mail";

    $message = "
        <!DOCTYPE html>
        <body>
            <div class='container'>
                <p>Hi $customerName,</p>
                <p>We hope this message finds you well. This is a gentle reminder regarding the borrowed book with reference ID <strong>$bookID</strong>. The return date for this book is fast approaching, and we kindly request your prompt attention.</p>
                <p><strong>Return Date:</strong> $returnDate<br>
                <strong>Book ID:</strong> $bookID<br>
                <strong>Title:</strong> $bookTitle</p>
            </div>
        </body>
        </html>
    ";

    $headers = "From:" . $from;

    if (mail($reminder['email'], $subject, $message, $headers)) {
        echo "Email message for Book ID $bookID was sent.<br>";
    } else {
        echo "Email message for Book ID $bookID was not sent.<br>";
    }
}
