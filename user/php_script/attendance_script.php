<?php
session_start();
require_once('db_local_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $qrValue = $_POST['qr-scanner'];

    $sql = "SELECT * FROM users WHERE user_token = '$qrValue'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        $user = mysqli_fetch_assoc($result);
        $user_fullname = $user['user_fullname'];
        $user_student_number = $user['user_student_number'];
        $user_student_course = $user['user_student_course'];
        $user_student_section = $user['user_student_section'];
        $user_student_year = $user['user_student_year'];
        $user_faculty_number = $user['user_faculty_number'];
        $user_faculty_department = $user['user_faculty_department'];
        $user_member_type = $user['user_member_type'];
        $user_picture = $user['user_picture'];
        $user_email = $user['user_email'];
        $user_token = $user['user_token'];


        $checkDuplicatesQuery = "SELECT COUNT(*) AS duplicate_count FROM attendance WHERE libraryId = '$user_token' AND date = CURDATE()";
        $checkDuplicatesResult = mysqli_query($db, $checkDuplicatesQuery);

        if ($checkDuplicatesResult) {
            $duplicateuser = mysqli_fetch_assoc($checkDuplicatesResult);
            $duplicateCount = $duplicateuser['duplicate_count'];
            $status = ($duplicateCount % 2 === 1) ? 'OUT' : 'IN';

            $insert = "INSERT INTO attendance (member_type, fullname, student_course, student_section, student_year, student_number, faculty_number, faculty_department, picture, email, libraryId, status) VALUES ('$user_member_type','$user_fullname','$user_student_course','$user_student_section','$user_student_year','$user_student_number','$user_faculty_number','$user_faculty_department','$user_picture','$user_email','$user_token','$status')";
            mysqli_query($db, $insert);

            $redirectUrl = "../pages/attendance.php?name=$user_fullname&course=$user_student_course&year=$user_student_year&section=$user_student_section&student_number=$user_student_number&faculty_number=$user_faculty_number&faculty_department=$user_faculty_department&email=$user_email&member_type=$user_member_type&picture=$user_picture&id=$user_token&status=$status";
            header("Location: $redirectUrl");
            exit();
        }
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(array('error' => 'Method Not Allowed'));
}
