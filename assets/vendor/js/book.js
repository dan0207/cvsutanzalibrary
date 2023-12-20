// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal, generateQRCode } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

const $book_search_input = $('#book_search_input');
const $opac_search_top_input = $('#opac_search_top_input');
const $opac_search_top_collapse_input = $('#opac_search_top_collapse_input');

// Show header search bar when book search Y position is greater than Yoffset
$(document).ready(function () {
    var opac_search_top = document.getElementById("opac_search_top");
    var opac_search_top_icon = document.getElementById("opac_search_top_icon");
    var opac_search_top_collapse = document.getElementById("opac_search_top_collapse");
    var book_search = document.getElementById("book_search");


    window.addEventListener("scroll", function () {
        var current_offset = window.pageYOffset;
        var newOffset = book_search.offsetTop - book_search.offsetHeight;

        if (current_offset >= newOffset) {
            opac_search_top.style.visibility = "visible";
            opac_search_top_icon.style.visibility = "visible";
            opac_search_top_collapse.style.visibility = "visible";
        } else {
            opac_search_top.style.visibility = "hidden";
            opac_search_top_icon.style.visibility = "hidden";
            opac_search_top_collapse.style.visibility = "hidden";
        }
    })
});
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
                    return "<button id='request_btn' showModal('login_reminder_modal') class='btn btn-outline-primary fs-5 w-50'>REQUEST</button>";
                } else {
                    return "<button class='btn btn-outline-secondary fs-5 w-50' disabled>Not Available</button>";
                }
            }
        },
        {
            "targets": -2,
            "render": function (data, type, row) {
                let value = row[14];
                if (value === "Available to Borrow") {
                    return "<h4 class='fst-italic text-primary'>" + data + "</h4>";
                } else {
                    return "<h4 class='fst-italic text-secondary'>" + data + "</h4>";
                }
            }
        }
    ],
    "createdRow": function (row, data, index) {
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
$opac_search_top_input.on('keyup', function (event) {
    if (event.key === "Enter") searchBooks($(this));
});
$opac_search_top_collapse_input.on('keyup', function (event) {
    if (event.key === "Enter") searchBooks($(this));
});

function searchBooks($input) {
    books_table.search($input.val()).draw();
    $book_search_input.val($input.val());
    $opac_search_top_input.val($input.val());
    $opac_search_top_collapse_input.val($input.val());
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
