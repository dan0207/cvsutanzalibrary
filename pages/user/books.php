<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>
    <link rel="stylesheet" href="../../assets/vendor/css/tables.css">
    <title>Books • Tanza Campus Library</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-onSurface bg-surface border-bottom fixed-top">
        <div class="container-fluid d-flex">

            <!-- CVSU LIBRARY LOGO -->
            <a class="navbar-brand p-0" type="button">
                <img src="../../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" width="210" class="img-responsive">
            </a>
            <!-- CVSU LIBRARY LOGO -->

            <!-- OPAC SEARCH FOR HEADER -->
            <div class="opac_search_top input-group d-none d-sm-flex d-lg-none w-50" id="opac_search_top" style="visibility: hidden;">
                <input id="opac_search_top_input" type="text" class="opac-search-input form-control rounded-start-2 fs-7" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
                <button id="opac_search_top_btn" class="opac_search_btn btn btn-outline-primary rounded-end-2 px-3 fs-7" type="button">Search</button>
            </div>
            <!-- OPAC SEARCH FOR HEADER -->

            <!-- SEARCH ICON FOR ANDROID RESOLUTION -->
            <button class="opac_search_top_icon navbar-toggler ms-auto d-sm-none fs-6 py-2 mx-1" type="button" data-bs-toggle="collapse" data-bs-target="#opac_search_top_collapse" id="opac_search_top_icon" style="visibility: hidden;">
                <i class="fa fa-search"></i>
            </button>
            <!-- SEARCH ICON FOR ANDROID RESOLUTION -->

            <!-- NAVBAR TOGGLER ICON FOR ANDROIND RESOLUTION -->
            <button class="navbar-toggler fs-6 py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <!-- NAVBAR TOGGLER ICON FOR ANDROIND RESOLUTION -->

            <!-- OPAC SEARCH FOR HEADER WITH COLLAPSE -->
            <div class="opac_search_top_collapse collapse navbar-collapse input-group w-30 px-2 d-sm-none py-3 py-lg-0" id="opac_search_top_collapse" style="visibility: hidden;">
                <input id="opac_search_top_collapse_input" type="text" class="opac-search-input form-control rounded-start-2 px-3 fs-7" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
                <button id="opac_search_top_collapse_btn" class="opac_search_btn btn btn-outline-primary rounded-end-2 px-3 fs-7" type="button">Search</button>
            </div>
            <!-- OPAC SEARCH FOR HEADER WITH COLLAPSE -->

            <div class="collapse navbar-collapse w-60 px-3" id="navbarSupportedContent">

                <ul class="navbar-nav nav-pills text-center d-flex ms-auto" id="navTab_pill">
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/opac.php" hidden>OPAC</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../../pages/user/books.php">Books</a></li>
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
    <div class="background container-fluid bg-background">
        <div class="main container bg-surface">
            <div class="row border rounded-3">
                <div class="content col-sm-12 col-lg-8 my-5">
                    <div class="container-fluid my-5">
                        <div class="container px-5">
                            <div id="book_search" class="book_search my-3">
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-2 text-onPrimary bg-primary d-none d-md-flex">Library Catalog</span>
                                    <input id="book_search_input" type="text" class="rounded-start-2 form-control" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
                                    <button id="book_search_btn" class="btn btn-outline-primary rounded-end-2 px-3" type="button">Search</button>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-12 col-md-3 col-lg-12 col-xl-4 col-xxl-5 d-flex justify-content-center justify-content-xl-start align-items-center mx-auto book-page-length">
                                    <label for="pageLengthSelect">Show </label>
                                    <select class="pageLengthSelect">
                                        <option value="10">10</option>
                                        <option value="25">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    entries
                                </div>
                                <div class="col-12 col-md-8 col-lg-12 col-xl-8 col-xxl-7 d-flex px-3">
                                    <div class="d-flex me-auto align-items-center">
                                        <div class="colored-box d-flex border mx-2" style="width:20px; height:20px; background-color: rgb(0, 114, 5, 0.05);"></div>
                                        <span class="text-primary fst-italic">Available to Borrow</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="colored-box d-flex border mx-2" style="width:20px; height:20px; background-color: rgb(255, 0, 0, 0.05);"></div>
                                        <span class="text-secondary fst-italic">Room Use Only</span>
                                    </div>
                                </div>
                            </div>
                            <div class="book-list-container border rounded-3 w-100 overflow-hidden">
                                <div id="book_list_table" class="book-list-table">
                                    <?php include '../../tables/book_list_table.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar col-sm-12 col-lg-4 px-5 pe-lg-5 ps-lg-0">
                    <?php
                    include '../../php_script/sidebar.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->


    <!-- Footer -->
    <?php include '../../php_script/footer.php'; ?>
    <!-- Footer -->


    <!-- Scripts -->
    <script src="../../assets/vendor/js/book.js" type="module"></script>
    <!-- Scripts -->

</body>

</html>