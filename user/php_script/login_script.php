<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('db_local_connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE user_username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['user_password'])) {
            $update = $db->prepare("UPDATE users SET user_status = 'Online' WHERE user_token = ?");
            $update->bind_param("s", $user['user_token']);
            $update->execute();

            $_SESSION['user_token'] = $user['user_token'];
            $_SESSION['user_username'] = $user['user_username'];
            $_SESSION['user_password'] = $user['user_password'];
            $_SESSION['user_givenName'] = $user['user_givenName'];
            $_SESSION['user_familyName'] = $user['user_familyName'];
            $_SESSION['user_middleI'] = $user['user_middleI'];
            $_SESSION['user_fullname'] = $user['user_fullname'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_student_number'] = $user['user_student_number'];
            $_SESSION['user_student_course'] = $user['user_student_course'];
            $_SESSION['user_student_section'] = $user['user_student_section'];
            $_SESSION['user_student_year'] = $user['user_student_year'];
            $_SESSION['user_faculty_number'] = $user['user_faculty_number'];
            $_SESSION['user_faculty_department'] = $user['user_faculty_department'];
            $_SESSION['user_picture'] = $user['user_picture'];
            $_SESSION['user_created'] = $user['user_created'];
            $_SESSION['user_modified'] = $user['user_modified'];
            $_SESSION['user_member_type'] = $user['user_member_type'];
            $_SESSION['user_bio'] = $user['user_bio'];
            $_SESSION['user_age'] = $user['user_age'];
            $_SESSION['user_gender'] = $user['user_gender'];
            $_SESSION['user_birthday'] = $user['user_birthday'];

            header("Location: ../pages/profile.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $update->close();
    mysqli_close($db);
}
