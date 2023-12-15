
// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal, generateQRCode } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////


// Initialize Library ID ////////////////////////////////////////////////////////
const library_id = document.getElementById('library_id');
// Initialize Library ID ////////////////////////////////////////////////////////

// Initialize Image ////////////////////////////////////////////////////////
const signup_qr_code_image = document.getElementById('signup_qr_code_image');
// Initialize Image ////////////////////////////////////////////////////////

// Initialize Modal ////////////////////////////////////////////////////////
const add_new_event_modal = document.getElementById('add_new_event_modal');
const login_reminder_modal = document.getElementById('login_reminder_modal');
const signup_reminder_modal = document.getElementById('signup_reminder_modal');
const user_form_modal = document.getElementById('user_form_modal');
const user_review_modal = document.getElementById('user_review_modal');
const book_request_form_modal = document.getElementById('book_request_form_modal');
// Initialize Modal ////////////////////////////////////////////////////////


// Initialize Form ////////////////////////////////////////////////////////
const user_form = document.getElementById('user_form');
const add_new_event_form = document.getElementById('add_new_event_form');
// Initialize Form ////////////////////////////////////////////////////////


// Initialize Button ////////////////////////////////////////////////////////
const signup_reminder_modal_btn = document.getElementById("signup_reminder_modal_btn");
const add_new_event_modal_btn = document.getElementById("add_new_event_modal_btn");
const user_form_modal_btn = document.getElementById("user_form_modal_btn");
const user_review_modal_btn = document.getElementById("user_review_modal_btn");
const login_reminder_modal_btn = document.getElementById("login_reminder_modal_btn");
// Initialize Button ////////////////////////////////////////////////////////


// Initialize Image ////////////////////////////////////////////////////////
const user_avatarPreview = document.getElementById("user_avatarPreview");
// Initialize Image ////////////////////////////////////////////////////////


// Initialize Input ////////////////////////////////////////////////////////
const user_email_input = document.getElementById("user_email_input");
const user_name_input = document.getElementById("user_name_input");
const user_middlename_input = document.getElementById("user_middlename_input");
const user_surname_input = document.getElementById("user_surname_input");
const user_student_number_input = document.getElementById("user_student_number_input");
const user_username_input = document.getElementById("user_username_input");
const user_password_input = document.getElementById("user_password_input");
const user_re_password_input = document.getElementById("user_re_password_input");
// Initialize Input ////////////////////////////////////////////////////////


// Initialize Select ////////////////////////////////////////////////////////
const user_section_select = document.getElementById("user_section_select");
const user_year_select = document.getElementById("user_year_select");
const user_course_select = document.getElementById("user_course_select");
const user_member_type_select = document.getElementById("user_member_type_select");
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
// Initialize Feedback Label ////////////////////////////////////////////////////////


// Initialize Toggle Button ////////////////////////////////////////////////////////
const show_password_toggle = document.getElementById("show_password_toggle");
const show_re_password_toggle = document.getElementById("show_re_password_toggle");
// Initialize Toggle Button ////////////////////////////////////////////////////////


// $('#user_form_modal').modal('show'); // For Troubleshooting
// $('#user_review_modal').modal('show'); // For Troubleshooting
// $('#create_post_modal').modal('show'); // For Troubleshooting



function middleIRestriction() {
    user_middlename_input.value = user_middlename_input.value.replace(/[^a-zA-Z]/g, '');
    user_middlename_input.value = user_middlename_input.value.toUpperCase();
    if (user_middlename_input.value.length > 1) {
        user_middlename_input.value = user_middlename_input.value.slice(0, 1);
    }
}


function studentNumberRestriction(event) {
    user_student_number_input.value = user_student_number_input.value.replace(/[^0-9:]/g, "");
    if (event === 'onInput') {
        if (user_student_number_input.value.length > 9) {
            user_student_number_input.value = user_student_number_input.value.slice(0, 9);
        } else if (user_student_number_input.value.length < 9) {
            user_student_number_input.setCustomValidity('Invalid');
        } else {
            user_student_number_input.setCustomValidity('');
        }
    }
}




function checkPasswordStrength() {
    const result = zxcvbn(user_password_input.value);
    switch (result.score) {
        case 0:
        case 1:
        case 2:
            user_password_Strength_feedback.textContent = 'Weak Password';
            user_password_Strength_feedback.classList.add('text-secondary');
            break;
        case 3:
            user_password_Strength_feedback.textContent = 'Moderate Password';
            user_password_Strength_feedback.classList.add('text-info');
            user_password_Strength_feedback.classList.remove('text-secondary');
            break;
        case 4:
            user_password_Strength_feedback.textContent = 'Strong Password';
            user_password_Strength_feedback.classList.add('text-primary');
            user_password_Strength_feedback.classList.remove('text-info');
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

function handle_signupReminderModalBtn() {
    updateSession()
        .then(() => {
            var sessionData = JSON.parse(sessionStorage.getItem('sessionData'));
            console.log(sessionData);
            if (sessionData) {
                user_avatarPreview.src = sessionData.user_picture;
                user_email_input.value = sessionData.user_email;
                user_username_input.value = sessionData.user_email;
                user_name_input.value = sessionData.user_givenName;
                user_surname_input.value = sessionData.user_familyName;

                generateQRCode(sessionData.temp_token, signup_qr_code_image.id, 500);
                library_id.textContent = sessionData.temp_token;
            } else {
                console.error("No session data");
            }
            showModal(user_form_modal.id, signup_reminder_modal.id);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


function handle_UserFormModalBtn() {
    showModal(user_review_modal.id, user_form_modal.id);
}

function handle_addNewEventModalBtn() {
    // add_new_event_form
}

function handle_UserReviewModalBtn() {
    user_form.submit();
}
function handle_LoginReminderModalBtn() {
    showModal('', login_reminder_modal.id);
    location.href = "login.php";
}




// // Events for Click ////////////////////////////////////////////////////////
signup_reminder_modal_btn.addEventListener("click", handle_signupReminderModalBtn);
add_new_event_modal_btn.addEventListener("click", handle_addNewEventModalBtn);
user_review_modal_btn.addEventListener("click", handle_UserReviewModalBtn);
login_reminder_modal_btn.addEventListener("click", handle_LoginReminderModalBtn);

show_password_toggle.addEventListener("click", function () {
    passwordToggle(user_password_input, show_password_toggle);
});
show_re_password_toggle.addEventListener("click", function () {
    passwordToggle(user_re_password_input, show_re_password_toggle);
});
// // Events for Click ////////////////////////////////////////////////////////



// // Events for Input ////////////////////////////////////////////////////////
user_middlename_input.addEventListener("input", middleIRestriction);
user_student_number_input.addEventListener("input", function () {
    studentNumberRestriction('onInput');
});
user_password_input.addEventListener('input', checkPasswordStrength);
user_password_input.addEventListener('input', checkPasswordMatch);
user_re_password_input.addEventListener('input', checkPasswordMatch);
// // Events for Input ////////////////////////////////////////////////////////


// // Call Functions /////////////////////////////////////////////////////////
setupFormValidation(user_form.id, user_form_modal_btn.id, handle_UserFormModalBtn);
// // Call Functions /////////////////////////////////////////////////////////

