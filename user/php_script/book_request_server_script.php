<?php
 
// DB table to use
$table = 'bookreserve';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id',                'dt' => 0 ),
    array( 'db' => 'bookAccessNo',      'dt' => 1 ),
    array( 'db' => 'bookTitle',         'dt' => 2 ),
    array( 'db' => 'bookAuthor',        'dt' => 3 ),
    array( 'db' => 'pickupDate',        'dt' => 4 ),
    array( 'db' => 'returnDate',        'dt' => 5 ),
    array( 'db' => 'action_btn',        'dt' => 6 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'cvsutanzalib_db',
    'host' => 'localhost'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);