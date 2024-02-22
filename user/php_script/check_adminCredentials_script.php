<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('db_local_connection.php');

    $username = $_POST['username'];
    $enteredPassword = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM moderator WHERE user_username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($enteredPassword, $admin['user_password'])) {
            echo json_encode(['status' => true, 'message' => 'Credentials verified']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['status' => false, 'message' => 'User not found']);
    }

    $stmt->close();
    mysqli_close($db);
} else {
    echo json_encode(['status' => false, 'message' => 'Invalid request method']);
}
