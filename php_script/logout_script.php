<?php
session_start();
unset($_SESSION['user_token']);
session_destroy();
header("Location: ../../pages/user/login.php");
exit();
