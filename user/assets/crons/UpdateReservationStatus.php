<?php
session_start();
require_once('../../php_script/db_local_connection.php');


$sql = "UPDATE bookreserve
        SET status = 'to pickup'
        WHERE status = 'hold'
        AND timestamp <= NOW() - INTERVAL 1 MINUTE";
echo "hello world\n";
mysqli_query($db, $sql);
mysqli_close($db);
