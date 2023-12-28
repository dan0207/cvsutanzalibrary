<?php
// Get the current page filename
$current_page = trim(ucfirst(basename($_SERVER['PHP_SELF'])), '.php');

// Define an array with page names and their corresponding URLs
$pages = array(
    'Home' => '../../pages/user/home.php',
    'Books' => '../../pages/user/books.php',
    'Services' => '../../pages/user/services.php',
    'Acquisitions' => '../../pages/user/acquisitions.php',
    'Profile' => '../../pages/user/profile.php',
    'Login' => '../../pages/user/login.php'
);

?>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-onSurface bg-surface border-bottom fixed-top shadow bg-body-surface">
    <div class="container-fluid">

        <!-- CVSU LIBRARY LOGO -->
        <a class="navbar-brand p-0" href="../../pages/user/home.php" type="button">
            <img src="../../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" width="180" class="img-responsive">
        </a>
        <!-- CVSU LIBRARY LOGO -->

        <!-- OPAC SEARCH FOR HEADER -->
        <div id="header_book_search_top" class="input-group d-none d-sm-flex d-lg-none w-50" style="visibility: hidden;">
            <input id="header_book_search_input" type="text" class="opac-search-input form-control rounded-start-2 fs-7" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
            <button id="header_book_search_btn" class="opac_search_btn btn btn-outline-primary rounded-end-2 px-3 fs-7" type="button">Search</button>
        </div>
        <!-- OPAC SEARCH FOR HEADER -->

        <!-- SEARCH ICON FOR ANDROID RESOLUTION -->
        <button id="header_book_search_collapse_icon" class="navbar-toggler ms-auto d-sm-none fs-6 py-2 mx-1 border border-0" type="button" data-bs-toggle="collapse" data-bs-target="#opac_search_top_collapse" style="visibility: hidden;">
            <i class="fa fa-search"></i>
        </button>
        <!-- SEARCH ICON FOR ANDROID RESOLUTION -->

        <!-- NAVBAR TOGGLER ICON FOR ANDROIND RESOLUTION -->
        <button class="navbar-toggler fs-5 py-1 px-2 border border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <!-- NAVBAR TOGGLER ICON FOR ANDROIND RESOLUTION -->

        <!-- OPAC SEARCH FOR HEADER WITH COLLAPSE -->
        <div id="header_book_search_top_collapse" class="collapse navbar-collapse input-group w-30 px-2 d-sm-none py-3 py-lg-0" style="visibility: hidden;">
            <input id="header_book_search_collapse_input" type="text" class="opac-search-input form-control rounded-start-2 px-3 fs-7" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
            <button id="header_book_search_collapse_btn" class="opac_search_btn btn btn-outline-primary rounded-end-2 px-3 fs-7" type="button">Search</button>
        </div>
        <!-- OPAC SEARCH FOR HEADER WITH COLLAPSE -->

        <div class="collapse navbar-collapse w-60 px-3" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills text-center ms-auto mt-3 my-lg-auto" id="navTab_pill">
                <?php
                // Loop through each page and generate navigation links
                foreach ($pages as $page_name => $page_url) {
                    $class = ($current_page === $page_name) ? 'nav-link active' : 'nav-link';
                    if (!isset($_SESSION['user_token'])) {
                        if($page_name != 'Profile')echo "<li class='nav-item'><a class='$class' href='$page_url'>$page_name</a></li>";
                    }else{
                        if($page_name != 'Login') echo "<li class='nav-item'><a class='$class' href='$page_url'>$page_name</a></li>";
                    }
                }
                ?>
            </ul>
        </div>

    </div>
</nav>
<!-- Header -->



<!-- Script -->
<script src="../../assets/vendor/js/header.js" type="module"></script>
<!-- Script -->