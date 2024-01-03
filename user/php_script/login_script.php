<?php
session_start();

// FOR INPUT LOGIN
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('db_connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the user's information from the database
    $stmt = $db->prepare("SELECT * FROM users WHERE user_username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['user_password'] === $password) {
            $_SESSION['user_token'] = $user['user_token'];
            $_SESSION['user_username'] = $user['user_username'];
            $_SESSION['user_password'] = $user['user_password'];
            $_SESSION['user_givenName'] = $user['user_givenName'];
            $_SESSION['user_familyName'] = $user['user_familyName'];
            $_SESSION['user_middle_initial'] = $user['user_middle_initial'];
            $_SESSION['user_fullname'] = $user['user_fullname'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_student_number'] = $user['user_student_number'];
            $_SESSION['user_course'] = $user['user_course'];
            $_SESSION['user_section'] = $user['user_section'];
            $_SESSION['user_year'] = $user['user_year'];
            $_SESSION['user_picture'] = $user['user_picture'];
            $_SESSION['user_created'] = $user['user_created'];
            $_SESSION['user_modified'] = $user['user_modified'];
            $_SESSION['user_type'] = $user['user_type'];
            $_SESSION['user_status'] = $user['user_status'];
            header("Location: ../pages/profile.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
// FOR INPUT LOGIN