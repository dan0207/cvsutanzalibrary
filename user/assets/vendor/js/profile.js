// Import Javascript Files ////////////////////////////////////////////////////////
import { setupFormValidation, showModal, generateQRCode, getFormatCourseSection, } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

// Initialize Library ID ////////////////////////////////////////////////////////
const library_id = document.getElementById('library_id');
// Initialize Library ID ////////////////////////////////////////////////////////

// Initialize Image ////////////////////////////////////////////////////////
const profile_qr_code_image = document.getElementById('profile_qr_code_image');
// Initialize Image ////////////////////////////////////////////////////////



fetch('../php_script/db_getAllData.php')
    .then(response => response.json())
    .then(data => {
        let profile_picture = data.users.active.user_picture;
        let profile_name = data.users.active.user_fullname;
        let profile_student_courseSection = getFormatCourseSection(data.users.active.user_student_course, data.users.active.user_student_year, data.users.active.user_student_section);
        let profile_student_number = data.users.active.user_student_number;
        let profile_email = data.users.active.user_email;
        let profile_type = data.users.active.user_member_type;


        let library_id = data.users.active.user_token;
        let profile_qr_code_img = generateQRCode(data.users.active.user_token, 500);


        document.querySelectorAll('.profile-img').forEach(element => { element.src = profile_picture; });
        document.querySelectorAll('.profile-name').forEach(element => { element.innerHTML = profile_name; });
        document.querySelectorAll('.profile-student-courseSection').forEach(element => { element.innerHTML = profile_student_courseSection; });
        document.querySelectorAll('.profile-student-number').forEach(element => { element.innerHTML = profile_student_number; });
        document.querySelectorAll('.profile-email').forEach(element => { element.innerHTML = profile_email; });
        document.querySelectorAll('.profile-type').forEach(element => { element.innerHTML = profile_type; });

        document.querySelectorAll('.profile-qr-code-img').forEach(element => { element.src = profile_qr_code_img; });
        document.querySelectorAll('.library-id').forEach(element => { element.innerHTML = library_id; });
    })
    .catch(error => console.error('Error:', error));

$(document).ready(function () {
    $('#user_book_request_table').DataTable({
        ajax: '../php_script/book_request_server_script.php', // DO NOT REMOVE
        processing: true, // DO NOT REMOVE
        serverSide: true, // DO NOT REMOVE
        iDisplayLength: 10,
        responsive: true,
        // dom: 'Bfrtip',
        // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        columnDefs: [
            {
                targets: -1,
                data: null,
                render: function (data, type, row) {
                    let value = row[1];
                    if (value === "pending") {
                        return "<button id='cancel_btn' class='btn btn-outline-secondary fs-8 py-1'>CANCEL</button>";
                    } else {
                        return "<button id='cancel_btn' class='btn btn-outline-secondary fs-8 py-1 disabled'>CANCEL</button>";
                    }
                }
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    let value = row[1];
                    if (value === "pending") {
                        return "<p class='fw-semibold fs-7 m-0 fst-italic text-warning'>" + data + "</p>";
                    } else {
                        return "<p class='fw-semibold fs-7 m-0 fst-italic text-primary'>" + data + "</p>";
                    }
                }
            },
            {
                responsivePriority: 1, targets: 0
            },
            {
                responsivePriority: 2, targets: -1
            },
            {
                responsivePriority: 3, targets: -2
            },
        ],
    });
});

// let user_book_request_table = new DataTable('#user_book_request_table', {
//     responsive: true,
// });
let user_book_transaction_table = new DataTable('#user_book_transaction_table', {
    responsive: true,
});
let user_handled_book_table = new DataTable('#user_handled_book_table', {
    responsive: true,
});


let logout_btn = document.querySelectorAll("logout-btn");
logout_btn.forEach(function (e) {
    e.addEventListener("click", function () {
        sessionStorage.clear();
    });
})




