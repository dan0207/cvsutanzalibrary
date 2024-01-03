// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal, generateQRCode, activateTopSearch } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////


// Function for books datatables
let books_table = new DataTable('#books_table', {
    ajax: '../php_script/server_processing.php', // DO NOT REMOVE
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


opac_search_input.addEventListener('keyup', function (event) {
    if (event.key === 'Enter') {
        searchBooks(this);
    }
});

function searchBooks(input) {
    books_table.search(input.value).draw();
}
// Function for books datatables
$(function () {
    $('#books_table tbody').on('click', '[id*=request_btn]', function () {
        let currentDate = new Date();

        let clickedRow = $(this).closest('tr');

        let accessNumber = clickedRow.find('td:eq(0)').text(); 
        let bookTitle = clickedRow.find('td:eq(1)').text(); 
        let bookAuthor = clickedRow.find('td:eq(2)').text(); 

        $('#book_reservation_accession_number').text(accessNumber);
        $('#book_reservation_title').text(bookTitle);
        $('#book_reservation_author').text(bookAuthor);

        // Your existing code to update session and show the appropriate modal
        updateSession()
            .then(() => {
                let sessionData = JSON.parse(sessionStorage.getItem('sessionData'));
                if (sessionData && sessionData.user_token) {
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
