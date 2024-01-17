<?php
session_start();

function convertDateFormat($inputDate)
{
    $dateTime = new DateTime($inputDate);
    $outputDate = $dateTime->format('Y-m-d\TH:i:s.v\Z');
    return $outputDate;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('db_local_connection.php');

    $library_id = isset($_POST['library_id']) ? $_POST['library_id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $courseSection = isset($_POST['courseSection']) ? $_POST['courseSection'] : '';
    $studentNumber = isset($_POST['studentNumber']) ? $_POST['studentNumber'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $book_accession_number = isset($_POST['book_accession_number']) ? $_POST['book_accession_number'] : '';
    $book_title = isset($_POST['book_title']) ? $_POST['book_title'] : '';
    $book_call_number = isset($_POST['book_call_number']) ? $_POST['book_call_number'] : '';
    $pickupDate = isset($_POST['pickupDate']) ? $_POST['pickupDate'] : '';
    $returnDate = isset($_POST['returnDate']) ? $_POST['returnDate'] : '';
    $status = 'pending';

    $pickupDate = convertDateFormat($pickupDate);
    $returnDate = convertDateFormat($returnDate);


    if ($db && $result = mysqli_query($db, "SELECT * FROM bookreserve")) {
        $insert = "INSERT INTO bookreserve (libraryid, name, courseSection, email, bookAccessNo, bookTitle, bookCallNo, pickupDate, returnDate, status) VALUES ('$library_id', '$name', '$courseSection', '$email', '$book_accession_number', '$book_title', '$book_call_number', '$pickupDate', '$returnDate', '$status')";
        if (mysqli_query($db, $insert)) {
            mysqli_close($db);
            header("Location: ../pages/profile.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
