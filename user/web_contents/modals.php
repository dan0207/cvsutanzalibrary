<script src="../assets/vendor/js/modals.js" type="module"></script>

<!-- Add New Event Modal -->
<div class="modal fade" id="add_new_event_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="add_new_event_form" action="#organizerContainer" class="needs-validation m-0" novalidate>
                <div class="modal-header d-flex justify-content-center bg-tertiary border-2 border-bottom border-teriary">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Event</h1>
                </div>
                <div class="modal-body">
                    <div class="add-event-body">
                        <div class="add-event-input input-group mb-2">
                            <span class="input-group-text">Event Date: </span>
                            <input id="event_date" type="text" class="event-date form-control" readonly>
                        </div>

                        <div class="add-event-input input-group mb-2">
                            <span class="input-group-text">Event Title: </span>
                            <input id="event_name" type="text" class="event-name form-control" placeholder="New Year" required>
                            <div class="invalid-feedback">
                                Please choose an Event Name.
                            </div>
                        </div>

                        <div class="add-event-input input-group mb-2">
                            <span class="input-group-text">Event Time: </span>
                            <input id="event_time" type="text" class="event-time form-control" placeholder="24:00" required>
                            <div class="invalid-feedback">
                                Please choose a Time From.
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button type="button" class="btn btn-secondary text-onSecondary me-auto" data-bs-dismiss="modal">Close</button>
                <div class="add-event-footer">
                    <button id="add_new_event_modal_btn" class="btn btn-primary">Add Event</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add New Event Modal -->


<!-- Login Modal -->
<div class="modal fade" id="login_reminder_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary border-2 border-bottom border-teriary">
                <img src="../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-responsive">
                <button type="button" class="btn-close z-3 position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5 class="modal-title my-3"><i class="fa-solid fa-bell px-1"></i>Library Reminder!<i class="fa-solid fa-bell px-1"></i></h5>
                <p>You need to log in first before you can request books.</p>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button id="login_reminder_modal_btn" class="btn btn-primary rounded-pill w-50 mx-auto">Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Login Modal -->


<!-- User Login First Modal -->
<div class="modal fade" id="signup_reminder_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary border-2 border-bottom border-teriary">
                <img src="../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-responsive">
            </div>
            <div class="modal-body text-center">
                <h5 class="modal-title my-3"><i class="fa-solid fa-bell px-1"></i>Library Reminder!<i class="fa-solid fa-bell px-1"></i></h5>
                <p>You must complete your information to proceed.</p>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button id="signup_reminder_modal_btn" class="btn btn-primary rounded-pill w-50 mx-auto">Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- User Login First Modal -->


<!-- User Info Form Modal -->
<div class="modal fade" id="user_form_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary">
                <i class="fa-solid fa-user-plus me-2"></i>
                <h1 class="modal-title fs-6 fs-md-5">COMPLETE USER INFORMATION</h1>
            </div>
            <div class="modal-body px-lg-5">
                <form id="user_form" action="../php_script/signup_script.php" class="needs-validation m-0" method="POST" novalidate>
                    <!-- User Information Section -->
                    <div class="form-outline px-3 row">
                        <!-- Campus Details -->
                        <!-- Profile Picture -->
                        <div class="text-center p-2 col-6 col-md-4 col-lg-3 order-1 order-xl-2">
                            <img id="user_avatarPreview" class="img-responsive w-90 mb-2 border border-5 border-surface shadow bg-body-surface rounded-4" src="../assets/img/student-icon.png" alt="Avatar">
                            <a href="#Mama mo" id="user_change_avatarPreview" class="btn btn-outline-primary fs-10 fs-md-9 py-1 rounded-5">Change Photo</a>
                        </div>


                        <!-- User Details -->
                        <!-- Email and Member Type -->
                        <div class="campus-details row-gap-2 row m-0 p-0 col-12 col-md-8 col-lg-6 col-xl-12 order-3 order-md-2 order-xl-1 row-gap-md-3 mb-xl-3 mb-3 mb-md-auto">
                            <div class="col-12 col-xl-8">
                                <label for="user_email_input" class="form-label">CvSU Mail</label>
                                <input type="text" class="form-control fs-7" name="user_email" id="user_email_input" readonly>
                            </div>
                            <div class="col-12 col-xl-4">
                                <label for="user_member_type_select" class="form-label">Member type</label>
                                <select id="user_member_type_select" name="user_member_type" class="form-select fs-7" required>
                                    <option selected value="Student">Student</option>
                                    <option value="Faculty">Faculty</option>
                                </select>
                                <div id="user_member_type_feedback" class="text-secondary fs-10"></div>
                            </div>
                        </div>

                        <!-- Name, Middle Name, Surname -->
                        <div class="personal-details row-gap-2 row m-0 p-0 col-12 col-md-8 col-lg-12 col-xl-6 order-4 order-md-4 order-xl-3">
                            <div class="col-8">
                                <label for="user_name_input" class="form-label">Name</label>
                                <input type="text" class="form-control fs-7" name="user_name" id="user_name_input" required>
                                <div id="user_name_feedback" class="text-secondary fs-10"></div>
                            </div>
                            <div class="col-4">
                                <label for="user_middlename_input" class="form-label">M.I.</label>
                                <input type="text" class="form-control fs-7" name="user_middle_I" id="user_middlename_input" required>
                                <div id="user_middlename_feedback" class="text-secondary fs-10"></div>
                            </div>
                            <div class="col-12">
                                <label for="user_surname_input" class="form-label">Surname</label>
                                <input type="text" class="form-control fs-7" name="user_surname" id="user_surname_input" required>
                                <div id="user_surname_feedback" class="text-secondary fs-10"></div>
                            </div>


                            <!-- Student Number, Course, Year, Section -->
                            <div class="student-info col-6">
                                <label for="user_student_number_input" class="form-label">Student No.</label>
                                <input type="text" class="form-control fs-7" name="user_student_number" id="user_student_number_input" required>
                                <div id="user_student_number_feedback" class="text-secondary fs-10"></div>
                            </div>
                            <div class="student-info col-6">
                                <label for="user_student_course_select" class="form-label">Course</label>
                                <select id="user_student_course_select" name="user_student_course" class="form-select fs-7" required>
                                    <option value="" selected hidden></option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSHM">BSHM</option>
                                    <option value="BEEd">BEEd</option>
                                    <option value="BSEd">BSEd</option>
                                    <option value="BSBM">BSBM</option>
                                    <option value="BSPsych">BS Psych</option>
                                </select>
                                <div id="user_student_course_feedback" class="text-secondary fs-10"></div>
                            </div>
                            <div class="student-info col-6">
                                <label for="user_student_year_select" class="form-label">Year</label>
                                <select id="user_student_year_select" name="user_student_year" class="form-select fs-7" required>
                                    <option value="" selected hidden></option>
                                    <option value="FIRST">FIRST</option>
                                    <option value="SECOND">SECOND</option>
                                    <option value="THIRD">THIRD</option>
                                    <option value="FOURTH">FOURTH</option>
                                </select>
                                <div id="user_student_year_feedback" class="text-secondary fs-10"></div>
                            </div>
                            <div class="student-info col-6">
                                <label for="user_student_section_select" class="form-label">Section</label>
                                <select id="user_student_section_select" name="user_student_section" class="form-select fs-7" required>
                                    <option value="" selected hidden></option>
                                    <option value="ONE">ONE</option>
                                    <option value="TWO">TWO</option>
                                    <option value="THREE">THREE</option>
                                    <option value="FOUR">FOUR</option>
                                </select>
                                <div id="user_student_section_feedback" class="text-secondary fs-10"></div>
                            </div>



                            <div class="faculty-info col-6 d-none">
                                <label for="user_faculty_number_input" class="form-label">Faculty No.</label>
                                <input type="text" class="form-control fs-7" name="user_faculty_number" id="user_faculty_number_input">
                                <div id="user_faculty_number_feedback" class="text-secondary fs-10"></div>
                            </div>
                            <div class="faculty-info col-6 d-none">
                                <label for="user_faculty_department_select" class="form-label">Departmment</label>
                                <select id="user_faculty_department_select" name="user_faculty_department" class="form-select fs-7">
                                    <option value="" selected hidden></option>
                                    <option value="BSIT">Department of Information Technology</option>
                                    <option value="BSHM">Department of Arts and Sciences</option>
                                    <option value="BEEd">Teacher Education Department</option>
                                    <option value="BSEd">Department of Management</option>
                                </select>
                                <div id="user_faculty_department_feedback" class="text-secondary fs-10"></div>
                            </div>
                        </div>

                        <!-- Library QR Code -->
                        <div class="text-center p-2 col-6 col-md-4 col-lg-3 col-xl-3 order-2 order-md-3 order-xl-4">
                            <div id="signup_qr_code_container" class="text-center">
                                <img id="signup_qr_code_img" alt="QR Code" class="img-responsive ms-auto w-90 border border-5 border-primary rounded-4 mb-2 shadow bg-body-surface">
                                <p class="text-center m-0 p-0 mx-auto fs-7">Your Library ID:</p>
                                <p id="library_id" class="text-center m-0 p-0 mx-auto fs-8"></p>
                            </div>
                        </div>
                    </div>



                    <hr>
                    <!-- Warning Message -->
                    <div class="warning text-center my-4">
                        <p class="fs-5 fs-md-4 my-0 text-secondary fst-italic w-100"><i class="fa-solid fa-triangle-exclamation mx-3"></i>WARNING<i class="fa-solid fa-triangle-exclamation mx-3"></i></p>
                        <p class="fs-7 fs-md-6 my-0 text-secondary fst-italic w-100">YOU CAN ONLY ANSWER THE FORM ONCE</p>
                        <p class="fs-7 fs-md-6 my-0 text-secondary fst-italic w-100">PLEASE ANSWER THESE FORM CORRECT AND PRECISE</p>
                    </div>
                    <hr>

                    <!-- Login Credentials Section -->
                    <div class="form-outline row row-gap-2">
                        <label class="form-label mb-1 ms-1 fs-4 text-center">LOGIN CREDENTIALS</label>
                        <div class="col-12 col-xl-6 px-3">
                            <label for="user_username_input" class="form-label">Username</label>
                            <input type="text" class="form-control fs-7" name="user_username" id="user_username_input" required>
                            <div id="user_username_feedback" class="text-secondary fs-8"></div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 px-3">
                            <label for="user_password_input" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control border border-end-0 fs-7" name="user_password" id="user_password_input" required>
                                <span class="input-group-text border border-start-0 bg-surface"><i id="show_password_toggle" class="fa fa-eye-slash"></i></span>
                            </div>
                            <div id="user_password_Strength_feedback" class="text-secondary fs-8"></div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 px-3">
                            <label for="user_re_password_input" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control border border-end-0 fs-7" name="user_re_password" id="user_re_password_input" required>
                                <span class="input-group-text border border-start-0 bg-surface"><i id="show_re_password_toggle" class="fa fa-eye-slash"></i></span>
                            </div>
                            <div id="user_password_checkMatch_feedback" class="text-secondary fs-8"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button id="user_form_modal_btn" class="btn btn-primary rounded-3 w-90 mx-auto fs-4">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<!-- User Info Form Modal -->


<!-- User Info Review Modal  -->
<div class="modal fade" id="user_review_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary border-2 border-bottom border-teriary">
                <img src="../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-responsive">
            </div>
            <div class="modal-body text-center">
                <h1 class="modal-title">Successfully Login</h1>
                <p>Sample Only!!</p>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button type="button" class="btn btn-secondary rounded-pill text-onSecondary position-absolute start-0 fs-7 mx-3" data-bs-target="#user_form_modal" data-bs-toggle="modal"><i class="fa-solid fa-circle-arrow-left mx-1"></i>Back to user information</button>
                <button id="user_review_modal_btn" class="btn btn-primary rounded-pill w-50 mx-auto" data-bs-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- User Info Review Modal  -->


<!-- Book Reservation Request Review Modal  -->
<div class="modal fade" id="book_request_review_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary">
                <i class="fa-solid fa-book fa-xl mx-2"></i>
                <h1 class="modal-title fs-3">Book Reservation Form</h1>
            </div>
            <div class="modal-body">
                <p class="text-center fs-6">🔔Please review the details you entered and click the Continue button if you wish to proceed🔔</p>
                <div class="container border rounded-3 w-80 mx-auto p-4">
                    <div class="row">
                        <h4 class="fw-bold text-primary">PERSONAL INFORMATION</h4>
                    </div>
                    <div class="row my-2 fs-7">
                        <div class="col-6">
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Name: </label>
                                <p id="book_reservation_name" class="text-muted"></p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_email" class="form-label me-3 fw-bold">CvSU Mail: </label>
                                <p id="book_reservation_email" class="text-muted"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <label for="book_reservation_student_number" class="form-label me-3 fw-bold">Student No.: </label>
                                <p id="book_reservation_student_number" class="text-muted"></p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_course" class="form-label me-3 fw-bold">Course & Section: </label>
                                <p id="book_reservation_student_course" class="text-muted"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h4 class="fw-bold text-primary">BOOK RESERVATION DETAILS</h4>
                    </div>
                    <div class="row my-2 fs-7">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <label for="book_reservation_title" class="form-label me-3 fw-bold">Book Title: </label>
                                        <p id="book_reservation_title" class="text-muted"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex">
                                        <label for="book_reservation_accession_number" class="form-label me-3 fw-bold">Book Access No.: </label>
                                        <p id="book_reservation_accession_number" class="text-muted"></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex">
                                        <label for="book_reservation_author" class="form-label me-3 fw-bold">Book Author: </label>
                                        <p id="book_reservation_author" class="text-muted"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex">
                                        <div class="input-group">
                                            <span class="input-group-text fs-7 border-0 fw-bold p-0">Pickup Date: </span>
                                            <input id="book_reservation_pickup_date" type="date" class="form-control fs-7 text-muted rounded-3 mx-2" name="pickup_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex">
                                        <div class="input-group">
                                            <span class="input-group-text fs-7 border-0 fw-bold p-0">Return Date: </span>
                                            <input id="book_reservation_due_date" type="date" class="form-control fs-7 text-muted rounded-3 mx-2" name="due_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button type="button" class="btn btn-secondary rounded-pill text-onSecondary position-absolute start-0 fs-7 mx-3" data-bs-dismiss="modal"><i class="fa-solid fa-circle-arrow-left mx-1"></i>Back</button>
                <button class="btn btn-primary rounded-pill px-5 ms-auto" data-bs-target="#book_request_privacy_modal" data-bs-toggle="modal">Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Book Reservation Request Review Modal  -->

<!-- Book Reservation Request Library Privary Notice Modal  -->
<div class="modal fade" id="book_request_privacy_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary">
                <i class="fa-solid fa-book fa-xl mx-2"></i>
                <h1 class="modal-title fs-3">Book Reservation Form</h1>
            </div>
            <div class="modal-body">
                <div class="container border rounded-3 w-80 mx-auto p-4">
                    <div class="row text-center">
                        <h4 class="fw-bold text-primary">LIBRARY PRIVACY NOTICE</h4>
                    </div>
                    <div class="row my-2">
                        <h6>LIBRARY RULES AND REGULATIONS</h6>
                        <ul class="px-5">
                            <li>Always present your ID as you enter the library.</li>
                            <li>Always leave your belongings, except your valuables at the Baggage Counter Area. The library is not responsible for any loss or damage to your property.</li>
                            <li>Always present to the student assistant on duty any duly borrowed library property you may wish to bring outside the library for inspection.</li>
                        </ul>

                        <h6>BORROWING PRIVILEGES</h6>
                        <ul class="px-5">
                            <li>Reading Room Use only.</li>
                            <li>Two (2) non reserved books can be borrowed at a time by library user.</li>
                            <li>Posters, maps and globes may be borrowed for classroom use and should be returned on the same day.</li>
                            <li>Reference books such as encyclopedias, yearbooks, dictionaries, newly acquired books, reserved books, thesis, special project, dissertation, periodicals, newspapers, audio-visual materials and vertical file clippings are for LIBRARY USE ONLY.</li>
                            <li>Overnight and Home Reading Loans.</li>
                            <li>Overnight and Home Reading loans of two (2) non-reserved books are issued from 3:00 – 4:30pm.</li>
                        </ul>

                    </div>
                    <div id="book_request_privacyForm" class="form-check text-primary text-center mb-3">
                        <div class="book-request-privacy d-flex justify-content-center">
                            <input id="book_request_privacy_checkbox" class="form-check-input me-1 border border-secondary" type="checkbox" value="" required>
                            <label id="book_request_privacy_label" class="form-check-label text-secondary" for="book_request_privacy_checkbox">
                                I have read and agreed to the Privacy Statement
                            </label>
                        </div>
                        <div class="book-request-privacy-feedback">
                            <div id="book_request_privacy_feedback" class="text-secondary fs-8"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button type="button" class="btn btn-secondary rounded-pill text-onSecondary position-absolute start-0 fs-7 mx-3" data-bs-target="#book_request_review_modal" data-bs-toggle="modal"><i class="fa-solid fa-circle-arrow-left mx-1"></i>Back to review</button>
                <button id="book_request_privacy_btn" class="btn btn-primary rounded-pill px-5 ms-auto">Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Book Reservation Request Library Privary Notice Modal  -->

<!-- Book Reservation Request Library Receipt Modal  -->
<div class="modal fade " id="book_request_receipt_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content d-print-inline-block" id="tryPrint">
            <div class="modal-header d-flex justify-content-center bg-tertiary">
                <i class="fa-solid fa-xl fa-receipt mx-2"></i>
                <h1 class="modal-title fs-3">Book Reservation Receipt</h1>
            </div>
            <div class="modal-body px-5 mx-4">
                <a id="receipt" class="text-reset text-decoration-none">
                    <form id="receipt_form" action="../php_script/receipt_script.php" class="container border rounded-3 w-100 mx-auto p-5 fs-7" method="POST">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="fw-bold mb-2">RECEIVED FROM</h5>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">Name: </span>
                                        <input id="book_receipt_name" type="text" class="form-control fs-7 text-muted" name="name" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">Course & Section: </span>
                                        <input id="book_receipt_courseSection" type="text" class="form-control fs-7 text-muted" name="courseSection" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">Student No.: </span>
                                        <input id="book_receipt_studentNumber" type="text" class="form-control fs-7 text-muted" name="studentNumber" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">CvSU Mail: </span>
                                        <input id="book_receipt_email" type="text" class="form-control fs-7 text-muted" name="email" readonly>
                                    </div>
                                </div>

                                <h5 class="fw-bold mt-2 mb-2">BORROW DETAILS</h5>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">Book Access No.: </span>
                                        <input id="book_receipt_barrow_book_accession_number" type="text" class="form-control fs-7 text-muted" name="book_accession_number" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">Book Title: </span>
                                        <input id="book_receipt_barrow_book_title" type="text" class="form-control fs-7 text-muted" name="book_title" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">Book Author: </span>
                                        <input id="book_receipt_barrow_book_author" type="text" class="form-control fs-7 text-muted" name="book_author" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">Pickup Date: </span>
                                        <input id="book_receipt_barrow_pickupDate" type="text" class="form-control fs-7 text-muted" name="pickupDate" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text fs-7 border-0">Return Date: </span>
                                        <input id="book_receipt_barrow_returnDate" type="text" class="form-control fs-7 text-muted" name="returnDate" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">

                                <div id="book_receipt_qr_code_container" class="text-center">
                                    <img id="book_receipt_qr_Code_img" alt="QR Code" class="img-responsive ms-auto w-100 border border-5 border-primary rounded-4 mb-2 shadow bg-body-surface">
                                    <p class="fs-6 text-center m-0 p-0 mx-auto">Library ID:</p>
                                    <input id="book_receipt_library_id" type="text" class="form-control text-center pb-3 fs-7 border-0 fw-semibold" name="library_id" readonly>
                                </div>

                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-12">
                                <h5 class="fw-bold my-2">BOOK DETAILS</h5>
                                <div class="row ps-3">
                                    <div class="col-9">
                                        <div class="d-flex">
                                            <label for="book_receipt_details_accession_number" class="form-label me-3">Accession no.: </label>
                                            <p id="book_receipt_details_accession_number" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_title" class="form-label me-3">Title: </label>
                                            <p id="book_receipt_details_title" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_author" class="form-label me-3">Author: </label>
                                            <p id="book_receipt_details_author" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_call_number" class="form-label me-3">Call no.: </label>
                                            <p id="book_receipt_details_call_number" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_material_type" class="form-label me-3">Material type: </label>
                                            <p id="book_receipt_details_material_type" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_language" class="form-label me-3">Language: </label>
                                            <p id="book_receipt_details_language" class="text-muted my-0"></p>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div id="book_receipt_image_container" class="text-center">
                                            <img id="book_receipt_image" src="../assets/img/sample-book-photo.png" class="img-responsive w-90 shadow bg-body-surface">
                                        </div>
                                    </div>
                                </div>
                                <div class="row ps-3">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <label for="book_receipt_details_publication" class="form-label me-3">Publication details: </label>
                                            <p id="book_receipt_details_publication" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_description" class="form-label me-3">Description: </label>
                                            <p id="book_receipt_details_description" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_content_type" class="form-label me-3">Content type: </label>
                                            <p id="book_receipt_details_content_type" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_media_type" class="form-label me-3">Media type: </label>
                                            <p id="book_receipt_details_media_type" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_carrier_type" class="form-label me-3">Carrier type: </label>
                                            <p id="book_receipt_details_carrier_type" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_isbn" class="form-label me-3">ISBN: </label>
                                            <p id="book_receipt_details_isbn" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_subject" class="form-label me-3">Subject(s): </label>
                                            <p id="book_receipt_details_subject" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="book_receipt_details_classification" class="form-label me-3">LOC classification: </label>
                                            <p id="book_receipt_details_classification" class="text-muted my-0"></p>
                                        </div>
                                        <div class="d-flex">
                                            <label for="" class="form-label me-3">Barcode: </label>
                                            <!-- <div id="book_receipt_barcode_container" class="text-center">
                                    <svg id="barcode" class="img-responsive ms-auto"></svg>
                                </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row text-center pt-4">
                            <p class="fs-7 m-0 p-0">Receipt No:</p>
                            <p id="book_receipt_id" class="m-0 p-0 fs-8 fw-semibold opacity-50">1000112</p>
                        </div>
                    </form>
                </a>
                <div class="text-end py-3">
                    <button id="receipt_download_btn" class="btn btn-primary rounded-pill px-5">Download</button>
                    <button id="receipt_print_btn" class="btn btn-primary rounded-pill px-5">Print</button>
                </div>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button type="button" class="btn btn-secondary rounded-pill text-onSecondary fs-7 me-auto" data-bs-target="#book_request_privacy_modal" data-bs-toggle="modal"><i class="fa-solid fa-circle-arrow-left mx-1"></i>Back to privacy statement</button>
                <button id="receipt_submit_btn" class="btn btn-primary rounded-pill px-5 border" disabled>SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<!-- Book Reservation Request Library Receipt Modal  -->

<!-- Create Post Modal -->
<div class="modal fade" id="create_post_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary border-2 border-bottom border-teriary">
                <img src="../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-responsive">
                <button type="button" class="btn-close z-3 position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                <h2 class="modal-title text-center">Create new post</h2>
                <form action="../php_script/file_upload.php" method="post" enctype="multipart/form-data">
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="create_post_title_input" class="form-label">Title</label>
                            <input type="text" class="form-control" name="create_post_title" id="create_post_title_input">
                        </div>
                        <div class="col-12">
                            <label for="create_post_content_input" class="form-label">Content</label>
                            <textarea type="text" class="form-control" name="create_post_content" id="create_post_content_input" rows="7"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="create_post_photo_inputFile" class="form-label">Upload Photo</label>
                            <input type="file" class="form-control" name="create_post_photo" id="create_post_photo_inputFile">
                        </div>
                        <div class="col-12">
                            <label for="create_post_video_inputFile" class="form-label">Upload Video</label>
                            <input type="file" class="form-control" name="create_post_video" id="create_post_video_inputFile">
                        </div>
                        <div class="col-12">
                            <label for="create_post_embed_input" class="form-label">Embed Post</label>
                            <input type="text" class="form-control" id="create_post_embed_input" placeholder="Paste URL here">
                        </div>
                    </div>
                    <!-- <button id="create_post_modal_btn" class="btn btn-primary rounded-pill w-50 mx-auto">Continue</button> -->
                </form>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button id="create_post_modal_btn" class="btn btn-primary rounded-pill w-50 mx-auto">Post</button>
            </div>
        </div>
    </div>
</div>
<!-- Create Post Modal -->