// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal, generateQRCode, getFormatCourseSection, getformatDate, selectBookReservation } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

// Function for books datatables
let books_table = new DataTable('#books_table', {
    ajax: {
        type: 'GET',
        url: '../php_script/datatable_server_script.php',
        data: {
            table: 'books'
        }
    },
    processing: true, // DO NOT REMOVE
    serverSide: true, // DO NOT REMOVE
    iDisplayLength: 10,
    responsive: true,
    columnDefs: [
        {
            targets: -1,
            data: null,
            render: function (data, type, row) {
                let value = row[14];

                if (value === "Available to Borrow") {
                    return "<button id='request_btn' showModal('login_reminder_modal') class='btn btn-outline-primary fs-8 py-1'>REQUEST</button>";
                } else {
                    return "<button class='btn btn-outline-secondary fs-8 py-1' disabled>REQUEST</button>";
                }
            }
        },
        {
            targets: -2,
            render: function (data, type, row) {
                let value = row[14];
                if (value === "Available to Borrow") {
                    return "<h4 class='fst-italic text-primary'>" + data + "</h4>";
                } else {
                    return "<h4 class='fst-italic text-secondary'>" + data + "</h4>";
                }
            }
        },
        {
            responsivePriority: 1, targets: 1
        },
        {
            responsivePriority: 2, targets: -1
        },
        {
            responsivePriority: 3, targets: 0
        }
    ],


    createdRow: function (row, data, index) {
        let value = data[14];

        if (value == "Available to Borrow") {
            $('#request_btn', row).prop('disabled', false);
            $('td', row).addClass('available');
        } else {
            $('#request_btn', row).prop('disabled', true);
            $('td', row).addClass('notAvailable');
        }
    },
});

$('.pageLengthSelect').on('change', function () {
    let newPageLength = $(this).val();
    books_table.page.len(newPageLength).draw();
});


let opac_search_input = document.getElementById('opac_search_input');
let opac_search_btn = document.getElementById('opac_search_btn');
let opac_search_btn_icon = document.getElementById('opac_search_btn_icon');

opac_search_input.addEventListener('keyup', function (event) {
    if (event.key === 'Enter') {
        searchBooks(this.value);
    }
});

opac_search_btn.addEventListener('click', searchBooks(opac_search_input.value));


if (opac_search_input.value) {
    searchBooks(opac_search_input.value);
}

function searchBooks(query) {
    books_table.search(query).draw();
}


$(function () {
    $('#books_table tbody').on('click', '[id*=request_btn]', function () {
        let clickedRow = $(this).closest('tr');

        let bookAccessionNumber = clickedRow.find('td:eq(0)').text();
        let bookCallNumber = clickedRow.find('td:eq(3)').text();
        let bookTitle = clickedRow.find('td:eq(1)').text();

        let bookRequest = {
            "book_accession_number": bookAccessionNumber,
            "book_call_number": bookCallNumber,
            "book_title": bookTitle,
        };

        sessionStorage.setItem('sessionBookRequest', JSON.stringify(bookRequest));

        updateSession()
            .then(() => {
                let sessionData = JSON.parse(sessionStorage.getItem('sessionData')) || {};
                let sessionBookRequest = JSON.parse(sessionStorage.getItem('sessionBookRequest')) || {};
                // console.log(sessionBookRequest);
                if (sessionData && sessionData.user_token) {

                    $('#book_reservation_name').text(sessionData.user_fullname);
                    $('#book_reservation_student_number').text(sessionData.user_student_number);
                    $('#book_reservation_student_course').text(getFormatCourseSection(sessionData.user_student_course, sessionData.user_student_year, sessionData.user_student_section));
                    $('#book_reservation_email').text(sessionData.user_email);

                    $('#book_reservation_accession_number').text(sessionBookRequest.book_accession_number);
                    $('#book_reservation_title').text(sessionBookRequest.book_title);
                    $('#book_reservation_call_number').text(sessionBookRequest.book_call_number);
                    selectBookReservation();


                    $('#book_request_review_modal').modal('show');

                } else {
                    $('#login_reminder_modal').modal('show');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });


});
















// $('#books_table tbody').on('click', 'tr', function () {
//     alert($(this).find('td:first').text());
// });