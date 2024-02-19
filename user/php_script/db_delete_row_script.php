<?php
session_start();
require_once('db_local_connection.php');

$transactionID = $_POST['transactionID'];

$select = "SELECT * FROM bookreserve WHERE id = $transactionID";
$result = $db->query($select);
$bookreserve = $result->fetch_assoc();

$id = $bookreserve['id'];
$libraryid = $bookreserve['libraryid'];
$name = $bookreserve['name'];
$courseSection = $bookreserve['courseSection'];
$email = $bookreserve['email'];
$bookAccessNo = $bookreserve['bookAccessNo'];
$bookTitle = $bookreserve['bookTitle'];
$bookCallNo = $bookreserve['bookCallNo'];
$pickupDate = $bookreserve['pickupDate'];
$returnDate = $bookreserve['returnDate'];

$remarks = 'Cancelled by user';

$insert = "INSERT INTO booktransaction (id, libraryid, name, courseSection, email, bookAccessNo, bookTitle, bookCallNo, pickupDate, returnDate, remarks)
                            VALUES ('$id', '$libraryid', '$name', '$courseSection', '$email', '$bookAccessNo', '$bookTitle', '$bookCallNo', '$pickupDate', '$returnDate', '$remarks')";
$db->query($insert);

$delete = "DELETE FROM bookreserve WHERE id = $transactionID";

if ($db->query($delete) === TRUE) {
    echo true;
} else {
    echo false;
}
