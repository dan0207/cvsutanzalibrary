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
    <title>Books • Tanza Campus Library</title>
</head>

<body>
    <!-- Header -->
    <?php include '../web_contents/header.php'; ?>
    <!-- Header -->

    <!-- Main -->
    <div class="contents d-print-none">

        <div id="book_contents" class="main-contents" data-aos="fade-in" data-aos-duration="1000">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3 order-2 order-lg-1">
                        <?php include '../web_contents/left-sidebar.php'; ?>
                    </div>
                    <div class="col-12 col-lg-6 order-1 order-lg-2 px-0">
                        <?php include '../web_contents/book-list.php'; ?>
                    </div>
                    <div class="col-12 col-lg-3 ms-auto order-3 order-lg-3">
                        <?php include '../web_contents/right-sidebar.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->


    <!-- Footer -->
    <?php include '../web_contents/footer.php'; ?>
    <!-- Footer -->


    <!-- Scripts -->
    <script src="../assets/vendor/js/book.js" type="module"></script>
    <!-- Scripts -->

</body>

</html>