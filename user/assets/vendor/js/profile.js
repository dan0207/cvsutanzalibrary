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
        order: [[0, "desc"]],
        // dom: 'Bfrtip',
        // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        columnDefs: [
            {
                targets: -1,
                data: null,
                render: function (data, type, row) {
                    let value = row[1];
                    if (value === "hold") {
                        return "<button id='cancel_btn' class='btn btn-outline-secondary fs-9 py-1'>CANCEL</button>";
                    } else {
                        return "<button id='cancel_btn' class='btn btn-outline-secondary fs-9 py-1 disabled'>CANCEL</button>";
                    }
                }
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    let value = row[1];
                    if (value === "hold") {
                        return "<h7 class='fw-semibold m-0 fst-italic text-warning'>" + data + "</h7>";
                    } else {
                        return "<h7 class='fw-semibold m-0 fst-italic text-primary'>" + data + "</h7>";
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

    $('#user_borrowed_book_table').DataTable({
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
        columnDefs: [
            {
                targets: 1,
                render: function (data, type, row) {
                    let value = row[1];
                    if (value == 0) {
                        return "<h7 class='fw-semibold text-primary m-0'>Return Day</h7>";
                    } else if (value < 0) {
                        return "<h7 class='fw-semibold text-secondary m-0'>OVERDUE</h7>";
                    } else {
                        let d = data > 1 ? 's' : '';
                        return "<h7 class='fw-semibold text-primary m-0'>" + data + " day" + d + " left</h7>";
                    }
                }
            }, {
                targets: 2,
                render: function (data, type, row) {
                    let value = row[2];
                    if (value > 0) {
                        return "<h5 class='text-secondary m-0'>₱ " + data + "</h5>";
                    } else {
                        return "<h5 class='text-primary m-0'>₱ 0</h5>"
                    }
                }
            },
        ]
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