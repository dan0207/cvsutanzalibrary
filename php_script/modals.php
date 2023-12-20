<script src="../../assets/vendor/js/modals.js" type="module"></script>

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
                        <div class="add-event-input input-group px-5 mb-2">
                            <span class="input-group-text">Event Name: </span>
                            <input type="text" class="event-name form-control" placeholder="New Year" required>
                            <div class="invalid-feedback">
                                Please choose an Event Name.
                            </div>
                        </div>

                        <div class="add-event-input input-group px-5 mb-2">
                            <span class="input-group-text">Event Time From: </span>
                            <input type="text" class="event-time-from form-control" placeholder="24:00" required>
                            <div class="invalid-feedback">
                                Please choose a Time From.
                            </div>
                        </div>

                        <div class="add-event-input input-group px-5 mb-2">
                            <span class="input-group-text">Event Time To: </span>
                            <input type="text" class="event-time-to form-control" placeholder="24:00" required>
                            <div class="invalid-feedback">
                                Please choose a Time To.
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
                <img src="../../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-responsive">
                <button type="button" class="btn-close z-3 position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h2 class="modal-title my-3"><i class="fa-solid fa-bell px-3"></i>Library Reminder!<i class="fa-solid fa-bell px-3"></i></h2>
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
                <img src="../../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-responsive">
            </div>
            <div class="modal-body text-center">
                <h2 class="modal-title my-3"><i class="fa-solid fa-bell px-3"></i>Library Reminder!<i class="fa-solid fa-bell px-3"></i></h2>
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
                <h1 class="modal-title fs-3">COMPLETE USER INFORMATION</h1>
            </div>
            <div class="modal-body px-5">
                <form id="user_form" action="../../php_script/signup_script.php" class="needs-validation m-0" method="POST" novalidate>
                    <!-- User Information Section -->
                    <div class="form-outline row g-3">
                        <div class="col-2 text-center p-2">
                            <img id="user_avatarPreview" class="img-responsive w-90 mb-2 border border-5 border-surface shadow bg-body-surface rounded-4" src="../../assets/img/student-icon.png" alt="Avatar">
                            <a href="#Mama mo" id="user_change_avatarPreview" class="btn btn-outline-primary fs-7 py-1 rounded-5">Change Photo</a>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <!-- Email and Member Type -->
                                <div class="col-8">
                                    <label for="user_email_input" class="form-label">CvSU Mail</label>
                                    <input type="text" class="form-control" name="user_email" id="user_email_input" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="user_member_type_select" class="form-label">Member type</label>
                                    <select id="user_member_type_select" name="user_member_type" class="form-select" required>
                                        <option selected value="Student">Student</option>
                                        <option value="Faculty">Faculty</option>
                                    </select>
                                    <div id="user_member_type_feedback" class="text-secondary fs-8"></div>
                                </div>

                                <!-- Name, Middle Name, Surname -->
                                <div class="col-5">
                                    <label for="user_name_input" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="user_name" id="user_name_input" required>
                                    <div id="user_name_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-2">
                                    <label for="user_middlename_input" class="form-label">M.I.</label>
                                    <input type="text" class="form-control" name="user_middle_I" id="user_middlename_input" required>
                                    <div id="user_middlename_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-5">
                                    <label for="user_surname_input" class="form-label">Surname</label>
                                    <input type="text" class="form-control" name="user_surname" id="user_surname_input" required>
                                    <div id="user_surname_feedback" class="text-secondary fs-8"></div>
                                </div>

                                <!-- Student Number, Course, Year, Section -->
                                <div class="col-3">
                                    <label for="user_student_number_input" class="form-label">Student No.</label>
                                    <input type="text" class="form-control" name="user_student_number" id="user_student_number_input" required>
                                    <div id="user_student_number_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-3">
                                    <label for="user_course_select" class="form-label">Course</label>
                                    <select id="user_course_select" name="user_course" class="form-select" required>
                                        <option value="" selected hidden></option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSHM">BSHM</option>
                                        <option value="BEEd">BEEd</option>
                                        <option value="BSEd">BSEd</option>
                                        <option value="BSBM">BSBM</option>
                                        <option value="BSPsych">BS Psych</option>
                                    </select>
                                    <div id="user_course_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-3">
                                    <label for="user_year_select" class="form-label">Year</label>
                                    <select id="user_year_select" name="user_year" class="form-select" required>
                                        <option value="" selected hidden></option>
                                        <option value="FIRST">FIRST</option>
                                        <option value="SECOND">SECOND</option>
                                        <option value="THIRD">THIRD</option>
                                        <option value="FOURTH">FOURTH</option>
                                    </select>
                                    <div id="user_year_feedback" class="text-secondary fs-8"></div>
                                </div>
                                <div class="col-3">
                                    <label for="user_section_select" class="form-label">Section</label>
                                    <select id="user_section_select" name="user_section" class="form-select" required>
                                        <option value="" selected hidden></option>
                                        <option value="ONE">ONE</option>
                                        <option value="TWO">TWO</option>
                                        <option value="THREE">THREE</option>
                                        <option value="FOUR">FOUR</option>
                                    </select>
                                    <div id="user_section_feedback" class="text-secondary fs-8"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-2 text-center p-2">
                            <div id="signup_qr_code_container" class="text-center">
                                <img id="signup_qr_code_image" alt="QR Code" class="img-responsive ms-auto w-90 border border-5 border-primary rounded-4 mb-2 shadow bg-body-surface">
                                <p class="text-center m-0 p-0 mx-auto">Library ID:</p>
                                <p id="library_id" class="text-center m-0 p-0 mx-auto fs-8"></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Warning Message -->
                    <div class="warning text-center my-4">
                        <p class="fs-5 my-0 text-secondary fst-italic w-100"><i class="fa-solid fa-triangle-exclamation mx-3"></i>YOU CAN ONLY ANSWER THE FORM ONCE<i class="fa-solid fa-triangle-exclamation mx-3"></i></p>
                        <p class="fs-6 my-0 text-secondary fst-italic w-100">PLEASE ANSWER THESE FORM CORRECT AND PRECISE</p>
                    </div>
                    <hr>

                    <!-- Login Credentials Section -->
                    <div class="form-outline row g-2">
                        <label class="form-label mb-1 ms-1 fs-4 text-center">LOGIN CREDENTIALS</label>
                        <div class="col-5">
                            <label for="user_username_input" class="form-label">Username</label>
                            <input type="text" class="form-control" name="user_username" id="user_username_input" required>
                            <div id="user_username_feedback" class="text-secondary fs-8"></div>
                        </div>
                        <div class="col-4">
                            <label for="user_password_input" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="user_password" id="user_password_input" required>
                                <span class="input-group-text"><i id="show_password_toggle" class="fa fa-eye-slash"></i></span>
                            </div>
                            <div id="user_password_Strength_feedback" class="text-secondary fs-8"></div>
                        </div>
                        <div class="col-3">
                            <label for="user_re_password_input" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="user_re_password" id="user_re_password_input" required>
                                <span class="input-group-text"><i id="show_re_password_toggle" class="fa fa-eye-slash"></i></span>
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
                <img src="../../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-responsive">
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
<div class="modal fade" id="book_request_review_modal" data-bs-keyboard="false" data-bs-keyboard="false" tabindex="-1">
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
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">First Name: </label>
                                <p id="book_reservation_firstName" class="text-muted">Danilo Jr.</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Last Name: </label>
                                <p id="book_reservation_lastName" class="text-muted">Abancia</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Student No.: </label>
                                <p id="book_reservation_studentNumber" class="text-muted">201910150</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">CvSU Mail: </label>
                                <p id="book_reservation_email" class="text-muted">danilojr.abancia@cvsu.edu.ph</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Course: </label>
                                <p id="book_reservation_studentNumber" class="text-muted">BSIT</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Year: </label>
                                <p id="book_reservation_studentNumber" class="text-muted">FOUTH</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Section: </label>
                                <p id="book_reservation_studentNumber" class="text-muted">ONE</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h4 class="fw-bold text-primary">BOOK RESERVATION DETAILS</h4>
                    </div>
                    <div class="row my-2 fs-7">
                        <div class="col-6">
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Book Title: </label>
                                <p id="book_reservation_firstName" class="text-muted">Organic Chemistry</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Pickup Date: </label>
                                <p id="book_reservation_lastName" class="text-muted">12/25/23</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_reservation_firstName" class="form-label me-3 fw-bold">Due Date: </label>
                                <p id="book_reservation_studentNumber" class="text-muted">01/01/24</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button type="button" class="btn btn-secondary rounded-pill text-onSecondary position-absolute start-0 fs-7 mx-3" data-bs-dismiss="modal"><i class="fa-solid fa-circle-arrow-left mx-1"></i>Back</button>
                <button class="btn btn-primary rounded-pill px-5 ms-auto" data-bs-target="#book_request_privacyStatement_modal" data-bs-toggle="modal">Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Book Reservation Request Review Modal  -->

<!-- Book Reservation Request Library Privary Notice Modal  -->
<div class="modal fade" id="book_request_privacyStatement_modal" data-bs-keyboard="false" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary">
                <i class="fa-solid fa-book fa-xl mx-2"></i>
                <h1 class="modal-title fs-3">Book Reservation Form</h1>
            </div>
            <div class="modal-body">
                <div class="container border rounded-3 w-80 mx-auto p-4">
                    <div class="row text-center">
                        <h4 class="fw-bold text-primary">LIBRARY PRIVACY NOTICE(SAMPLE ONLY)</h4>
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
                </div>
            </div>
            <div class="form-check text-primary d-flex justify-content-center mb-3">
                <input class="form-check-input me-1 border border-primary" type="checkbox" value="" id="book_request_privacyStatement_checkbox" required>
                <label class="form-check-label" for="book_request_privacyStatement_checkbox">
                    I have read and agreed to the Privacy Statement
                </label>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button type="button" class="btn btn-secondary rounded-pill text-onSecondary position-absolute start-0 fs-7 mx-3" data-bs-target="#book_request_review_modal" data-bs-toggle="modal"><i class="fa-solid fa-circle-arrow-left mx-1"></i>Back to review</button>
                <button class="btn btn-primary rounded-pill px-5 ms-auto" data-bs-target="#book_request_receipt_modal" data-bs-toggle="modal">Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Book Reservation Request Library Privary Notice Modal  -->

<!-- Book Reservation Request Library Receipt Modal  -->
<div class="modal fade" id="book_request_receipt_modal" data-bs-keyboard="false" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-tertiary">
                <i class="fa-solid fa-xl fa-receipt mx-2"></i>
                <h1 class="modal-title fs-3">Book Reservation Receipt</h1>
            </div>
            <div class="modal-body">
                <div class="container border rounded-3 w-80 mx-auto p-5">
                    <div class="row py-2">
                        <div class="col-8">
                            <h5 class="fw-bold mb-3">RECEIVED FROM</h5>
                            <div class="d-flex">
                                <label for="book_receipt_name" class="form-label me-3">Name: </label>
                                <p id="book_receipt_name" class="text-muted my-0">Danilo Jr. Abancia D</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_receipt_courseSection" class="form-label me-3">Course & Section: </label>
                                <p id="book_receipt_courseSection" class="text-muted my-0">Danilo Jr. Abancia D</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_receipt_studentNumber" class="form-label me-3">Student No.: </label>
                                <p id="book_receipt_studentNumber" class="text-muted my-0">201910150</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_receipt_email" class="form-label me-3">CvSU Mail: </label>
                                <p id="book_receipt_email" class="text-muted my-0">danilojr.abancia@cvsu.edu.ph</p>
                            </div>

                            <h5 class="fw-bold my-3">BORROW DETAILS</h5>
                            <div class="d-flex">
                                <label for="book_receipt_barrow_book_title" class="form-label me-3">Book Title: </label>
                                <p id="book_receipt_barrow_book_title" class="text-muted my-0">Organic Chemistry</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_receipt_barrow_pickupDate" class="form-label me-3">Pickup Date: </label>
                                <p id="book_receipt_barrow_pickupDate" class="text-muted my-0">12/25/23</p>
                            </div>
                            <div class="d-flex">
                                <label for="book_receipt_barrow_dueDate" class="form-label me-3">Due Date: </label>
                                <p id="book_receipt_barrow_dueDate" class="text-muted my-0">01/01/24</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div id="book_receipt_qr_code_container" class="text-center">
                                <img id="book_receipt_qr_Code_image" alt="QR Code" class="img-responsive ms-auto w-90 border border-5 border-primary rounded-4 mb-2 shadow bg-body-surface">
                                <p class="text-center m-0 p-0 mx-auto">Library ID:</p>
                                <p id="book_receipt_library_id" class="text-center m-0 p-0 mx-auto fs-8"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-8">
                            <h5 class="fw-bold my-3">BOOK DETAILS</h5>
                            <div class="d-flex">
                                <label for="" class="form-label me-3">Title: </label>
                                <p id="" class="text-muted my-0">Organic Chemistry</p>
                            </div>
                            <div class="d-flex">
                                <label for="" class="form-label me-3">Author: </label>
                                <p id="" class="text-muted my-0">Carney, Dorothy</p>
                            </div>
                            <div class="d-flex">
                                <label for="" class="form-label me-3">Accession No.: </label>
                                <p id="" class="text-muted my-0">TCL000379</p>
                            </div>
                            <div class="d-flex">
                                <label for="" class="form-label me-3">Call No. </label>
                                <p id="" class="text-muted my-0">QD251.2 C21</p>
                            </div>
                            <div class="d-flex">
                                <label for="" class="form-label me-3">Copyright Date: </label>
                                <p id="" class="text-muted my-0">2020</p>
                            </div>
                            <div class="d-flex">
                                <label for="" class="form-label me-3">Subject: </label>
                                <p id="" class="text-muted my-0">Chemistry, Organic, Organic chemistry</p>
                            </div>
                            <div class="d-flex">
                                <label for="" class="form-label me-3">ISBN: </label>
                                <p id="" class="text-muted my-0">978-1-7996-9914-9</p>
                            </div>
                            <div class="d-flex">
                                <label for="" class="form-label me-3">Barcode: </label>
                                <div id="book_receipt_barcode_container" class="text-center">
                                    <img id="book_receipt_barcode_image" alt="" class="img-responsive ms-auto w-90 mb-2 shadow bg-body-surface">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div id="book_receipt_image_container" class="text-center">
                                <img id="book_receipt_image" src="../../assets/img/sample-book-photo.png" class="img-responsive ms-auto w-90 my-3 shadow bg-body-surface">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-tertiary border-2 border-top border-teriary">
                <button type="button" class="btn btn-secondary rounded-pill text-onSecondary position-absolute start-0 fs-7 mx-3" data-bs-target="#book_request_privacyStatement_modal" data-bs-toggle="modal"><i class="fa-solid fa-circle-arrow-left mx-1"></i>Back to privacy statement</button>
                <button class="btn btn-primary rounded-pill px-5 ms-auto">SUBMIT</button>
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
                <img src="../../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" class="img-responsive">
                <button type="button" class="btn-close z-3 position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                <h2 class="modal-title text-center">Create new post</h2>
                <form action="../../php_script/file_upload.php" method="post" enctype="multipart/form-data">
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