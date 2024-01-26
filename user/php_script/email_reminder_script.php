<?php
session_start();
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// $from = "campuslibrarian@cvsutanzalibrary.site";
// $to = "danilojr.abancia@cvsu.edu.ph";
// $subject = "Checking PHP mail";
// $message = "PHP mail works just fine";
// $headers = "From:" . $from;
// if (mail($to, $subject, $message, $headers)) {
//     echo "The email message was sent.";
// } else {
//     echo "The email message was not sent.";
// }

require('db_local_connection.php');

$user_token = $_SESSION['user_token'];

$sql = "SELECT * FROM bookreserve WHERE returnDate = CURDATE()-1";
$result = mysqli_query($db, $sql);

while ($row = $result->fetch_assoc()) {
    echo $row['email'] . "<br>";
    echo $row['email'] . "<br>";
}

echo 'Hello';
