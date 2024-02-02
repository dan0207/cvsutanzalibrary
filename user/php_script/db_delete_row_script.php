<?php
session_start();
require_once('db_local_connection.php');

$transactionID = $_POST['transactionID'];

$sql = "DELETE FROM bookreserve WHERE id = $transactionID";

if ($db->query($sql) === TRUE) {
    echo true;
} else {
    echo false;
}