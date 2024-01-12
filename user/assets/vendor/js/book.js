// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal, generateQRCode, getFormatCourseSection, getformatDate } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////


// Function for books datatables
let books_table = new DataTable('#books_table', {
    ajax: '../php_script/books_server_script.php', // DO NOT REMOVE
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

        let currentDate = new Date();

        // let bookPickupDate = getformatDate(currentDate)
        let bookPickupDate = currentDate;
        let bookReturnDate = new Date(currentDate);
        bookReturnDate.setDate(currentDate.getDate() + 7);

        // bookReturnDate = getformatDate(bookReturnDate);
        bookReturnDate = bookReturnDate;

        let clickedRow = $(this).closest('tr');

        let bookAccessionNumber = clickedRow.find('td:eq(0)').text();
        let bookTitle = clickedRow.find('td:eq(1)').text();
        let bookAuthor = clickedRow.find('td:eq(2)').text();
        let bookCallNumber = clickedRow.find('td:eq(3)').text();
        let bookMaterial_type = clickedRow.find('td:eq(4)').text();
        let bookLanguage = clickedRow.find('td:eq(5)').text();
        let bookPublication = clickedRow.find('td:eq(6)').text();
        let bookDescription = clickedRow.find('td:eq(7)').text();
        let bookContent_type = clickedRow.find('td:eq(8)').text();
        let bookMedia_type = clickedRow.find('td:eq(9)').text();
        let bookCarrier_type = clickedRow.find('td:eq(10)').text();
        let bookIsbn = clickedRow.find('td:eq(11)').text();
        let bookSubject = clickedRow.find('td:eq(12)').text();
        let bookClassification = clickedRow.find('td:eq(13)').text();

        let bookRequest = { 
            "book_accession_number": bookAccessionNumber, 
            "book_title": bookTitle, 
            "book_author": bookAuthor, 
            "book_call_number": bookCallNumber,
            "book_material_type": bookMaterial_type,
            "book_language": bookLanguage,
            "book_publication": bookPublication,
            "book_description": bookDescription,
            "book_content_type": bookContent_type,
            "book_media_type": bookMedia_type,
            "book_carrier_type": bookCarrier_type,
            "book_isbn": bookIsbn,
            "book_subject": bookSubject,
            "book_classification": bookClassification,
            "book_pickup_date": bookPickupDate, 
            "book_return_date": bookReturnDate,
        };

        sessionStorage.setItem('sessionBookRequest', JSON.stringify(bookRequest));

        updateSession()
            .then(() => {
                let sessionData = JSON.parse(sessionStorage.getItem('sessionData'));
                let sessionBookRequest = JSON.parse(sessionStorage.getItem('sessionBookRequest'));
                if (sessionData && sessionData.user_token) {

                    $('#book_reservation_name').text(sessionData.user_fullname);
                    $('#book_reservation_student_number').text(sessionData.user_student_number);
                    $('#book_reservation_student_course').text(getFormatCourseSection(sessionData.user_student_course, sessionData.user_student_year, sessionData.user_student_section));
                    $('#book_reservation_email').text(sessionData.user_email);

                    user_email_input.value = sessionData.user_email;
                    user_username_input.value = sessionData.user_email;
                    user_name_input.value = sessionData.user_givenName;
                    user_surname_input.value = sessionData.user_familyName;
                    library_id.textContent = sessionData.temp_token;

                    $('#book_reservation_accession_number').text(sessionBookRequest.book_accession_number);
                    $('#book_reservation_title').text(sessionBookRequest.book_title);
                    $('#book_reservation_author').text(sessionBookRequest.book_author);
                    $('#book_reservation_pickup_date').val(new Date(sessionBookRequest.book_pickup_date).toISOString().split('T')[0]);
                    $('#book_reservation_due_date').val(new Date(sessionBookRequest.book_return_date).toISOString().split('T')[0]);

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
