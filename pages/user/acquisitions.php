<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>
    <title>Acquisitions • Tanza Campus Library</title>
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
                        <div class="acquisitions text-center">
                            <h1>ACQUISITIONS</h1>
                            <br><br>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2023</a></h3>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2022</a></h3>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2021</a></h3>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2020</a></h3>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2019</a></h3>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2018</a></h3>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2017</a></h3>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2016</a></h3>
                            <h3 class="my-4"><a class="text-onSurface" href="">NEW ARRIVAL BOOKS 2015</a></h3>
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
    <script src="../../assets/vendor/js/acquisitions.js" type="module"></script>
    <!-- Script -->
</body>

</html>