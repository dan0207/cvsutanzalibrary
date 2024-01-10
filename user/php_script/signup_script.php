<?php
session_start();

// FOR INPUT LOGIN
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('db_local_connection.php');

    $_SESSION['user_token'] = $_SESSION['temp_token'];
    unset($_SESSION['temp_token']);

    $token = $_SESSION['user_token'];
    $fullname = $_SESSION['user_fullname'];
    $picture = $_SESSION['user_picture'];

    $_SESSION['user_username'] = $_POST['user_username'];
    $_SESSION['user_password'] = $_POST['user_password'];
    $_SESSION['user_name'] = $_POST['user_name'];
    $_SESSION['user_surname'] = $_POST['user_surname'];
    $_SESSION['user_middle_I'] = $_POST['user_middle_I'];
    $_SESSION['user_email'] = $_POST['user_email'];
    $_SESSION['user_student_number'] = $_POST['user_student_number'];
    $_SESSION['user_student_course'] = $_POST['user_student_course'];
    $_SESSION['user_student_section'] = $_POST['user_student_section'];
    $_SESSION['user_student_year'] = $_POST['user_student_year'];
    $_SESSION['user_faculty_number'] = $_POST['user_faculty_number'];
    $_SESSION['user_faculty_department'] = $_POST['user_faculty_department'];
    $_SESSION['user_member_type'] = $_POST['user_member_type'];
    $_SESSION['user_status'] = 'Online';

    $username = $_SESSION['user_username'];
    $password = $_SESSION['user_password'];
    $name = $_SESSION['user_name'];
    $surname = $_SESSION['user_surname'];
    $middle_I = $_SESSION['user_middle_I'];
    $email = $_SESSION['user_email'];
    $student_number = $_SESSION['user_student_number'];
    $course = $_SESSION['user_student_course'];
    $section = $_SESSION['user_student_section'];
    $year = $_SESSION['user_student_year'];
    $faculty_number = $_SESSION['user_faculty_number'];
    $faculty_department = $_SESSION['user_faculty_department'];
    $member_type = $_SESSION['user_member_type'];
    $status = $_SESSION['user_status'];


    $sql = "SELECT * FROM users WHERE user_token = '$token'";
    $result = mysqli_query($db, $sql);

    if ($result && $result->num_rows == 0) {
        $insert = " INSERT INTO users (user_username, user_password, user_givenName, user_familyName, user_middleI, user_fullname, user_email, user_student_number, user_student_course, user_student_section, user_student_year, user_faculty_number, user_faculty_department, user_picture, user_member_type, user_status, user_token)
                            VALUES ('$username', '$password', '$name', '$surname', '$middle_I', '$fullname', '$email', '$student_number', '$course', '$section', '$year', '$faculty_number', '$faculty_department', '$picture', '$member_type', '$status', '$token')";
        mysqli_query($db, $insert);
        mysqli_close($db);
        header("Location: ../pages/profile.php");
        exit();
    } else {
        echo "Invalid DB."+ $result;
    }
} else {
    $_SESSION['user_token'] = $_SESSION['temp_token'];
    unset($_SESSION['temp_token']);
    header("Location: ../pages/profile.php");
    exit();
}
// FOR INPUT LOGIN
