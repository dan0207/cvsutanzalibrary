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
                                    <div class="profile-type fs-6 ms-auto"><?php echo $_SESSION['user_member_type']; ?></div>
                                </div>
                                <p class="profile-name fs-2 px-4 py-2 mt-3 mb-0"><?php echo $_SESSION['user_fullname']; ?></p>
                                <p class="profile-student-courseSection px-4 py-0  mt-0 mb-1"><?php echo getFormatCourseSection($_SESSION['user_student_course'], $_SESSION['user_student_year'], $_SESSION['user_student_section']); ?></p>
                                <p class="profile-student-number px-4 py-0 mb-1"><?php echo $_SESSION['user_student_number']; ?></p>
                                <p class="profile-email px-4 py-0 mb-1"><?php echo $_SESSION['user_email']; ?></p>
                            </div>
                            <div class="col-12 col-lg-3 p-3">
                                <div id="profile_qr_code_container" class="text-center w-100 w-xl-80 mx-auto">
                                    <img src="<?php echo generateQRCode($_SESSION['user_token'], 500); ?>" id="profile_qr_code_image" alt="QR Code" class="profile-qr-code-img img-responsive w-100 border border-5 border-primary rounded-4 mb-2 shadow bg-body-surface">
                                    <p class="text-center m-0 p-0 mx-auto">Library ID:</p>
                                    <p id="library_id" class="library-id text-center m-0 p-0 mx-auto fs-8"><?php echo mask($_SESSION['user_token']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-details">
                        <div class="row m-0 border-bottom py-3 mb-3 border rounded-3 shadow bg-body-tertiary">
                            <label class="form-label mb-1 ms-1 fs-4 text-center">About Me</label>
                            <div class="col-12 col-lg-6">
                                <label for="" class="form-label">Bio</label>
                                <textarea type="text" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="row m-0 p-0 col-12 col-lg-6">
                                <div class="col-6 col-lg-6">
                                    <label for="" class="form-label">Age</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-6 col-lg-6">
                                    <label for="" class="form-label">Gender</label>
                                    <select class="form-select" required>
                                        <option value="" selected hidden></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Birthday</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                        </div>



                        <div class="row m-0 rounded-3 py-3 border rounded-3 shadow bg-body-tertiary">
                            <div class="form-outline row m-0 p-0">
                                <label class="form-label mb-1 ms-1 fs-4 text-center">Login Credentials</label>
                                <div class="col-12 col-lg-5">
                                    <label for="profile_username_input" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="profile_username" id="profile_username_input" required>
                                    <div id="profile_username_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label for="profile_password_input" class="form-label">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border border-end-0" name="profile_password" id="profile_password_input" required>
                                        <span class="input-group-text border border-start-0 bg-surface"><i id="show_password_toggle" class="fa fa-eye-slash"></i></span>
                                    </div>
                                    <div id="profile_password_Strength_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="profile_re_password_input" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border border-end-0" name="profilere_password" id="profile_re_password_input" required>
                                        <span class="input-group-text border border-start-0 bg-surface"><i id="show_re_password_toggle" class="fa fa-eye-slash"></i></span>
                                    </div>
                                    <div id="profile_password_checkMatch_feedback" class="text-secondary fs-8"></div>
                                </div>

                                <button id="profile_form_btn" class="btn btn-primary rounded-pill w-50 mx-auto fs-7 mt-3">Update Information</button>
                            </div>
                        </div>

                        <div class="border d-lg-none rounded-3 shadow bg-body-tertiary my-3 p-3 d-flex justify-content-center align-items-center">
                            <button class="logout-btn btn btn-primary fs-7 rounded-0 w-100 rounded-3" type="button">Logout</button>
                        </div>
                    </div>
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