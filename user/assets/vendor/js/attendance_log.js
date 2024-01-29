// Import Javascript Files ////////////////////////////////////////////////////////
import { } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

$(document).ready(function () {
    $('#user_attendance_table').DataTable({
        ajax: {
            type: 'GET',
            url: '../php_script/datatable_server_script.php',
            data: {
                table: 'attendance'
            }
        },
        processing: true, // DO NOT REMOVE
        serverSide: true, // DO NOT REMOVE
        responsive: true,
        iDisplayLength: 5,
        order: [[0, "desc"]],
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'print'],
        columnDefs: [
            {
                targets: -1,
                render: function (data, type, row) {
                    if (data === 'IN') {
                        return "<h4 class='text-primary'>" + data + "</h4>";
                    } else {
                        return "<h4 class='text-secondary'>" + data + "</h4>";
                    }
                }
            },
            {
                targets: 0,
                render: function (data, type, row) {
                    var time = new Date('1970-01-01T' + data);
                    return time.toLocaleTimeString("en-US", { hour12: true });
                }
            },
        ]
    });

    var buttonContainer = $('.dataTables_wrapper .dt-buttons');
    var buttonText = $('<span class="fw-bold me-3">Download: </span>');
    buttonContainer.prepend(buttonText);
});