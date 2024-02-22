<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('db_local_connection.php');

    $token = $_SESSION['user_token'];

    // Retrieve existing user data
    $sql = "SELECT * FROM users WHERE user_token = '$token'";
    $result = mysqli_query($db, $sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $bioChanged = isset($_POST['updateProfile_bio']) && $_POST['updateProfile_bio'] !== '' && $_POST['updateProfile_bio'] != $user['user_bio'];
        $ageChanged = isset($_POST['updateProfile_age']) && $_POST['updateProfile_age'] !== '' && $_POST['updateProfile_age'] != $user['user_age'];
        $genderChanged = isset($_POST['updateProfile_gender']) && $_POST['updateProfile_gender'] !== '' && $_POST['updateProfile_gender'] != $user['user_gender'];
        $birthdayChanged = isset($_POST['updateProfile_birthday']) && $_POST['updateProfile_birthday'] !== '' && $_POST['updateProfile_birthday'] != $user['user_birthday'];
        $passwordChanged = isset($_POST['updateProfile_new_password']) && $_POST['updateProfile_new_password'] !== '' && password_verify($_POST['updateProfile_old_password'], $user['user_password']);

        if ($bioChanged || $ageChanged || $genderChanged || $birthdayChanged || $usernameChanged || $passwordChanged) {
            $bio = $bioChanged ? $_POST['updateProfile_bio'] : $user['user_bio'];
            $age = $ageChanged ? $_POST['updateProfile_age'] : $user['user_age'];
            $gender = $genderChanged ? $_POST['updateProfile_gender'] : $user['user_gender'];
            $birthday = $birthdayChanged ? $_POST['updateProfile_birthday'] : $user['user_birthday'];
            $new_password = $passwordChanged ? password_hash($_POST['updateProfile_new_password'], PASSWORD_DEFAULT) : $user['user_password'];

            $_SESSION['user_bio'] = $bio;
            $_SESSION['user_age'] = $age;
            $_SESSION['user_gender'] = $gender;
            $_SESSION['user_birthday'] = $birthday;

            $update = "UPDATE users SET user_password = '$new_password', user_bio = '$bio', user_age = '$age', user_gender = '$gender', user_birthday = '$birthday' WHERE user_token = '$token'";
            mysqli_query($db, $update);
        }

        mysqli_close($db);
        header("Location: ../pages/profile.php");
        exit();
    } else {
        echo "Invalid DB.";
    }
}
