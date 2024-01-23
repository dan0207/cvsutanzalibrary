<?php
session_start();
include '../php_script/main_script.php';

if (!isset($_SESSION["user_token"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../web_contents/head.php'; ?>
    <link rel="stylesheet" href="../assets/vendor/css/tables.css">
    <title>Profile • Tanza Campus Library</title>
</head>

<body>
    <!-- Header -->
    <?php include '../web_contents/header.php'; ?>
    <!-- Header -->

    <!-- Main -->
    <div class="contents">

        <div id="services_contents" class="main-contents" data-aos="fade-in" data-aos-duration="1000">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <?php include '../web_contents/profile-sidebar.php'; ?>
                    </div>
                    <div class="col-12 col-lg-9">
                        <?php include '../web_contents/profile-info.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->


    <!-- Footer -->
    <?php include '../web_contents/footer.php'; ?>
    <!-- Footer -->


    <!-- Script -->
    <script src="../assets/vendor/js/profile.js" type="module"></script>
    <!-- Script -->

</body>

</html>