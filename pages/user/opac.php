<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>

</html>
<title>OPAC • Tanza Campus Library</title>
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-onSurface bg-surface border-bottom fixed-top">
        <div class="container-fluid d-flex">

            <!-- CVSU LIBRARY LOGO -->
            <a class="navbar-brand p-0" href="opac.php" type="button">
                <img src="../../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" width="210" class="img-responsive">
            </a>
            <!-- CVSU LIBRARY LOGO -->

            <!-- NAVBAR TOGGLER ICON FOR ANDROIND RESOLUTION -->
            <button class="navbar-toggler fs-6 py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <!-- NAVBAR TOGGLER ICON FOR ANDROIND RESOLUTION -->

            <div class="collapse navbar-collapse w-60 px-3" id="navbarSupportedContent">

                <ul class="navbar-nav nav-pills text-center d-flex ms-auto" id="navTab_pill">
                    <li class="nav-item"><a class="nav-link active" href="../../pages/user/opac.php" hidden>OPAC</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/books.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/acquisitions.php">Acquisitions</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="../../pages/user/tutorials.php">Tutorials</a></li>
                            <li><a class="dropdown-item" href="../../pages/user/events_calendar.php">Events Calendar</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../pages/user/about.php">About Us</a></li>
                        </ul>
                    </li>
                    <?php
                    if (!isset($_SESSION['user_token'])) echo "<li id='login_tab' class='nav-item'><a class='nav-link' href='../../pages/user/login.php'>Login</a></li>";
                    else echo "<li id='profile_tab' class='nav-item'><a class='nav-link' href='../../pages/user/profile.php'>Profile</a></li>";
                    ?>
                </ul>
            </div>

        </div>
    </nav>
    <!-- Header -->

    <!-- Main -->
    <div class="opac_background">
        <div class="opac_mask" style="background-color: rgb(0,114,5,0.60);">
            <div class="opac_page vh-100 d-flex align-items-center justify-content-center text-center p-2 text-onPrimary">
                <div class="opac_content">
                    <h1 class="opac_title display-1" style="font-family:Impact">TANZA CAMPUS LIBRARY</h1>
                    <h4 class="opac_label fs-6 fs-sm-5 fs-md-4 w-65 mx-auto bg-primary px-1 py-1 rounded-pill border border-onPrimary border-2">Online Public Access Catalog</h4>
                    <div class="opac_search input-group m-auto w-90">
                        <input type="text" class="opac_search_input form-control rounded-start-pill py-2 px-3" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
                        <button class="opac_search_btn btn btn-outline-primary border-2 border-onPrimary text-onPrimary rounded-end-pill py-2 px-3" type="button">
                            <i class="">Search</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->

    
    <!-- Footer -->
    <?php include '../../php_script/footer.php';
    ?>
    <!-- Footer -->


    <!-- Script -->
    <script src="../../assets/vendor/js/opac.js" type="module"></script>
    <!-- Script -->

</body>