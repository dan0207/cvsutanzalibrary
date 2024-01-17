<?php
session_start();

$table = 'bookreserve';

$primaryKey = 'id';

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'status', 'dt' => 1),
    array('db' => 'pickupDate', 'dt' => 2),
    array('db' => 'returnDate', 'dt' => 3),
    array('db' => 'bookTitle', 'dt' => 4),
    array('db' => 'action_btn', 'dt' => 5)
);

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db' => 'cvsutanzalib_db',
    'host' => 'localhost',
);

 require( 'ssp.class.php' );
 $where = "libraryid =".$_SESSION['user_token']."";
 echo json_encode(
     SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,$where )
 );
