<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
    
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acquisition</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <section>
                <h1 id="pageHeader">Calendar of Events</h1>
                <div class="container-fluid text-center p-5">
                    <a class="btn btn-success mx-auto" href="../render/calendar/add_new_event.php">Add Event</a>
                </div>
            </section>
        </div>







        <script src="../assets/script/script.js"></script>
    </body>
</html>