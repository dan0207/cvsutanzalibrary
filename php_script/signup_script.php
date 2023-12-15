<?php
session_start();

// FOR INPUT LOGIN
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('db_connection.php');

    $_SESSION['user_token'] = $_SESSION['temp_token'];
    unset($_SESSION['temp_token']);


    $_SESSION['user_username'] = $_POST['user_username'];
    $_SESSION['user_password'] = $_POST['user_password'];
    $_SESSION['user_name'] = $_POST['user_name'];
    $_SESSION['user_surname'] = $_POST['user_surname'];
    $_SESSION['user_middle_I'] = $_POST['user_middle_I'];
    $_SESSION['user_email'] = $_POST['user_email'];
    $_SESSION['user_student_number'] = $_POST['user_student_number'];
    $_SESSION['user_course'] = $_POST['user_course'];
    $_SESSION['user_section'] = $_POST['user_section'];
    $_SESSION['user_year'] = $_POST['user_year'];
    $_SESSION['user_member_type'] = $_POST['user_member_type'];
    $_SESSION['user_status'] = 'Online';

    $token = $_SESSION['user_token'];
    $fullname = $_SESSION['user_fullname'];
    $picture = $_SESSION['user_picture'];
    
    $username = $_SESSION['user_username'];
    $password = $_SESSION['user_password'];
    $name = $_SESSION['user_name'];
    $surname = $_SESSION['user_surname'];
    $middle_I = $_SESSION['user_middle_I'];
    $email = $_SESSION['user_email'];
    $student_number = $_SESSION['user_student_number'];
    $course = $_SESSION['user_course'];
    $section = $_SESSION['user_section'];
    $year = $_SESSION['user_year'];
    $member_type = $_SESSION['user_member_type'];
    $status = $_SESSION['user_status'];


    $sql = "SELECT * FROM users WHERE user_token = '$token'";
    $result = mysqli_query($db, $sql);

    if ($result && $result->num_rows == 0) {
        $insert = " INSERT INTO users (user_username, user_password, user_givenName, user_familyName, user_middle_initial, user_fullname, user_email, user_student_number, user_course, user_section, user_year, user_picture, user_created, user_modified, user_type, user_status, user_token)
                            VALUES ('$username', '$password', '$name', '$surname', '$middle_I', '$fullname', '$email', '$student_number', '$course', '$section', '$year', '$picture', NOW(), NOW(), '$member_type', '$status', '$token')";
        mysqli_query($db, $insert);
        mysqli_close($db);
        header("Location: ../../pages/user/profile.php");
        exit();
    } else {
        echo "Invalid DB.";
    }
} else {
    $_SESSION['user_token'] = $_SESSION['temp_token'];
    unset($_SESSION['temp_token']);
    header("Location: ../../pages/user/profile.php");
    exit();
}
// FOR INPUT LOGIN
