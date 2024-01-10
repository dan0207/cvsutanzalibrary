<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('db_local_connection.php');

    $rating = isset($_POST['rating']) ? mysqli_real_escape_string($db, $_POST['rating']) : '';
    $category = isset($_POST['category']) ? mysqli_real_escape_string($db, $_POST['category']) : '';
    $subject = isset($_POST['subject']) ? mysqli_real_escape_string($db, $_POST['subject']) : '';
    $comments = isset($_POST['comments']) ? mysqli_real_escape_string($db, $_POST['comments']) : '';

    if ($db && $result = mysqli_query($db, "SELECT * FROM ratings")) {
        $insert = "INSERT INTO ratings (category, subject, rating, comments) VALUES ('$category', '$subject', '$rating', '$comments')";
        if (mysqli_query($db, $insert)) {
            mysqli_close($db);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
