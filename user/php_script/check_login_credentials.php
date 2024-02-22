<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('db_local_connection.php');

    $username = $_POST['username'] ?? '';
    $enteredPassword = $_POST['password'] ?? '';
    


    $stmt = $db->prepare("SELECT * FROM users WHERE user_username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($enteredPassword, $user['user_password'])) {
            echo json_encode(['status' => 'success', 'username' => $username]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }

    $stmt->close();
    mysqli_close($db);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
