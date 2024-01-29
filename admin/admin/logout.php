<?php
session_start();
// Destroy the session and logout the user
unset($_SESSION['username']);
session_destroy();
header("Location: ../index.php"); // Redirect to the login page after logout
exit;
