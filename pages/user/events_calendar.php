<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>
    <title>Events Calendar • Tanza Campus Library</title>
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

            <!-- OPAC SEARCH FOR HEADER -->
            <div class="opac_search_top input-group d-none d-sm-flex d-lg-none w-50" id="">
                <input type="text" class="opac_search_input form-control rounded-start-2 fs-7" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
                <button class="opac_search_btn btn btn-outline-primary rounded-end-2 px-3 fs-7" type="button">Search</button>
            </div>
            <!-- OPAC SEARCH FOR HEADER -->

            <!-- SEARCH ICON FOR ANDROID RESOLUTION -->
            <button class="opac_search_top_icon navbar-toggler ms-auto d-sm-none fs-6 py-2 mx-1" type="button" data-bs-toggle="collapse" data-bs-target="#opac_search_top_collapse" id="opac_search_top_icon">
                <i class="fa fa-search"></i>
            </button>
            <!-- SEARCH ICON FOR ANDROID RESOLUTION -->

            <!-- NAVBAR TOGGLER ICON FOR ANDROIND RESOLUTION -->
            <button class="navbar-toggler fs-6 py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <!-- NAVBAR TOGGLER ICON FOR ANDROIND RESOLUTION -->

            <!-- OPAC SEARCH FOR HEADER WITH COLLAPSE -->
            <div class="opac_search_top_collapse collapse navbar-collapse input-group w-30 px-2 d-sm-none py-3 py-lg-0" id="opac_search_top_collapse">
                <input type="text" class="opac_search_input form-control rounded-start-2 px-3 fs-7" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
                <button class="opac_search_btn btn btn-outline-primary rounded-end-2 px-3 fs-7" type="button">Search</button>
            </div>
            <!-- OPAC SEARCH FOR HEADER WITH COLLAPSE -->

            <div class="collapse navbar-collapse w-60 px-3" id="navbarSupportedContent">

                <ul class="navbar-nav nav-pills text-center d-flex ms-auto" id="navTab_pill">
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/opac.php" hidden>OPAC</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/books.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pages/user/acquisitions.php">Acquisitions</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu active text-center">
                            <li><a class="dropdown-item" href="../../pages/user/tutorials.php">Tutorials</a></li>
                            <li><a class="dropdown-item active" href="../../pages/user/events_calendar.php">Events Calendar</a></li>
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
                        <div class="eventsCalendar text-center">
                            <h1 class="my-3">CALENDAR OF EVENTS</h1>
                            <div class="container">
                                <div class="calendarContainer">
                                    <div class="calendar border shadow bg-body-surfaces rounded-3">
                                        <div class="goto-today">
                                            <div class="goto">
                                                <div class="input-group">
                                                    <input type="text" class="date-input form-control rounded-start-2" placeholder="MM/YYYY">
                                                    <button class="goto-btn btn btn-outline-primary rounded-end-2 px-3" type="button">GO</button>
                                                </div>
                                            </div>
                                            <button class="today-btn btn btn-outline-primary rounded-2 px-4">Today</button>
                                        </div>
                                        <div class="month">
                                            <i class="prev fas fa-angle-left"></i>
                                            <div class="date">december 2015</div>
                                            <i class="next fas fa-angle-right"></i>
                                        </div>
                                        <div class="weekdays">
                                            <div>Sun</div>
                                            <div>Mon</div>
                                            <div>Tue</div>
                                            <div>Wed</div>
                                            <div>Thu</div>
                                            <div>Fri</div>
                                            <div>Sat</div>
                                        </div>
                                        <div class="days"></div>
                                        <button id="add_new_event_btn" class="btn btn-outline-primary rounded-2 w-80 py-2 mb-2">Add New Event</button>
                                    </div>
                                </div>
                                <div id="organizerContainer" class="organizerContainer border shadow bg-body-surfaces rounded-3">
                                    <div class="today-date">
                                        <div class="event-day">wed</div>
                                        <div class="event-date">12th december 2022</div>
                                    </div>
                                    <div class="events"></div>
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
    <script src="../../assets/vendor/js/events_calendar.js" type="module"></script>
    <!-- Scripts -->
</body>

</html>