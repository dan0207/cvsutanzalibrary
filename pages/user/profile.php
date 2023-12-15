<?php
session_start();

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
    <?php include '../../php_script/head.php'; ?>
    <link rel="stylesheet" href="../../assets/vendor/css/tables.css">
    <title>Home • Tanza Campus Library</title>
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
        <div class="content container bg-surface border min-vh-100" id="content">
            <div class="row h-100">

                <!-- SIDENAV -->
                <div class="content_sidenav container-fluid rounded-2 me-2 col-3 vh-90 sticky-top z-1">
                    <div class="card container-fluid h-100 p-0 position-relative shadow bg-body-surface">
                        <img src="../../assets/img/bg.png" class="card-img-top h-25 mb-5" alt="Background Picture">
                        <img id="profile_picture" class="profile_picture z-3 position-absolute top-25 start-50 translate-middle rounded-circle img-fluid col-6 col-xl-5 border border-background border-5">
                        <a class="mt-3 mt-xxl-4 mb-5 col-6 col-xl-5 fs-7 mx-auto text-center btn btn-sm rounded-pill btn-outline-primary" type="button">Change Photo</a>
                        <ul class="nav flex-column nav-pills text-center mx-4 py-2 mb-auto" id="navTab_rounded">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile_account_settings" type="button">Account Settings</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#profile_book_transactions" type="button">Book Transactions</a></li>
                        </ul>
                        <a id="logout_btn" class="bg-primary text-onPrimary text-start rounded-0 mb-3 fs-7 mt-auto p-2 btn" href="../../php_script/logout_script.php" type="button">Logout</a>
                    </div>
                </div>
                <!-- SIDENAV -->

                <!-- DETAILS -->
                <div class="content_details container-fluid h-100 rounded-2 mb-5 ms-2 col-8 border shadow bg-body-tertiary p-3">
                    <div class="tab-content">
                        <!-- ACOUNT SETTINGS TAB -->
                        <div class="tab-pane show active fade px-3" id="profile_account_settings">

                            <div class="row border rounded-top-2">
                                <div class="col-9 p-0">
                                    <div class="bg-primary text-onPrimary d-flex align-items-center mt-3 py-1 px-4">
                                        <div class="fs-4 ">
                                            Profile
                                        </div>
                                        <div id="profile_type" class="fs-6 ms-auto"></div>
                                    </div>
                                    <p class="fs-1 px-4 pt-4" id="profile_name"></p>
                                    <p class="fs-5 px-4 py-0" id="profile_student_number"></p>
                                    <p class="fs-5 px-4 py-0" id="profile_email"></p>
                                </div>
                                <div class="col-3 p-4">
                                    <div id="profile_qr_code_container" class="text-center">
                                        <img src="../../assets/img/sample-qr-code.png" id="profile_qr_code_image" alt="QR Code" class="img-responsive ms-auto w-90 border border-5 border-primary rounded-4 mb-2 shadow bg-body-surface">
                                        <p class="text-center m-0 p-0 mx-auto">Library ID:</p>
                                        <p id="library_id" class="text-center m-0 p-0 mx-auto fs-8">Sample QR Code</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row border rounded-bottom-2">
                                <p class="text-center fs-1">USER INFO</p>
                            </div>
                        </div>
                        <!-- ACOUNT SETTINGS TAB -->


                        <!-- BOOK TRANSACTIONS TAB -->
                        <div class="tab-pane fade px-2" id="profile_book_transactions">
                            <div class="border text-center bg-primary text-onPrimary rounded-2 fs-1">
                                Book Transactions (SAMPLE ONLY)
                            </div>
                            <div class="book_transactions_tab">
                                <ul class="nav nav-pills nav-justified text-center m-2" id="navTab_rounded">
                                    <li class="nav-item"><a class="py-2 nav-link active" data-bs-toggle="tab" data-bs-target="#book_request_tabpane" type="button">Book Request</a></li>
                                    <li class="nav-item"><a class="py-2 nav-link" data-bs-toggle="tab" data-bs-target="#handled_book_tabpane" type="button">Handled Book</a></li>
                                    <li class="nav-item"><a class="py-2 nav-link" data-bs-toggle="tab" data-bs-target="#transaction_history_tabpane" type="button">Transactions History</a></li>
                                </ul>
                            </div>

                            <div class="tab-content m-2" id="book_transactions_tabpane">
                                <div class="tab-pane show active fade" id="book_request_tabpane">
                                    <div class="book_request_table ">
                                        <?php
                                        include '../../tables/user_book_request_table.php';
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="handled_book_tabpane">
                                    <div class="handled_book_table">
                                        <?php
                                        include '../../tables/user_hanled_book_table.php';
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="transaction_history_tabpane">
                                    <div class="transaction_history_table">
                                        <?php
                                        include '../../tables/user_book_transaction_table.php';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- BOOK TRANSACTIONS TAB -->
                    </div>
                </div>
                <!-- DETAILS -->
            </div>
        </div>
    </div>
    <!-- Main -->


    <!-- Footer -->
    <?php include '../../php_script/footer.php'; ?>
    <!-- Footer -->

    <!-- Script -->
    <script async src="../../assets/vendor/js/profile.js" type="module"></script>
    <!-- Script -->
</body>

</html>