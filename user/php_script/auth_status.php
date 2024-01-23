
<?php
session_start();
header('Content-Type: application/json');

function isAuthenticated(){
    return isset($_SESSION['user_token']);
}

echo json_encode(['isAuthenticated' => isAuthenticated()]);
?>
