<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>
    <title>Services • Tanza Campus Library</title>
</head>

<body>
    <!-- Header -->
    <?php include '../../web_contents/header.php'; ?>
    <!-- Header -->


    <!-- Main -->
    <div class="background container-fluid bg-background">
        <div class="main container bg-surface">
            <div class="row border rounded-3">
                <div class="content col-sm-12 col-lg-8 my-5">
                    <div class="container-fluid my-5">
                        <div class="services text-center">
                            <h1>LIBRARY SERVICES</h1>
                            <br><br><br>
                            <h3><a class="text-onSurface" href="#">READERS SERVICES</a></h3>
                            <h3><a class="text-onSurface" href="#">CURRENT AWARENESS SERVICE</a></h3>
                            <h3><a class="text-onSurface" href="#">INTERNET SERVICE</a></h3>
                            <h3><a class="text-onSurface" href="#">REFERRAL SERVICES</a></h3>
                            <br><br><br><br><br><br>
                            <h3><a class="text-onSurface" href="#">CAVITE STATE UNIVERSITY <br> TANZA CAMPUS <br> LIBRARY GUIDE</a></h3>
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
    <?php include '../../web_contents/footer.php'; ?>
    <!-- Footer -->


    <!-- Script -->
    <script src="../../assets/vendor/js/services.js" type="module"></script>
    <!-- Script -->

</body>

</html>