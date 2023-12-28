<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>
    <title>Tutorials • Tanza Campus Library</title>
</head>

<body>
    <!-- Header -->
    <?php include '../../php_script/header.php'; ?>
    <!-- Header -->

    <!-- Main -->
    <div class="background container-fluid bg-background">
        <div class="main container bg-surface">
            <div class="row border rounded-3">
                <div class="content col-sm-12 col-lg-8 my-5">
                    <div class="container-fluid my-5">
                        <div class="tutorials text-center px-5">
                            <h1>LIBRARY TUTORIALS</h1>
                            <br><br>
                            <h3>HOW TO CREATE REQUEST TO BORROW BOOKS</h3>
                            <div class="video ratio ratio-16x9">
                                <!-- <iframe src="" title="YouTube video" allowfullscreen></iframe> -->
                                <img src="../../assets/img/sample video tutorial.png" alt="">
                            </div>
                            <div class="details text-start my-3">
                                <h5>You can manually create a borrowing request by entering information about the resource into a blank borrowing-request form.</h5>
                                <h6>To add a borrowing request manually:</h6>
                                <ol>
                                    <li>On the Home page, you can see a search bar.</li>
                                    <li>Type your desired book you want to request to Borrow book.</li>
                                    <li>Click Search and system redirect you to Books page.</li>
                                    <li>It shows all the books related to the type you want to Borrow book</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar col-sm-12 col-lg-4 px-5 pe-lg-5 ps-lg-0">
                    <?php
                    include '../../php_script/right-sidebar.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->


    <!-- Footer -->
    <?php include '../../php_script/footer.php'; ?>
    <!-- Footer -->


    <!-- Script -->
    <script src="../../assets/vendor/js/tutorials.js" type="module"></script>
    <!-- Script -->
</body>

</html>