<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>
    <title>About Us • Tanza Campus Library</title>
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
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="../../pages/user/tutorials.php">Tutorials</a></li>
                            <li><a class="dropdown-item" href="../../pages/user/events_calendar.php">Events Calendar</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item active" href="../../pages/user/about.php">About Us</a></li>
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
                        <div class="about text-center px-5">
                            <h1>ABOUT US</h1>
                            <br><br>
                            <h3>UNIVERSITY VISION AND MISSION STATEMENTS</h3>
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item border border-0 mb-2">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#mission-collapse">
                                            <h4>MISSION</h4>
                                        </button>
                                    </h2>
                                    <div id="mission-collapse" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <p><em>Cavite State University shall provide excellent, equitable and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities. It shall produce professional, skilled and morally upright individuals for global competitiveness.</em></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border border-0 mb-2">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#vision-collapse">
                                            <h4>VISION</h4>
                                        </button>
                                    </h2>
                                    <div id="vision-collapse" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <p><em>The premier university in historic Cavite globally recognized for excellence in character development, academics, research, innovation and sustainable community engagement.</em></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border border-0 mb-2">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#policy-collapse">
                                            <h4>QUALITY POLICY</h4>
                                        </button>
                                    </h2>
                                    <div id="policy-collapse" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <p><em>We <strong>C</strong>ommit to the highest standards of education, <strong>V</strong>alue our stakeholders, <strong>S</strong>trive for continual improvement of our products and services, and <strong>U</strong>phold the University’s tenets of Truth, Excellence, and Service to produce globally competitive and morally upright individuals.</em></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <h3>LIBRARY OBJECTIVES<mark>(Sample Only)</mark></h3>
                            <ul class="text-start mt-4">
                                <li>To support the school’s graduate and undergraduate programs in its instructional, research and information needs</li>
                                <li>To provide resources, facilities, and services to the Southern Luzon State University academic community as a means to achieve the school’s goals and objective</li>
                                <li>To develop, enrich, and maintain the library collection in terms of the course offered and special programs of the College</li>
                                <li>To extend services to non-SLSU students within the limits of its resources</li>
                            </ul>

                            <br><br>
                            <h3>LIBRARY RULES AND REGULATIONS<mark>(Sample Only)</mark></h3>
                            <ol class="text-start mt-4">
                                <li>Always present your ID as you enter the library.</li>
                                <li>Always leave your belongings, except your valuables at the Baggage Counter Area. The library is not responsible for any loss or damage to your property.</li>
                                <li>Always present to the student assistant on duty any duly borrowed library property you may wish to bring outside the library for inspection.</li>
                            </ol>

                            <br><br>
                            <h3>BORROWING PRIVILEGES<mark>(Sample Only)</mark></h3>
                            <ol class="text-start">
                                <li class="fst-italic mt-3">Reading Room Use only.</li>
                                <ul>
                                    <li>Two (2) non reserved books can be borrowed at a time by library user.</li>
                                    <li>Posters, maps and globes may be borrowed for classroom use and should be returned on the same day.</li>
                                    <li>Reference books such as encyclopedias, yearbooks, dictionaries, newly acquired books, reserved books, thesis, special project, dissertation, periodicals, newspapers, audio-visual materials and vertical file clippings are for <strong>LIBRARY USE ONLY</strong>.</li>
                                </ul>
                                <li class="fst-italic mt-3">Overnight and Home Reading Loans.</li>
                                <ul>
                                    <li>Overnight and Home Reading loans of two (2) non-reserved books are issued from 3:00 – 4:30pm.</li>
                                    <li>It should be returned on or before 9:00am the next school day.</li>
                                    <li>Overnight and home reading loans will start on the second week of the semester.</li>
                                </ul>
                                <li class="fst-italic mt-3">Students can borrow a maximum of two (2) books at a time.</li>
                                <li class="fst-italic mt-3">Alumni are allowed to borrow books for library use only.</li>
                                <li class="fst-italic mt-3">Maximum number of books that can be borrowed by the faculty and employee are as follows:</li>
                                <ul>
                                    <li>Permanent Faculty or College Officials – three (3) titles for two (2) weeks.</li>
                                    <li>Permanent Administrative Staff – two (2) titles for one (1) week.</li>
                                    <li>Part-time Faculty – three (3) titles for two (2) weeks (with Deans certification).</li>
                                </ul>
                            </ol>

                            <br><br>
                            <h5 class="d-flex text-center justify-content-center">Fines – Php <div id="libraryFine">5</div>.00/book/day.<mark>(Sample Only)</mark></h5>

                            <br><br>
                            <h4>Library Hours<mark>(Sample Only)</mark></h4>
                            <img class="w-70 border border-5" src="../../../assets/img/library_hours.jpg" alt="">

                            <br><br>
                            <h4>Guide to CvSU Library<mark>(Sample Only)</mark></h4>
                            <br>
                            <h5>Orientation</h5>
                            <p>The Library Personnel shall orient students and faculty members at the start of each school year on the collections, rules and regulations and the services that the unit offers.</p>
                            <br>
                            <h5>Current Awareness</h5>
                            <p>Bulletin boards are available for announcements, list of newly acquired books, delinquent borrowers and websites.</p>
                            <br>
                            <h5>Library Users</h5>
                            <ul class="text-start">
                                <li><strong>Regular Users</strong> – all bonafide students, staff and faculty members of CvSU Main Campus.</li>
                                <li><strong>Extended Users</strong> – all bonafide students, staff and faculty members of CvSU Campuses as well as alumni; I.D. is required (library resources for Room Use Only).</li>
                                <li><strong>Visitors</strong> – users, not from the CvSU System, who have referral letters from librarians or heads of offices where they are enrolled/employed.</li>
                            </ul>
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

    <!-- Script -->
    <script src="../../assets/vendor/js/about.js" type="module"></script>
    <!-- Script -->
</body>

</html>