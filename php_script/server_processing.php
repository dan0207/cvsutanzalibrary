<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See https://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - https://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'books';
 
// Table's primary key
$primaryKey = 'book_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'book_title',                'dt' => 0 ),
    array( 'db' => 'book_author',               'dt' => 1 ),
    array( 'db' => 'book_access_number',        'dt' => 2 ),
    array( 'db' => 'book_call_number',          'dt' => 3 ),
    array( 'db' => 'book_material_type',        'dt' => 4 ),
    array( 'db' => 'book_language',             'dt' => 5 ),
    array( 'db' => 'book_publication_details',  'dt' => 6 ),
    array( 'db' => 'book_description',          'dt' => 7 ),
    array( 'db' => 'book_content_type',         'dt' => 8 ),
    array( 'db' => 'book_media_type',           'dt' => 9 ),
    array( 'db' => 'book_carrier_type',         'dt' => 10 ),
    array( 'db' => 'book_isbn',                 'dt' => 11 ),
    array( 'db' => 'book_subject',              'dt' => 12 ),
    array( 'db' => 'book_classification',       'dt' => 13 ),
    array( 'db' => 'book_availability',         'dt' => 14 ),
    array( 'db' => 'book_btn',                  'dt' => 15 )
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