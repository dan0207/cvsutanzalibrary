// Import Javascript Files ////////////////////////////////////////////////////////
import { setupFormValidation, showModal, generateQRCode } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

// Initialize Library ID ////////////////////////////////////////////////////////
const library_id = document.getElementById('library_id');
// Initialize Library ID ////////////////////////////////////////////////////////

// Initialize Image ////////////////////////////////////////////////////////
const profile_qr_code_image = document.getElementById('profile_qr_code_image');
// Initialize Image ////////////////////////////////////////////////////////


fetch('../php_script/db_getData.php')
    .then(response => response.json())
    .then(data => {
        console.log(data.users.active);
        // generateQRCode(data.users.active.user_token, profile_qr_code_image.id, 500);
        // library_id.textContent = data.users.active.user_token;
        document.getElementById('profile_picture').src = data.users.active.user_picture;
        // document.getElementById('profile_name').innerHTML = data.users.active.user_fullname;
        // document.getElementById('profile_student_number').innerHTML = data.users.active.user_student_number;
        // document.getElementById('profile_email').innerHTML = data.users.active.user_email;
        // document.getElementById('profile_type').innerHTML = data.users.active.user_member_type;
    })
    .catch(error => console.error('Error:', error));
    
let logout_btn = document.querySelectorAll("logout-btn");

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

logout_btn.forEach(function (e) {
    e.addEventListener("click", function () {
        sessionStorage.clear();
    });
})




