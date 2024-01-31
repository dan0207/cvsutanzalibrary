// Import Javascript Files ////////////////////////////////////////////////////////
import { getBase64ImageSync, getformatDate } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

$(document).ready(function () {
    let curDate = getformatDate(new Date());
    let headerImg;
    getBase64ImageSync('../assets/img/fileheader.png', function (base64) { headerImg = (base64); });
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
        paging: false,
        bInfo: false,
        scrollY: $('#attendance_log_table').height() * 0.8,
        deferRender: true,
        scroller: true,
        // iDisplayLength: 10,
        order: [[0, "desc"]],
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: 'Library Attendance ' + curDate,
            text: 'Excel',
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // $('c[r=A1] t', sheet).text( 'Cavite State University Tanza Campus' );
                $('c[r=A1]', sheet).attr( 's', '51');
                // $('row c[r^="A"]', sheet).each(function () {
                //     // Get the value
                //     // if ($('is t', this).text() == 'New York') {
                //         $(this).attr('s', '20');
                //     // }
                // });
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
            text: '<span class="fw-semibold ms-0">or </span> Print',
        }
        ],
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
    var buttonText = $('<span class="fw-semibold me-3">Download as: </span>');
    buttonContainer.prepend(buttonText);
});