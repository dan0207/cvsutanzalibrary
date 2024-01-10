<?php
session_start();

require_once('db_local_connection.php');

// Retrieve JSON from POST body
$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);

// Check if JSON decoding was successful
if ($jsonObj === null && json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON data']);
    exit();
}

$new_account = false;

// Check if the request type is 'user_auth'
if (!empty($jsonObj->request_type) && $jsonObj->request_type == 'user_auth') {
    $credential = !empty($jsonObj->credential) ? $jsonObj->credential : '';

    // Decode response payload from JWT token
    list($header, $payload, $signature) = explode(".", $credential);
    $responsePayload = json_decode(base64_decode($payload));

    if (!empty($responsePayload)) {
        // Use prepared statements to prevent SQL injection
        $user_token = mysqli_real_escape_string($db, $responsePayload->sub);
        $user_givenName = mysqli_real_escape_string($db, $responsePayload->given_name);
        $user_familyName = mysqli_real_escape_string($db, $responsePayload->family_name);
        $user_fullname = mysqli_real_escape_string($db, $responsePayload->name);
        $user_email = mysqli_real_escape_string($db, $responsePayload->email);
        $user_picture = mysqli_real_escape_string($db, $responsePayload->picture);


        $user_token = $_SESSION['temp_token'] = substr((string)$user_token, -8);

        $_SESSION['user_givenName'] = $user_givenName;
        $_SESSION['user_familyName'] = $user_familyName;
        $_SESSION['user_fullname'] = $user_fullname;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_picture'] = $user_picture;




        // Check whether the user data already exists in the database
        $sql = "SELECT * FROM users WHERE user_token = '$user_token'";
        $result = mysqli_query($db, $sql);

        if ($result && $result->num_rows == 0) {
            $new_account = true;
        } else {
            $user = $result->fetch_assoc();
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
            $_SESSION['user_type'] = $user['user_member_type'];
            $_SESSION['user_status'] = $user['user_status'];
        }
        
        mysqli_close($db);
    }
}

echo json_encode($new_account);

exit();
