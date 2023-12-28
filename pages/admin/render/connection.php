<?php
    $server = "192.168.1.32";
    $user = "user";
    $pass = "User8888$$$";
    $db = "Cvsu-library";

    $conn = mysqli_connect($server, $user, $pass, $db);
    
    if(!$conn)
    {
        die("connection error " . mysqli_connect_error());
    }
?>