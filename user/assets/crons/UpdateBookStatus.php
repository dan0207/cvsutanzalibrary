<?php
session_start();
require_once('../../php_script/db_local_connection.php');


$sql = "UPDATE books
        SET book_status = 
            CASE
                WHEN book_copy > 1 THEN 'Available to Borrow'
                WHEN book_copy = 1 THEN 'Room Use Only'
                ELSE 'Not Available'
            END";
            
echo "hello world\n";

mysqli_query($db, $sql);
mysqli_close($db);
