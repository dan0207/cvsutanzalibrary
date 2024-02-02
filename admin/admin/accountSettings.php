<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Settings</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <h1 id="pageHeader">Account Settings</h1>
            <div class="container p-1">
                <section class="card shadow mb-3 mt-5" id="profile">
                    <h2 class="mx-3">Profile</h2>
                    <div class="row pb-5">
                        <div class="col-lg-4 col-sm-12">
                            <div class="row card px-2 m-2 admin-profile text-center">
                                Profile
                                <div class="mt-auto text-center">
                                    <a class="nav-link text-primary fs-small" href="">change profile picture</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="row px-2 card m-2">
                                Email: 
                            </div>
                            <div class="row card px-2 m-2">
                                Faculty Number: 
                            </div>
                            <div class="row card px-2 m-2">
                                Member Type: 
                            </div>
                            <div class="row card px-2 m-2">
                                Username: 
                            </div>
                            <div class="row card px-2 m-2">
                                Password: 
                                <a class="nav-link text-primary ps-3 fs-small" href="">change password</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="card shadow mb-5" id="personalInfo">
                    <h2 class="mx-3">Personal Information</h2>
                    <div class="row py-1">
                        <div class="col-lg-5 col-sm-10">
                            <div class="row card px-2 m-1">
                                Lastname: 
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-10">
                            <div class="row card px-2 m-1">
                                Firstname:
                            </div> 
                        </div>
                        <div class="col-lg-2 col-sm-10">
                            <div class="row card px-2 m-1">
                                M.I.: 
                            </div>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-lg-6 col-sm-10">
                            <div class="row card px-2 m-1">
                                Birthday: 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-10">
                            <div class="row card px-2 m-1">
                                Gender: 
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
<!-- Firstname,lastname, middle, birthday, gender, -->
        <script src="../assets/script/script.js"></script>
    </body>
</html>