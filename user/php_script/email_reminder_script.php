<?php
session_start();
require('db_local_connection.php');

$returnReminder = [];

$sql = "SELECT * FROM bookreserve WHERE returnDate = CURDATE()-1";
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
    $subject = "Library Reminder: Return Your Borrowed Book";

    $message = "
    <!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Library Reminder</title>

</head>

<body style='font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;'>
    <div class='container' style='max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 5px; margin-top: 20px;'>

        <header style='text-align: center;'>
            <img src='https://cvsutanzalibrary.site/cvsutanzalibrary/user/assets/img/logo.png'>
        </header>
        <h1 style='color: #333; text-align: center;'>Library Reminder</h1>
        <p style='color: #555;'>Dear $name,</p>
        <p style='color: #555;'>We hope this message finds you well. This is a gentle reminder regarding the borrowed book from the library.</p>

        <div class='book-details'>
            <p style='color: #555; margin: 10px'><strong>Transaction No:</strong> $bookAccessNo</p>
            <p style='color: #555; margin: 10px'><strong>Book Title:</strong> $bookTitle</p>
            <p style='color: #555; margin: 10px'><strong>Book Accesstion No:</strong> $bookAccessNo</p>
            <p style='color: #555; margin: 10px'><strong>Book Call No:</strong> $bookCallNo</p>
            <p style='color: #555; margin: 10px'><strong>Pickup Date:</strong> $pickupDate</p>
            <p style='color: #555; margin: 20px 10px; font-size: 30px'><strong>Return Date:</strong> $returnDate</p>
        </div>

        <div style='margin-top: 20px; text-align: center;'>
            <h2>Library Rules and Regulations</h2>
            <ul style='text-align: left;'>
                <li>Always present your ID as you enter the library.</li>
                <li>Two (2) non-reserved books can be borrowed at a time by library users.</li>
                <li>Reference books, reserved books, and other specified materials are for library use only.</li>
            </ul>
        </div>

        <p style='color: #555;'>If you have any questions or concerns about the borrowed book or the return process, please do not hesitate to reach out. We are here to assist you.</p>

        <p style='color: #555;'>Thank you for your cooperation, and we appreciate your adherence to our library policies.</p>

        <div class='footer' style='margin-top: 20px; color: #888;'>
            <p style='color: #555;'>Best regards,<br>
                Cavite State University Tanza Campus Library</p>
        </div>

        <header>Hello</header>
    </div>
</body>

</html>
    ";

    $headers = "From: $from\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email message for Book ID $bookAccessNo was sent.<br>";
    } else {
        echo "Email message for Book ID $bookAccessNo was not sent.<br>";
    }
}
