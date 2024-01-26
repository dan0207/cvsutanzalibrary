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
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }

                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border-radius: 5px;
                    margin-top: 20px;
                }

                h1 {
                    color: #333;
                }

                p {
                    color: #555;
                }

                .rules {
                    margin-top: 20px;
                }

                .footer {
                    margin-top: 20px;
                    color: #888;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Library Reminder</h1>
                <p>Dear $name,</p>
                <p>We hope this message finds you well. This is a gentle reminder regarding the borrowed book from the library.</p>

                <div class='book-details'>
                    <p><strong>Book ID:</strong> $bookAccessNo</p>
                    <p><strong>Title:</strong> $bookTitle</p>
                    <p><strong>Return Date:</strong> $returnDate</p>
                </div>

                <div class='rules'>
                    <h2>Library Rules and Regulations</h2>
                    <ul>
                        <li>Always present your ID as you enter the library.</li>
                        <li>Two (2) non-reserved books can be borrowed at a time by library users.</li>
                        <li>Reference books, reserved books, and other specified materials are for library use only.</li>
                    </ul>
                </div>

                <p>If you have any questions or concerns about the borrowed book or the return process, please do not hesitate to reach out. We are here to assist you.</p>

                <p>Thank you for your cooperation, and we appreciate your adherence to our library policies.</p>

                <div class='footer'>
                    <p>Best regards,<br>
                    CVSU Library</p>
                </div>
            </div>
        </body>
        </html>
    ";

    $headers = "From:" . $from;

    if (mail($to, $subject, $message, $headers)) {
        echo "Email message for Book ID $bookAccessNo was sent.<br>";
    } else {
        echo "Email message for Book ID $bookAccessNo was not sent.<br>";
    }
}
