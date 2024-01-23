<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "cvsutanzalib_db";

    // $servername = "sql12.freesqldatabase.com";
    // $username = "sql12676046";
    // $password = "yfBL7dwnGM";
    // $database = "sql12676046";

    $conn = mysqli_connect($server, $user, $pass, $db);
    
    if(!$conn)
    {
        die("connection error " . mysqli_connect_error());
    }
?>