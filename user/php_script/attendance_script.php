<?php
session_start();
include 'main_script.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "cvsutanzalib_db";

$db = new mysqli($servername, $username, $password, $database);
mysqli_query($db, "SET time_zone = '+08:00'");

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


        if ($user_member_type == "Student") {
            $course_department = getFormatCourseSection($user_student_course, $user_student_year, $user_student_section);
            $id_number = $user_student_number;
        } else {
            $course_department = $user_faculty_department;
            $id_number = $user_faculty_number;
        }

        // FOR ATTENDANCE LOG
        $checkLastStatusQuery = "SELECT status FROM attendance_log WHERE token = '$user_token' AND DATE(time_in) = CURDATE() ORDER BY time_in DESC LIMIT 1";
        $lastStatusResult = mysqli_query($db, $checkLastStatusQuery);

        if ($lastStatusResult && mysqli_num_rows($lastStatusResult) > 0) {
            $lastStatus = mysqli_fetch_assoc($lastStatusResult)['status'];

            if ($lastStatus == 'OUT') {
                $insertInQuery = "INSERT INTO attendance_log (member_type, fullname, course_department, id_number, picture, email, token, status, time_in) VALUES ('$user_member_type','$user_fullname','$course_department','$id_number','$user_picture','$user_email','$user_token','IN', CURTIME())";
                mysqli_query($db, $insertInQuery);
                $status = 'IN';
            } else {
                $updateOutQuery = "UPDATE attendance_log SET status = 'OUT', time_out = NOW() WHERE token = '$user_token' AND DATE(time_in) = CURDATE() AND status = 'IN' ORDER BY time_in DESC LIMIT 1";
                mysqli_query($db, $updateOutQuery);
                $status = 'OUT';
            }
        } else {
            $insertInQuery = "INSERT INTO attendance_log (member_type, fullname, course_department, id_number, picture, email, token, status, time_in) VALUES ('$user_member_type','$user_fullname','$course_department','$id_number','$user_picture','$user_email','$user_token','IN', CURTIME())";
            mysqli_query($db, $insertInQuery);
            $status = 'IN';
        }


        // FOR ATTENDANCE DISPLAY
        $checkDuplicatesQuery = "SELECT COUNT(*) AS duplicate_count FROM attendance WHERE token = '$user_token' AND date = CURDATE()";
        $checkDuplicatesResult = mysqli_query($db, $checkDuplicatesQuery);

        if ($checkDuplicatesResult) {
            $duplicateuser = mysqli_fetch_assoc($checkDuplicatesResult);
            $duplicateCount = $duplicateuser['duplicate_count'];
            $status = ($duplicateCount % 2 === 1) ? 'OUT' : 'IN';
            $insert = "INSERT INTO attendance (member_type, fullname, course_department, id_number, picture, email, token, status) VALUES ('$user_member_type','$user_fullname','$course_department','$id_number','$user_picture','$user_email','$user_token','$status')";
            mysqli_query($db, $insert);
        }

        $redirectUrl = "../pages/attendance.php?name=$user_fullname&course=$user_student_course&year=$user_student_year&section=$user_student_section&student_number=$user_student_number&faculty_number=$user_faculty_number&faculty_department=$user_faculty_department&email=$user_email&member_type=$user_member_type&picture=$user_picture&id=$user_token&status=$status";
        header("Location: $redirectUrl");
        exit();
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(array('error' => 'Method Not Allowed'));
}
