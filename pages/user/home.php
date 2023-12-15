<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../php_script/head.php'; ?>
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
                    <li class="nav-item"><a class="nav-link active" href="../../pages/user/home.php">Home</a></li>
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
        <div class="main container bg-surface">
            <div class="row border rounded-3">
                <div class="content col-sm-12 col-lg-8 my-5">
                    <div class="container-fluid my-5 px-5">
                        <?php include '../../php_script/create_post_script.php'; ?>

                        <div id="post_id" class="post mx-5 my-2 px-1 pt-2 pb-4 border rounded-3 shadow bg-body-surfaces">
                            <div class="post-head d-flex align-items-center mx-2 my-2">
                                <div class="post-photo px-2 d-flex align-items-center">
                                    <img src="../../assets/img/sample-librarian-picture.jpg" alt="" class="img-responsive border border-3 border-surface rounded-circle shadow bg-body-surface" width="50">
                                </div>
                                <div class="post-details">
                                    <div id="post_user_name" class="post-name fw-medium">Recelyn Cea Baltar (Sample Only)</div>
                                    <div class="d-flex align-items-center">
                                        <div id="post_user_type" class="post-memberType fs-9">Campus Librarian</div>
                                        <mark id="post_create_at" class="rounded-3 mx-2 px-2 fs-10">2 hours ago</mark>
                                    </div>
                                </div>
                                <div class="post-menu ms-auto">
                                    <button id="post_menu_btn" class="post-menu-btn px-3 py-2 border-0 border rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown"><i class="fs-5 fa-solid fa-ellipsis-vertical"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end text-center">
                                        <li><a class="dropdown-item" href="#">Hide post</a></li>
                                        <li><a class="dropdown-item" href="#">Report post</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-content container d-flex justify-content-center rounded-3">
                                <iframe class="w-100 rounded-3" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FCvSU.TanzaCampusLibrary%2Fposts%2Fpfbid02cAye9JDEGoC4sUvBRzsMMGrWFvX9v9zXzJBKwwxXiiSwYw5ticR9oXR1SqXeH31El&show_text=true&width=500" width="500" height="654" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                        </div>

                        <div id="post_2" class="post border rounded-3 my-5 mx-5 px-1 pt-2 pb-4 shadow bg-body-surfaces">
                            <div class="post-head d-flex align-items-center mx-2 my-2">
                                <div class="post-photo px-2 d-flex align-items-center">
                                    <img src="../../assets/img/sample-librarian-picture.jpg" alt="" class="img-responsive border border-3 border-surface rounded-circle shadow bg-body-surface" width="50">
                                </div>
                                <div class="post-details">
                                    <div id="post_user_name" class="post-name fw-medium">Recelyn Cea Baltar (Sample Only)</div>
                                    <div class="d-flex align-items-center">
                                        <div id="post_user_type" class="post-memberType fs-9">Campus Librarian</div>
                                        <mark id="post_create_at" class="rounded-3 mx-2 px-2 fs-10">1 day ago</mark>
                                    </div>
                                </div>
                                <div class="post-menu ms-auto">
                                    <button id="post_menu_btn" class="post-menu-btn px-3 py-2 border-0 border rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown"><i class="fs-5 fa-solid fa-ellipsis-vertical"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end text-center">
                                        <li><a class="dropdown-item" href="#">Hide post</a></li>
                                        <li><a class="dropdown-item" href="#">Report post</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-content container d-flex justify-content-center rounded-3">
                                <iframe class="w-100 rounded-3" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FCvSU.TanzaCampusLibrary%2Fposts%2Fpfbid05RaSQxHjS3oRAkhHudktjVrzwmSDXCWsZ9Ja5xir3GJoDE9tZEkzYiWKDAw2LYTvl&show_text=true&width=500" width="500" height="687" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                        </div>

                        <div id="post_3" class="post border rounded-3 my-5 mx-5 px-1 pt-2 pb-4 shadow bg-body-surfaces">
                            <div class="post-head d-flex align-items-center mx-2 my-2">
                                <div class="post-photo px-2 d-flex align-items-center">
                                    <img src="../../assets/img/sample-librarian-picture.jpg" alt="" class="img-responsive border border-3 border-surface rounded-circle shadow bg-body-surface" width="50">
                                </div>
                                <div class="post-details">
                                    <div id="post_user_name" class="post-name fw-medium">Recelyn Cea Baltar (Sample Only)</div>
                                    <div class="d-flex align-items-center">
                                        <div id="post_user_type" class="post-memberType fs-9">Campus Librarian</div>
                                        <mark id="post_create_at" class="rounded-3 mx-2 px-2 fs-10">3 days ago</mark>
                                    </div>
                                </div>
                                <div class="post-menu ms-auto">
                                    <button id="post_menu_btn" class="post-menu-btn px-3 py-2 border-0 border rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown"><i class="fs-5 fa-solid fa-ellipsis-vertical"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end text-center">
                                        <li><a class="dropdown-item" href="#">Hide post</a></li>
                                        <li><a class="dropdown-item" href="#">Report post</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-content container d-flex justify-content-center rounded-3">
                                <iframe class="w-100 rounded-3" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FCvSU.TanzaCampusLibrary%2Fposts%2Fpfbid0eBqJecKLu9jGJ51HHkBCjpZP4X59FoRbE4L5Q9kAdRcfMBE2XydtuvdLqSPmSMg2l&show_text=true&width=500" width="500" height="687" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
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


    <!-- Script -->
    <script src="../../assets/vendor/js/home.js" type="module"></script>
    <!-- Script -->

</body>

</html>