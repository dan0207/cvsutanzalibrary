<?php
session_start();
include '../php_script/main_script.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../web_contents/head.php'; ?>
    <title>Home • Tanza Campus Library</title>
</head>

<body>
    <!-- Header -->
    <?php include '../web_contents/header.php'; ?>
    <!-- Header -->

    <!-- Main -->
    <div class="contents pt-5">
        <div class="opac">
            <?php include '../web_contents/opac.php'; ?>
        </div>

        <div id="home_contents" class="main-contents" data-aos="fade-in" data-aos-duration="1000">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                        <?php include '../web_contents/left-sidebar.php'; ?>
                    </div>
                    <div class="col-12 col-lg-6 order-1 order-lg-2 px-0">
                        <?php include '../web_contents/about.php'; ?>
                    </div>
                    <div class="col-12 col-lg-3 order-3 order-lg-3" data-aos="fade-left" data-aos-duration="1000">
                        <?php include '../web_contents/right-sidebar.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->

    <!-- Footer -->
    <div class="mt-auto">
        <?php include '../web_contents/footer.php'; ?>
    </div>
    <!-- Footer -->

    <!-- Script -->
    <script src="../assets/vendor/js/home.js" type="module"></script>
    <!-- Script -->
</body>

</html>