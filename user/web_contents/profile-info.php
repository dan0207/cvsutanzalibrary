<div id="profile_info" class="py-4">
    <div class="container-fluid px-0 py-lg-5">
        <div class="container p-0">
            <div class="on-pc-profile d-lg-none">
                <ul class="nav nav-pills nav-justified mb-1 p-2 border rounded-3 shadow-lg bg-body-tertiary" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="fs-7 nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#personal_details" type="button" role="tab">Personal Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="fs-7 nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#book_transaction_tab" type="button" role="tab">Book Transaction</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="personal_details">
                    <div class="user-details d-none d-lg-block">
                        <div class="row m-0 border-bottom mb-3 border rounded-3 shadow bg-body-tertiary">
                            <div class="col-12 col-lg-9 px-0">
                                <div class="bg-primary text-onPrimary d-flex align-items-center mt-3 px-4">
                                    <div class="fs-4">
                                        Profile
                                    </div>
                                    <div id="profile_type" class="fs-6 ms-auto">Student</div>
                                </div>
                                <p class="fs-2 px-4 pt-2" id="profile_name">Danilo D. Abancia Jr.</p>
                                <p class="px-4 py-0" id="profile_student_number"> 20190150</p>
                                <p class="px-4 py-0" id="profile_email">danilojr.abancia@cvsu.edu.ph</p>
                            </div>
                            <div class="col-12 col-lg-3 p-3">
                                <div id="profile_qr_code_container" class="text-center">
                                    <img src="../assets/img/sample-qr-code.png" id="profile_qr_code_image" alt="QR Code" class="img-responsive w-100 border border-5 border-primary rounded-4 mb-2 shadow bg-body-surface">
                                    <p class="text-center m-0 p-0 mx-auto">Library ID:</p>
                                    <p id="library_id" class="text-center m-0 p-0 mx-auto fs-8">Sample QR Code</p>
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
                                    <label for="" class="form-label">Birth</label>
                                    <input type="date" class="form-control" value="2001-02-07">
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

                        <div class="border rounded-3 shadow bg-body-tertiary my-3 p-3 d-flex justify-content-center align-items-center">
                            <a class="logout-btn btn btn-primary fs-7 rounded-0 d-lg-none w-100 rounded-3" href="../pages/home.php" type="button">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>















    </div>
</div>