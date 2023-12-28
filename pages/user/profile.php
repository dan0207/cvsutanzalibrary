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
    <?php include '../../web_contents/header.php'; ?>
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
                        <div class="tab-pane show active fade border rounded-2" id="profile_account_settings">

                            <div class="row border-bottom w-100 mx-auto">
                                <div class="col-9">
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
                            <div class="row border-bottom w-100 mx-auto py-3 px-3">
                                <label class="form-label mb-1 ms-1 fs-4 text-center">About Me</label>
                                <div class="col-8">
                                    <label for="" class="form-label">Bio</label>
                                    <textarea type="text" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="row col-4">
                                    <div class="col-6">
                                        <label for="" class="form-label">Age</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Gender</label>
                                        <select class="form-select" required>
                                            <option value="" selected hidden></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label">Birth</label>
                                        <input type="date" class="form-control" value="02/07/2001">
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100 mx-auto py-3 px-3">
                                <div class="form-outline row">
                                    <label class="form-label mb-1 ms-1 fs-4 text-center">Login Credentials</label>
                                    <div class="col-5">
                                        <label for="profile_username_input" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="profile_username" id="profile_username_input" required>
                                        <div id="profile_username_feedback" class="text-secondary fs-8"></div>
                                    </div>
                                    <div class="col-3">
                                        <label for="profile_password_input" class="form-label">Old Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="profile_password" id="profile_password_input" required>
                                            <span class="input-group-text"><i id="show_password_toggle" class="fa fa-eye-slash"></i></span>
                                        </div>
                                        <div id="profile_password_Strength_feedback" class="text-secondary fs-8"></div>
                                    </div>
                                    <div class="col-4">
                                        <label for="profile_re_password_input" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="profilere_password" id="profile_re_password_input" required>
                                            <span class="input-group-text"><i id="show_re_password_toggle" class="fa fa-eye-slash"></i></span>
                                        </div>
                                        <div id="profile_password_checkMatch_feedback" class="text-secondary fs-8"></div>
                                    </div>

                                    <button id="profile_form_btn" class="btn btn-primary rounded-pill w-50 mx-auto fs-6 mt-3">Update Information</button>
                                </div>
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
    <?php include '../../web_contents/footer.php'; ?>
    <!-- Footer -->

    <!-- Script -->
    <script defer src="../../assets/vendor/js/profile.js" type="module"></script>
    <!-- Script -->
</body>

</html>