<div class="sticky-top z-1">
    <div id="profile_sidebar" class="px-0 pt-4">
        <div class="container-fluid px-0 pt-5">
            <div class="container p-0">
                <div class="card border rounded-3 shadow bg-body-tertiary">
                    <img class="card-img-top rounded-top-3" src="../assets/img/bg.png" alt="Background Photo">
                    <div class="card-body text-center p-0 d-flex flex-column">
                        <div class="profile-picture mb-3">
                            <img id="profile_picture" src="../assets/img/student-icon.png" class="profile-img rounded-circle border border-5 border-onPrimary" alt="user">
                        </div>

                        <div class="on-mobile-profile d-lg-none">
                            <h4 class="profile-name fs-6 mb-3">Name</h4>
                            <p class="profile-type fs-6 fw-semibold mb-1">Member Type</p>
                            <p class="profile-student-courseSection fs-7 mb-1">Course & Section</p>
                            <p class="profile-student-number fs-7 mb-1">Student Number</p>
                            <p class="profile-email fs-7 mb-1">CvSU Mail</p>
                            <div id="profile_qr_code_container" class="text-center my-3">
                                <img src="../assets/img/sample-qr-code.png" id="profile_qr_code_image" alt="QR Code" class="profile-qr-code-img img-responsive w-40 border border-5 border-primary rounded-4 mb-2 shadow bg-body-tertiary">
                                <p class="text-center m-0 p-0 mx-auto">Library ID:</p>
                                <p id="library_id" class="library-id text-center m-0 p-0 mx-auto fs-8">Sample ID</p>
                            </div>
                        </div>

                        <div class="on-pc-profile d-none d-lg-block py-4 px-4 px-xl-5">
                            <ul class="nav nav-pills nav-fill mb-3 flex-column" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="fs-7 nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#personal_details_tab" type="button" role="tab">Personal Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="fs-7 nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#book_transaction_tab" type="button" role="tab">Book Transaction</button>
                                </li>
                            </ul>
                        </div>

                        <a class="logout-btn btn btn-primary mt-auto fs-7 rounded-0 mb-3 d-none d-lg-block" href="../php_script/logout_script.php" type="button">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>