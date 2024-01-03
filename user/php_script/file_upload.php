<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photoFile = $_FILES["create_post_photo"];
    // $videoFile = $_FILES["create_post_video"];

    // Check if files are uploaded successfully
    // if ($photoFile["error"] == UPLOAD_ERR_OK && $videoFile["error"] == UPLOAD_ERR_OK) {
    if ($photoFile["error"] == UPLOAD_ERR_OK) {
        // Move the files to a desired directory
        move_uploaded_file($photoFile["tmp_name"], "../assets/vendor/img/user/" . $photoFile["name"]);
        // move_uploaded_file($videoFile["tmp_name"], "uploads/" . $videoFile["name"]);

        echo "Files uploaded successfully!";
    } else {
        echo "Error uploading files.";
    }
}
