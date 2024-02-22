
// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal, generateQRCode, generateBarCode, getformatDate, getFormatCourseSection, mask } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////


// Initialize Library ID ////////////////////////////////////////////////////////
const library_id = document.getElementById('library_id');
// Initialize Library ID ////////////////////////////////////////////////////////

// Initialize Receipt ////////////////////////////////////////////////////////
const book_receipt_library_id = document.getElementById('book_receipt_library_id');
const book_receipt_qr_Code_img = document.getElementById('book_receipt_qr_Code_img');
const book_receipt_name = document.getElementById("book_receipt_name");
const book_receipt_courseSection = document.getElementById("book_receipt_courseSection");
const book_receipt_studentNumber = document.getElementById("book_receipt_studentNumber");
const book_receipt_email = document.getElementById("book_receipt_email");

const book_receipt_barrow_book_accession_number = document.getElementById("book_receipt_barrow_book_accession_number");
const book_receipt_barrow_book_title = document.getElementById("book_receipt_barrow_book_title");
const book_receipt_barrow_book_call_number = document.getElementById("book_receipt_barrow_book_call_number");
const book_receipt_barrow_pickupDate = document.getElementById("book_receipt_barrow_pickupDate");
const book_receipt_barrow_returnDate = document.getElementById("book_receipt_barrow_returnDate");
// Initialize Receipt ////////////////////////////////////////////////////////


// Initialize Image ////////////////////////////////////////////////////////
const user_avatarPreview = document.getElementById("user_avatarPreview");
const signup_qr_code_img = document.getElementById('signup_qr_code_img');
// Initialize Image ////////////////////////////////////////////////////////

// Initialize Modal ////////////////////////////////////////////////////////
const add_new_event_modal = document.getElementById('add_new_event_modal');
const login_reminder_modal = document.getElementById('login_reminder_modal');
const signup_reminder_modal = document.getElementById('signup_reminder_modal');
const member_type_modal = document.getElementById('member_type_modal');
const user_signup_modal = document.getElementById('user_signup_modal');
const user_review_modal = document.getElementById('user_review_modal');
const book_request_form_modal = document.getElementById('book_request_form_modal');
const book_request_privacy_modal = document.getElementById('book_request_privacy_modal');
const book_request_receipt_modal = document.getElementById('book_request_receipt_modal');
const book_request_review_modal = document.getElementById('book_request_review_modal');
// Initialize Modal ////////////////////////////////////////////////////////


// Initialize Form ////////////////////////////////////////////////////////
const user_form = document.getElementById('user_form');
const add_new_event_form = document.getElementById('add_new_event_form');
const book_request_privacyForm = document.getElementById('book_request_privacyForm');
const receipt_form = document.getElementById('receipt_form');
const book_request_review_form = document.getElementById('book_request_review_form');
// Initialize Form ////////////////////////////////////////////////////////

// Initialize Button ////////////////////////////////////////////////////////
const receipt_submit_btn = document.getElementById("receipt_submit_btn");
const receipt_print_btn = document.getElementById("receipt_print_btn");
const receipt_download_btn = document.getElementById("receipt_download_btn");

const signup_reminder_modal_btn = document.getElementById("signup_reminder_modal_btn");
const add_new_event_modal_btn = document.getElementById("add_new_event_modal_btn");
const user_review_modal_btn = document.getElementById("user_review_modal_btn");
const member_type_modal_btn = document.getElementById("member_type_modal_btn");
const member_type_modal_btn_processing = document.getElementById("member_type_modal_btn_processing");
const user_signup_modal_btn = document.getElementById("user_signup_modal_btn");
const user_signup_modal_btn_processing = document.getElementById("user_signup_modal_btn_processing");
const login_reminder_modal_btn = document.getElementById("login_reminder_modal_btn");
const book_request_privacy_btn = document.getElementById("book_request_privacy_btn");
const book_request_review_modal_btn = document.getElementById("book_request_review_modal_btn");
// Initialize Button ////////////////////////////////////////////////////////


// Initialize Input ////////////////////////////////////////////////////////
const user_email_input = document.getElementById("user_email_input");
const user_member_type_input = document.getElementById("user_member_type_input");
const user_name_input = document.getElementById("user_name_input");
const user_middlename_input = document.getElementById("user_middlename_input");
const user_student_number_input = document.getElementById("user_student_number_input");
const user_surname_input = document.getElementById("user_surname_input");
const user_username_input = document.getElementById("user_username_input");
const user_password_input = document.getElementById("user_password_input");
const user_re_password_input = document.getElementById("user_re_password_input");
const user_faculty_number_input = document.getElementById("user_faculty_number_input");
// Initialize Input ////////////////////////////////////////////////////////


// Initialize Select ////////////////////////////////////////////////////////
const user_student_section_select = document.getElementById("user_student_section_select");
const user_student_year_select = document.getElementById("user_student_year_select");
const user_student_course_select = document.getElementById("user_student_course_select");
const user_faculty_department_select = document.getElementById("user_faculty_department_select");
// Initialize Select ////////////////////////////////////////////////////////


// Initialize Feedback Label ////////////////////////////////////////////////////////
const user_member_type_feedback = document.getElementById("user_member_type_feedback");
const user_name_feedback = document.getElementById("user_name_feedback");
const user_middlename_feedback = document.getElementById("user_middlename_feedback");
const user_surname_feedback = document.getElementById("user_surname_feedback");
const user_student_number_feedback = document.getElementById("user_student_number_feedback");
const user_course_feedback = document.getElementById("user_course_feedback");
const user_year_feedback = document.getElementById("user_year_feedback");
const user_section_feedback = document.getElementById("user_section_feedback");
const user_username_feedback = document.getElementById("user_username_feedback");
const user_password_Strength_feedback = document.getElementById("user_password_Strength_feedback");
const user_password_checkMatch_feedback = document.getElementById("user_password_checkMatch_feedback");
const book_request_privacy_feedback = document.getElementById("book_request_privacy_feedback");
// Initialize Feedback Label ////////////////////////////////////////////////////////

// Initialize Label ////////////////////////////////////////////////////////
const book_request_privacy_label = document.getElementById("book_request_privacy_label");
const welcome_name_label = document.getElementById("welcome_name_label");
// Initialize Label ////////////////////////////////////////////////////////


// Initialize Toggle Button ////////////////////////////////////////////////////////
const show_password_toggle = document.getElementById("show_password_toggle");
const show_re_password_toggle = document.getElementById("show_re_password_toggle");
// Initialize Toggle Button ////////////////////////////////////////////////////////

// Initialize checkbox ////////////////////////////////////////////////////////
const book_request_privacy_checkbox = document.getElementById("book_request_privacy_checkbox");
// Initialize checkbox ////////////////////////////////////////////////////////


// $('#login_reminder_modal').modal('show'); // For Troubleshooting
// $('#add_new_event_modal').modal('show'); // For Troubleshooting
// $('#signup_reminder_modal').modal('show'); // For Troubleshooting
// $('#member_type_modal').modal('show'); // For Troubleshooting
// $('#user_signup_modal').modal('show'); // For Troubleshooting
// $('#user_review_modal').modal('show'); // For Troubleshooting
// $('#create_post_modal').modal('show'); // For Troubleshooting
// $('#book_request_review_modal').modal('show'); // For Troubleshooting
// $('#book_request_privacy_modal').modal('show'); // For Troubleshooting
// $('#book_request_receipt_modal').modal('show'); // For Troubleshooting
// $('#authentication_modal').modal('show'); // For Troubleshooting


function middleIRestriction() {
    user_middlename_input.value = user_middlename_input.value.replace(/[^a-zA-Z]/g, '');
    user_middlename_input.value = user_middlename_input.value.toUpperCase();
    if (user_middlename_input.value.length > 1) {
        user_middlename_input.value = user_middlename_input.value.slice(0, 1);
    }
}


function studentNumberRestriction(event) {
    user_student_number_input.value = user_student_number_input.value.replace(/[^0-9:]/g, "");
    if (user_student_number_input.value.length > 9) {
        user_student_number_input.value = user_student_number_input.value.slice(0, 9);
    } else if (user_student_number_input.value.length < 9) {
        user_student_number_input.setCustomValidity('Invalid');
    } else {
        user_student_number_input.setCustomValidity('');
    }
}


// function checkUsernameAvailability() {

// }


function checkPasswordStrength() {
    const result = zxcvbn(user_password_input.value);

    switch (result.score) {
        case 0:
        case 1:
        case 2:
            user_password_Strength_feedback.textContent = 'Weak Password!';
            user_password_Strength_feedback.classList.add('text-secondary');
            user_password_Strength_feedback.classList.remove('text-info');
            user_password_Strength_feedback.classList.remove('text-primary');
            user_password_input.setCustomValidity('invalid');
            break;
        case 3:
            user_password_Strength_feedback.textContent = 'Moderate Password!';
            user_password_Strength_feedback.classList.add('text-info');
            user_password_Strength_feedback.classList.remove('text-secondary');
            user_password_Strength_feedback.classList.remove('text-primary');
            user_password_input.setCustomValidity('');
            break;
        case 4:
            user_password_Strength_feedback.textContent = 'Strong Password';
            user_password_Strength_feedback.classList.add('text-primary');
            user_password_Strength_feedback.classList.remove('text-secondary');
            user_password_Strength_feedback.classList.remove('text-info');
            user_password_input.setCustomValidity('');
            break;
        default:
            user_password_Strength_feedback.textContent = '';
    }
}


function checkPasswordMatch() {
    const password = user_password_input.value;
    const repeatPassword = user_re_password_input.value;

    if (password && repeatPassword && password === repeatPassword) {
        user_password_checkMatch_feedback.textContent = 'Password match.';
        user_password_checkMatch_feedback.classList.add('text-primary');
        user_password_checkMatch_feedback.classList.remove('text-secondary');
        user_re_password_input.setCustomValidity('');
    } else {
        user_password_checkMatch_feedback.textContent = 'Password do not match.';
        user_password_checkMatch_feedback.classList.add('text-secondary');
        user_password_checkMatch_feedback.classList.remove('text-primary');
        user_re_password_input.setCustomValidity('Invalid');
    }
}

function passwordToggle(password, toggle) {
    if (password.getAttribute('type') === 'password') {
        password.setAttribute('type', 'text');
        toggle.classList.add('fa-eye');
        toggle.classList.remove('fa-eye-slash');
    } else {
        password.setAttribute('type', 'password');
        toggle.classList.add('fa-eye-slash');
        toggle.classList.remove('fa-eye');
    }
}


function handle_receiptSubmitBtn() {
    // receipt_form.submit();
    const formData = new FormData(document.getElementById('receipt_form'));
    const submittedLiveToast = document.getElementById('submittedLiveToast');
    const submitReceiptToast = bootstrap.Toast.getOrCreateInstance(submittedLiveToast, { delay: 2000 });
    const receiptNo_container = document.getElementById('receiptNo_container');
    const receipt_action_btn = document.getElementById('receipt_action_btn');

    submitReceiptToast.show();
    receiptNo_container.classList.remove('d-none');
    receipt_action_btn.classList.remove('d-none');
    receipt_submit_btn.classList.add('d-none');


    fetch('../php_script/receipt_script.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            generateBarCode("#book_receipt_id", data.transactionNo, 2, 50, 14);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function handle_receiptPrintBtn() {
    window.print();
}


function handle_receiptDownloadBtn() {
    html2canvas(document.querySelector("#receipt"), { allowTaint: false, useCORS: true, scale: 3 }).then(function (canvas) {
        var link = document.querySelector("#receipt");
        link.setAttribute("download", "receipt.png");
        link.setAttribute(
            "href",
            canvas.toDataURL("image/png").replace("image/png", "image/octet-stream")
        );
        link.click();
    });
    showModal('', book_request_receipt_modal.id);
    setInterval(function (e) {
        window.location.replace("./profile.php");
    }, 1000)
}


function handle_UserFormModalBtn() {
    setupFormValidation(user_form.id, user_signup_modal_btn.id, function (e) {
        user_signup_modal_btn_processing.classList.remove('d-none');
        user_signup_modal_btn.classList.add('d-none');

        setTimeout(function (e) {
            showModal(user_review_modal.id, user_signup_modal.id);
        }, 5000);
    });
}


function handle_addNewEventModalBtn() {
}

function handle_UserReviewModalBtn() {
    user_form.submit();
}
function handle_LoginReminderModalBtn() {
    showModal('', login_reminder_modal.id);
    location.href = "login.php";
}


function handle_membertype(selectedValue) {
    let faculty_info = document.querySelectorAll('.faculty-info');
    let student_info = document.querySelectorAll('.student-info');

    if (selectedValue === 'Student') {
        student_info.forEach(function (e) {
            e.classList.remove('d-none');
        })
        faculty_info.forEach(function (e) {
            e.classList.add('d-none');
        })
        user_student_number_input.required = true;
        user_student_section_select.required = true;
        user_student_year_select.required = true;
        user_student_course_select.required = true;
        user_faculty_number_input.required = false;
        user_faculty_department_select.required = false;

        user_member_type_input.value = 'Student';
    } else {
        student_info.forEach(function (e) {
            e.classList.add('d-none');
        })
        faculty_info.forEach(function (e) {
            e.classList.remove('d-none');
        })
        user_student_number_input.required = false;
        user_student_section_select.required = false;
        user_student_year_select.required = false;
        user_student_course_select.required = false;
        user_faculty_number_input.required = true;
        user_faculty_department_select.required = true;

        user_member_type_input.value = 'Faculty';
    }
}

function handle_bookRequestPrivacyStatementBtn() {
    if (book_request_privacy_checkbox.checked) {
        updateSession()
            .then(() => {
                let sessionData = JSON.parse(sessionStorage.getItem('sessionData')) || {};
                let sessionBookRequest = JSON.parse(sessionStorage.getItem('sessionBookRequest')) || {};
                if (sessionData) {
                    //PERSONAL DETAILS                    
                    book_receipt_library_id.value = sessionData.user_token;
                    book_receipt_qr_Code_img.src = generateQRCode(sessionData.user_token, 500);
                    book_receipt_name.value = sessionData.user_fullname;
                    book_receipt_courseSection.value = getFormatCourseSection(sessionData.user_student_course, sessionData.user_student_year, sessionData.user_student_section);
                    book_receipt_studentNumber.value = sessionData.user_student_number;
                    book_receipt_email.value = sessionData.user_email;

                    //BORROW DETAILS
                    book_receipt_barrow_book_accession_number.value = sessionBookRequest.book_accession_number;
                    book_receipt_barrow_book_title.value = sessionBookRequest.book_title;
                    book_receipt_barrow_book_call_number.value = sessionBookRequest.book_call_number;

                    book_receipt_barrow_pickupDate.value = getformatDate(new Date(sessionBookRequest.book_pickup_date));
                    book_receipt_barrow_returnDate.value = getformatDate(new Date(sessionBookRequest.book_return_date));
                } else {
                    console.error("No session data");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        showModal(book_request_receipt_modal.id, book_request_privacy_modal.id);
    } else {
        book_request_privacy_feedback.textContent = 'Please confirm that you have read and understood the Privacy Policy';
        if (book_request_privacy_feedback) {
            book_request_privacy_feedback.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }
}

function handle_bookRequestPrivacyCheckbox() {
    if (book_request_privacy_checkbox.checked) {
        book_request_privacy_label.classList.add('text-primary');
        book_request_privacy_checkbox.classList.add('border-primary');
        book_request_privacy_feedback.classList.add('text-primary');
        book_request_privacy_feedback.classList.remove('text-secondary');
        book_request_privacy_label.classList.remove('text-secondary');
        book_request_privacy_checkbox.classList.remove('border-secondary');
    } else {
        book_request_privacy_label.classList.remove('text-primary');
        book_request_privacy_checkbox.classList.remove('border-primary');
        book_request_privacy_feedback.classList.remove('text-primary');
        book_request_privacy_feedback.classList.add('text-secondary');
        book_request_privacy_label.classList.add('text-secondary');
        book_request_privacy_checkbox.classList.add('border-secondary');
    }
}

function handle_bookRequestReviewModalBtn() {
    showModal(book_request_privacy_modal.id, book_request_review_modal.id);
    let sessionBookRequest = JSON.parse(sessionStorage.getItem('sessionBookRequest')) || {};

    sessionBookRequest['book_pickup_date'] = $('#pickup_date_input').val();
    sessionBookRequest['book_return_date'] = $('#return_date_input').val();

    sessionStorage.setItem('sessionBookRequest', JSON.stringify(sessionBookRequest));
    console.log(sessionBookRequest)
}

function handle_SignupReminderModalBtn() {
    showModal(member_type_modal.id, signup_reminder_modal.id);
}

function handle_MemberTypeModalBtn() {
    updateSession()
        .then(() => {
            let sessionData = JSON.parse(sessionStorage.getItem('sessionData')) || {};
            if (sessionData) {
                //PERSONAL DETAILS                    
                user_avatarPreview.src = sessionData.user_picture;
                signup_qr_code_img.src = generateQRCode(sessionData.temp_token, 500);
                user_email_input.value = sessionData.user_email;
                user_name_input.value = sessionData.user_givenName;
                user_surname_input.value = sessionData.user_familyName;
                user_username_input.value = sessionData.user_email;
                library_id.textContent = mask(sessionData.temp_token);
                welcome_name_label.textContent = sessionData.user_givenName;
            } else {
                console.error("No session data");
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

    var selectedValue = $("input[type='radio'][name='membertype']:checked").next().text();
    console.log(selectedValue);
    handle_membertype(selectedValue);

    showModal(user_signup_modal.id, member_type_modal.id);
    user_signup_modal_btn.click();
}



// // Events for Click ////////////////////////////////////////////////////////
receipt_submit_btn.addEventListener("click", handle_receiptSubmitBtn);
receipt_print_btn.addEventListener("click", handle_receiptPrintBtn);
receipt_download_btn.addEventListener("click", handle_receiptDownloadBtn);

add_new_event_modal_btn.addEventListener("click", handle_addNewEventModalBtn);
user_review_modal_btn.addEventListener("click", handle_UserReviewModalBtn);
signup_reminder_modal_btn.addEventListener("click", handle_SignupReminderModalBtn);
member_type_modal_btn.addEventListener("click", handle_MemberTypeModalBtn);
user_signup_modal_btn.addEventListener("click", handle_UserFormModalBtn);
login_reminder_modal_btn.addEventListener("click", handle_LoginReminderModalBtn);
book_request_privacy_btn.addEventListener("click", handle_bookRequestPrivacyStatementBtn);

show_password_toggle.addEventListener("click", function () {
    passwordToggle(user_password_input, show_password_toggle);
});
show_re_password_toggle.addEventListener("click", function () {
    passwordToggle(user_re_password_input, show_re_password_toggle);
});
// // Events for Click ////////////////////////////////////////////////////////



// // Events for Input ////////////////////////////////////////////////////////
user_middlename_input.addEventListener("input", middleIRestriction);
user_student_number_input.addEventListener("input", studentNumberRestriction);
user_password_input.addEventListener('input', checkPasswordStrength);
user_re_password_input.addEventListener('input', checkPasswordMatch);
// // Events for Input ////////////////////////////////////////////////////////

// // Events for Change ////////////////////////////////////////////////////////
book_request_privacy_checkbox.addEventListener("change", handle_bookRequestPrivacyCheckbox);
// // Events for Change ////////////////////////////////////////////////////////

// // Call Functions /////////////////////////////////////////////////////////
setupFormValidation(book_request_review_form.id, book_request_review_modal_btn.id, handle_bookRequestReviewModalBtn);
// // Call Functions /////////////////////////////////////////////////////////

