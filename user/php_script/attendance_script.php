<?php
session_start();
require_once('db_local_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $qrValue = $_POST['qr-scanner'];

    $sql = "SELECT * FROM users WHERE user_token = '$qrValue'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $user_fullname = $row['user_fullname'];
        $user_student_number = $row['user_student_number'];
        $user_student_course = $row['user_student_course'];
        $user_student_section = $row['user_student_section'];
        $user_student_year = $row['user_student_year'];
        $user_faculty_number = $row['user_faculty_number'];
        $user_faculty_department = $row['user_faculty_department'];
        $user_member_type = $row['user_member_type'];
        $user_picture = $row['user_picture'];
        $user_email = $row['user_email'];
        $user_token = $row['user_token'];

        // Check if duplicates are odd or even
        $checkDuplicatesQuery = "SELECT COUNT(*) AS duplicate_count FROM attendance WHERE token = '$user_token'";
        $checkDuplicatesResult = mysqli_query($db, $checkDuplicatesQuery);

        if ($checkDuplicatesResult) {
            $duplicateRow = mysqli_fetch_assoc($checkDuplicatesResult);
            $duplicateCount = $duplicateRow['duplicate_count'];
            $status = ($duplicateCount % 2 === 1) ? 'OUT' : 'IN';

            $insert = "INSERT INTO attendance (member_type, fullname, student_course, student_section, student_year, student_number, faculty_number, faculty_department, picture, email, token, status) VALUES ('$user_member_type','$user_fullname','$user_student_course','$user_student_section','$user_student_year','$user_student_number','$user_faculty_number','$user_faculty_department','$user_picture','$user_email','$user_token','$status')";
            mysqli_query($db, $insert);

            $redirectUrl = "../pages/attendance.php?name=$user_fullname&course=$user_student_course&year=$user_student_year&section=$user_student_section&number=$user_student_number&email=$user_email&member_type=$user_member_type&picture=$user_picture&id=$user_token&status=$status";
            header("Location: $redirectUrl");
            exit();
        }
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(array('error' => 'Method Not Allowed'));
}
