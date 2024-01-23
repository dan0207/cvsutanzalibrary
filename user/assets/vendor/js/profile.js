// Import Javascript Files ////////////////////////////////////////////////////////
import { } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

$(document).ready(function () {
    $('#user_book_request_table').DataTable({
        ajax: {
            type: 'GET',
            url: '../php_script/datatable_server_script.php',
            data: {
                table: 'bookreserve'
            }
        },
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
                    if (value === "hold") {
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
                    if (value === "hold") {
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

    $('#user_handled_book_table').DataTable({
        ajax: {
            type: 'GET',
            url: '../php_script/datatable_server_script.php',
            data: {
                table: 'bookborrowed'
            }
        },
        processing: true, // DO NOT REMOVE
        serverSide: true, // DO NOT REMOVE
        iDisplayLength: 10,
        responsive: true,
    });

    $('#user_book_transaction_table').DataTable({
        ajax: {
            type: 'GET',
            url: '../php_script/datatable_server_script.php',
            data: {
                table: 'booktransaction'
            }
        },
        processing: true, // DO NOT REMOVE
        serverSide: true, // DO NOT REMOVE
        iDisplayLength: 10,
        responsive: true,
    });
});


let logout_btn = document.querySelectorAll("logout-btn");
logout_btn.forEach(function (e) {
    e.addEventListener("click", function () {
        sessionStorage.clear();
    });
})