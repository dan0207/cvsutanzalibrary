<div id="profile_info" class="py-4">
    <div class="container-fluid px-0 py-lg-5">
        <div class="container p-0">
            <div class="on-mobile-profile d-lg-none">
                <ul class="nav nav-pills nav-justified mb-1 p-2 border rounded-3 shadow-lg bg-body-tertiary" id="pills-tab" role="tablist">
                    <li class="nav-item active" role="presentation">
                        <button class="fs-7 nav-link active" id="" data-bs-toggle="pill" data-bs-target="#personal_details_tab" type="button" role="tab">Personal Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="fs-7 nav-link" id="" data-bs-toggle="pill" data-bs-target="#book_transaction_tab" type="button" role="tab">Book Transaction</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="personal_details_tab">
                    <div class="user-details d-none d-lg-block">
                        <div class="row m-0 mb-3 border rounded-3 shadow bg-body-tertiary">
                            <div class="col-12 col-lg-9 px-0 pb-3">
                                <div class="bg-primary text-onPrimary d-flex align-items-center mt-3 px-4">
                                    <div class="fs-4">
                                        Profile
                                    </div>
                                    <div class="profile-type fs-6 ms-auto"><?php echo $_SESSION['user_member_type'] ?? ''; ?></div>
                                </div>
                                <p class="profile-name fs-2 px-4 py-2 mt-3 mb-0"><?php echo $_SESSION['user_fullname'] ?? ''; ?></p>
                                <p class="profile-student-courseSection px-4 py-0  mt-0 mb-1"><?php echo getFormatCourseSection($_SESSION['user_student_course'] ?? '', $_SESSION['user_student_year'] ?? '', $_SESSION['user_student_section'] ?? ''); ?></p>
                                <p class="profile-student-number px-4 py-0 mb-1"><?php echo $_SESSION['user_student_number'] ?? ''; ?></p>
                                <p class="profile-email px-4 py-0 mb-1"><?php echo $_SESSION['user_email'] ?? ''; ?></p>
                            </div>
                            <div class="col-12 col-lg-3 p-3">
                                <div id="profile_qr_code_container" class="text-center w-100 w-xl-80 mx-auto">
                                    <img src="<?php echo generateQRCode($_SESSION['user_token'] ?? '', 500); ?>" id="profile_qr_code_image" alt="QR Code" class="profile-qr-code-img img-responsive w-100 border border-5 border-primary rounded-4 mb-2 shadow bg-body-surface">
                                    <p class="text-center m-0 p-0 mx-auto">Library ID:</p>
                                    <p id="library_id" class="library-id text-center m-0 p-0 mx-auto fs-8"><?php echo mask($_SESSION['user_token'] ?? ''); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="../php_script/update_profile_script.php" class="profile-details" method="POST" novalidate>
                        <div class="row m-0 border-bottom py-3 mb-3 border rounded-3 shadow bg-body-tertiary">
                            <div class="col-12 col-lg-6">
                                <label for="" class="form-label">Bio</label>
                                <textarea name="updateProfile_bio" type="text" class="update-profile form-control" rows="4" disabled><?php echo $_SESSION['user_bio'] ?? ''; ?></textarea>
                            </div>
                            <div class="row m-0 p-0 col-12 col-lg-6">
                                <div class="col-6 col-lg-6">
                                    <label for="" class="form-label">Age</label>
                                    <input name="updateProfile_age" type="text" class="update-profile form-control" value="<?= $_SESSION['user_age'] ?? '' ?>" disabled>
                                </div>
                                <div class="col-6 col-lg-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="updateProfile_gender" class="update-profile form-select" disabled>
                                        <?php
                                        $genders = ['Male', 'Female'];
                                        foreach ($genders as $option) {
                                            echo '<option value="' . $option . '" ' . ($_SESSION['user_gender'] == $option ? 'selected' : '') . '>' . $option . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Birthday</label>
                                    <input name="updateProfile_birthday" type="date" class="update-profile form-control" placeholder=" " value="<?= $_SESSION['user_birthday'] ?? '' ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row m-0 rounded-3 py-3 border rounded-3 shadow bg-body-tertiary">
                            <div class="form-outline row m-0 p-0">
                                <div class="col-12 col-lg-5">
                                    <label for="profile_username_input" class="form-label">Username</label>
                                    <input type="text" class="update-profile form-control" name="updateProfile_username" id="profile_username_input" required disabled>
                                    <div id="updateProfile_username_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label for="profile_password_input" class="form-label">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" class="update-profile form-control border border-end-0" name="updateProfile_old_password" id="profile_old_password_input" required disabled>
                                        <span class="update-profile input-group-text border border-start-0 bg-surface disabled"><i id="show_old_password_toggle" class="fa fa-eye-slash"></i></span>
                                    </div>
                                    <div id="updateProfile_password_old_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="profile_re_password_input" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="update-profile form-control border border-end-0" name="updateProfile_new_password" id="profile_new_password_input" required disabled>
                                        <span class="update-profile input-group-text border border-start-0 bg-surface disabled"><i id="show_new_password_toggle" class="fa fa-eye-slash"></i></span>
                                    </div>
                                    <div id="updateProfile_password_new_feedback" class="text-secondary fs-8"></div>
                                </div>

                                <div class="update_buttons d-flex justify-content-center">
                                    <button id="edit_profile_btn" type="button" class="btn btn-tertiary border shadow-sm rounded-3 w-20 mt-3">Edit</button>
                                    <button id="save_profile_btn" type="button" class="btn btn-primary border shadow-sm rounded-3 w-15 mt-3 d-none">Save</button>
                                    <button id="cancel_profile_btn" type="button" class="btn btn-secondary text-white border shadow-sm rounded-3 w-10 ms-2 mt-3 d-none">Cancel</button>
                                    <button id="save_profile_btn_processing" class="btn btn-primary shadow-sm rounded-3 w-20 mx-auto mt-3 d-none" type="button" disabled>
                                        <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                                        <span role="status">Saving...</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="border d-lg-none rounded-3 shadow bg-body-tertiary my-3 p-3 d-flex justify-content-center align-items-center">
                            <button class="logout-btn btn btn-primary fs-7 rounded-0 w-100 rounded-3" type="button">Logout</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="book_transaction_tab">
                    <div class="border p-2 p-lg-4 rounded-3 shadow bg-body-tertiary">
                        <div class="border text-center bg-primary text-onPrimary rounded-2 fs-1">
                            Book Transactions
                        </div>
                        <div class="book_transactions_tab border m-2 p-2 rounded-3 shadow-sm bg-body-tertiary">
                            <ul class="nav nav-pills nav-justified text-center" id="navTab_rounded">
                                <div class="col-4">
                                    <li class="nav-item fs-7 fs-lg-6"><a class="py-2 nav-link active" data-bs-toggle="tab" data-bs-target="#book_request_tabpane" type="button">Book Request</a></li>
                                </div>
                                <div class="col-4">
                                    <li class="nav-item fs-7 fs-lg-6"><a class="py-2 nav-link" data-bs-toggle="tab" data-bs-target="#handled_book_tabpane" type="button">Borrowed Book</a></li>
                                </div>
                                <div class="col-4">
                                    <li class="nav-item fs-8 fs-lg-6"><a class="py-2 px-0 nav-link" data-bs-toggle="tab" data-bs-target="#transaction_history_tabpane" type="button">Transactions History</a></li>
                                </div>
                            </ul>
                        </div>

                        <div class="tab-content m-2" id="book_transactions_tabpane">
                            <div class="tab-pane fade active show" id="book_request_tabpane">

                                <div class="book-request-container w-100 overflow-hidden">
                                    <div id="book_request_table" class="book-request-table">
                                        <?php include '../tables/user_book_request_table.php'; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="handled_book_tabpane">

                                <div class="handled-book-container w-100 overflow-hidden">
                                    <div id="handled_book_table" class="handled-book-table">
                                        <?php include '../tables/user_borrowed_book_table.php'; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="transaction_history_tabpane">

                                <div class="transaction-history-container w-100 overflow-hidden">
                                    <div id="transaction_history_table" class="transaction-history-table">
                                        <?php include '../tables/user_book_transaction_table.php'; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>