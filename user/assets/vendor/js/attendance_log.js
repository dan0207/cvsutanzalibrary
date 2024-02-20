// Import Javascript Files ////////////////////////////////////////////////////////
import { getBase64ImageSync, getformatDate, mask } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

$(document).ready(function () {
    let curDate = getformatDate(new Date());
    let headerImg;
    getBase64ImageSync('../assets/img/fileheader.png', function (base64) { headerImg = (base64); });

    // Initialize DataTable
    let userAttendanceLogTable = $('#user_attendance_log_table').DataTable({
        ajax: {
            type: 'GET',
            url: '../php_script/datatable_server_script.php',
            data: {
                table: 'attendance_log'
            }
        },
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        bInfo: false,
        scrollY: $('#attendance_log_table').height() * 0.8,
        deferRender: true,
        scroller: true,
        order: [[5, "desc"]],
        dom: 'Bfrtip',

        initComplete: function () {
            this.api().columns().every(function (i) {
                let column = this;
                let select = $('<select class="form-control py-1444444444 mx-auto w-70"><option value="">All</option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        let val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val).draw();
                    });
                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });
            });
        },

        buttons: [{
            extend: 'excelHtml5',
            title: 'Library Attendance ' + curDate,
            text: 'Excel',
            customize: function (xlsx) {
                let sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('c[r=A1]', sheet).attr('s', '51');
            }
        },
        {
            extend: 'pdfHtml5',
            title: 'Library Attendance ' + curDate,
            download: 'open',
            customize: function (doc) {
                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');

                doc.content[1].table.body.forEach(function (row, rowIndex) {
                    row.forEach(function (cell, cellIndex) {
                        cell.alignment = 'center';
                        cell.verticalAlignment = 'middle';
                    });
                });

                doc.content.splice(0, 0, {
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    image: headerImg,
                    width: 450,
                });
            },
        },
        {
            extend: 'print',
            text: 'Print',
        }
        ],
        columnDefs: [
            {
                targets: -1,
                render: function (data, type, row) {
                    return "<h4 class='text-secondary'>" + data + "</h4>";
                }
            },
            {
                targets: -2,
                render: function (data, type, row) {
                    return "<h4 class='text-primary'>" + data + "</h4>";
                }
            },
        ]
    });

    // Add a label for download buttons
    let buttonContainer = $('.dataTables_wrapper .dt-buttons');
    let buttonText = $('<span class="fw-semibold me-3">Download as: </span>');
    buttonContainer.prepend(buttonText);
});

