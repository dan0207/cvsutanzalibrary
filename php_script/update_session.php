<?php
session_start();

header('Content-Type: application/json');

if (isset($_SESSION['user_token']) || isset($_SESSION['temp_token'])) {
    echo json_encode($_SESSION);
} else {
    echo json_encode(NULL);
}
