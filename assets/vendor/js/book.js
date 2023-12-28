// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal, generateQRCode } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

// Hide Header Search Bar
document.getElementById("header_book_search_top").style.visibility = "hidden";
// Hide Header Search Bar

const header_book_search_top = document.getElementById("header_book_search_top");
const header_book_search_collapse_icon = document.getElementById("header_book_search_collapse_icon");
const header_book_search_top_collapse = document.getElementById("header_book_search_top_collapse");
const book_search = document.getElementById("book_search");
const $book_search_input = $('#book_search_input');
const $header_book_search_input = $('#header_book_search_input');
const $header_book_search_collapse_input = $('#header_book_search_collapse_input');

// Show header search bar when book search Y position is greater than Yoffset
showHideSearchHeader();
function showHideSearchHeader() {
    window.addEventListener("scroll", function () {
        var current_offset = window.pageYOffset;
        var newOffset = book_search.offsetTop - book_search.offsetHeight;

        if (current_offset >= newOffset) {
            header_book_search_top.style.visibility = "visible";
            header_book_search_collapse_icon.style.visibility = "visible";
            header_book_search_top_collapse.style.visibility = "visible";
        } else {
            header_book_search_top.style.visibility = "hidden";
            header_book_search_collapse_icon.style.visibility = "hidden";
            header_book_search_top_collapse.style.visibility = "hidden";
        }
    })
}
// Show header search bar when book search Y position is greater than Yoffset


// Function for books datatables
let books_table = new DataTable('#books_table', {
    ajax: '../../../php_script/server_processing.php', // DO NOT REMOVE
    processing: true, // DO NOT REMOVE
    serverSide: true, // DO NOT REMOVE
    responsive: true,
    iDisplayLength: 10,
    columnDefs: [
        {
            targets: -1,
            data: null,
            render: function (data, type, row) {
                let value = row[14];

                if (value === "Available to Borrow") {
                    return "<button id='request_btn' showModal('login_reminder_modal') class='btn btn-outline-primary fs-8 py-1 w-100'>AVAILABLE</button>";
                } else {
                    return "<button class='btn btn-outline-secondary fs-8 py-1 w-100' disabled>NOT AVAILABLE</button>";
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
            responsivePriority: 1, targets: 0
        },
        {
            responsivePriority: 2, targets: -1
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
    var newPageLength = $(this).val();
    books_table.page.len(newPageLength).draw();
});

$book_search_input.on('keyup', function (event) {
    if (event.key === "Enter") searchBooks($(this));
});
$header_book_search_input.on('keyup', function (event) {
    if (event.key === "Enter") searchBooks($(this));
});
$header_book_search_collapse_input.on('keyup', function (event) {
    if (event.key === "Enter") searchBooks($(this));
});

function searchBooks($input) {
    books_table.search($input.val()).draw();
    $book_search_input.val($input.val());
    $header_book_search_input.val($input.val());
    $header_book_search_collapse_input.val($input.val());
}

// Function for books datatables


$(function () {
    $('#books_table tbody').on('click', '[id*=request_btn]', function () {
        updateSession()
            .then(() => {
                var sessionData = JSON.parse(sessionStorage.getItem('sessionData'));
                console.log(sessionData);
                if (sessionData) {
                    if (sessionData.user_token != null) {
                        $('#book_request_review_modal').modal('show');
                    }
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
