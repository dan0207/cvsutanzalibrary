<?php
session_start();


function datatable_books()
{
    $primaryKey = 'book_id';
    $columns = array(
        array('db' => 'book_access_number',        'dt' => 0),
        array('db' => 'book_title',                'dt' => 1),
        array('db' => 'book_author',               'dt' => 2),
        array('db' => 'book_call_number',          'dt' => 3),
        array('db' => 'book_material_type',        'dt' => 4),
        array('db' => 'book_language',             'dt' => 5),
        array('db' => 'book_publication_details',  'dt' => 6),
        array('db' => 'book_description',          'dt' => 7),
        array('db' => 'book_content_type',         'dt' => 8),
        array('db' => 'book_media_type',           'dt' => 9),
        array('db' => 'book_carrier_type',         'dt' => 10),
        array('db' => 'book_isbn',                 'dt' => 11),
        array('db' => 'book_subject',              'dt' => 12),
        array('db' => 'book_classification',       'dt' => 13),
        array('db' => 'book_availability',         'dt' => 14),
        array('db' => 'book_btn',                  'dt' => 15)
    );

    $where = "";

    return [
        'primaryKey' => $primaryKey,
        'columns' => $columns,
        'where' => $where
    ];
}
function datatable_bookreserve()
{
    $primaryKey = 'id';
    $columns = array(
        array('db' => 'id',         'dt' => 0),
        array('db' => 'status',     'dt' => 1),
        array('db' => 'pickupDate', 'dt' => 2),
        array('db' => 'returnDate', 'dt' => 3),
        array('db' => 'bookTitle',  'dt' => 4),
        array('db' => 'action_btn', 'dt' => 5)
    );

    $where = "libraryid =" . $_SESSION['user_token'] . "";

    return [
        'primaryKey' => $primaryKey,
        'columns' => $columns,
        'where' => $where
    ];
}

function datatable_bookborrowed()
{
    $primaryKey = 'id';
    $columns = array(
        array('db' => 'id',         'dt' => 0),
        array('db' => 'pickupDate', 'dt' => 1),
        array('db' => 'returnDate', 'dt' => 2),
        array('db' => 'bookTitle',  'dt' => 3),
    );

    $where = "libraryid =" . $_SESSION['user_token'] . "";

    return [
        'primaryKey' => $primaryKey,
        'columns' => $columns,
        'where' => $where
    ];
}
function datatable_booktransaction()
{
    $primaryKey = 'id';
    $columns = array(
        array('db' => 'id',         'dt' => 0),
        array('db' => 'pickupDate', 'dt' => 1),
        array('db' => 'returnDate', 'dt' => 2),
        array('db' => 'bookTitle',  'dt' => 3),
    );

    $where = "libraryid =" . $_SESSION['user_token'] . "";

    return [
        'primaryKey' => $primaryKey,
        'columns' => $columns,
        'where' => $where
    ];
}



function datatable()
{
    $table = isset($_GET['table']) ? $_GET['table'] : '';

    if ($table == 'books') {
        $result = datatable_books();
    } else if ($table == 'bookreserve') {
        $result = datatable_bookreserve();
    } else if ($table == 'bookborrowed') {
        $result = datatable_bookborrowed();
    } else if ($table == 'booktransaction') {
        $result = datatable_booktransaction();
    }

    $primaryKey = $result['primaryKey'];
    $columns = $result['columns'];
    $where = $result['where'] ? $result['where'] : '';

    $sql_details = array(
        'user' => 'root',
        'pass' => '',
        'db' => 'cvsutanzalib_db',
        'host' => 'localhost',
    );
    require('ssp.class.php');

    echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where));
}

datatable();
