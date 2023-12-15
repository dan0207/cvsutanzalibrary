<?php
session_start();

//  Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "tanza_campus_library";

// Create a new MySQLi connection
$db = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $d->connect_error);
}

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

        $_SESSION['temp_token'] = $user_token;

        $_SESSION['user_givenName'] = $user_givenName;
        $_SESSION['user_familyName'] = $user_familyName;
        $_SESSION['user_fullname'] = $user_fullname;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_picture'] = $user_picture;


        // Check whether the user data already exists in the database
        $sql = "SELECT * FROM users WHERE user_token = '$user_token'";
        $result = mysqli_query($db, $sql);
        mysqli_close($db);

        if ($result && $result->num_rows == 0) {
            $new_account = true;
        } else {
            $_SESSION['user_token'] = $user_token;
        }
    }
}

echo json_encode($new_account);

exit();
?>
