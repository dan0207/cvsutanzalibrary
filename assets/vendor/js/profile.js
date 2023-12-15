// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal, generateQRCode } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

// Initialize Library ID ////////////////////////////////////////////////////////
const library_id = document.getElementById('library_id');
// Initialize Library ID ////////////////////////////////////////////////////////

// Initialize Image ////////////////////////////////////////////////////////
const profile_qr_code_image = document.getElementById('profile_qr_code_image');
// Initialize Image ////////////////////////////////////////////////////////

updateSession()
    .then(() => {
        var sessionData = JSON.parse(sessionStorage.getItem('sessionData'));
        if (sessionData) {
            // generateQRCode(sessionData.user_token, profile_qr_code_image.id, 500);
            generateQRCode(sessionData.user_token, profile_qr_code_image.id, 500);
            library_id.textContent = sessionData.user_token;
            document.getElementById('profile_picture').src = sessionData.user_picture;
            document.getElementById('profile_name').innerHTML = sessionData.user_fullname;
            document.getElementById('profile_student_number').innerHTML = sessionData.user_student_number;
            document.getElementById('profile_email').innerHTML = sessionData.user_email;
            document.getElementById('profile_type').innerHTML = sessionData.user_member_type;
        } else {
            console.error("No session data");
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });


let logout_btn = document.getElementById("logout_btn");

userBookTransaction();

function userBookTransaction() {
    let user_book_request_table = new DataTable('#user_book_request_table', {
        responsive: true,
    });
    let user_book_transaction_table = new DataTable('#user_book_transaction_table', {
        responsive: true,
    });
    let user_handled_book_table = new DataTable('#user_handled_book_table', {
        responsive: true,
    });
}

logout_btn.addEventListener("click", function () {
    sessionStorage.clear();
});



