// Import Javascript Files ////////////////////////////////////////////////////////
import { getBase64ImageSync } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

$(document).ready(function () {
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
            title: 'Hello',
            text: 'Excel',
            titleAttr: 'Export Excel',
            "oSelectorOpts": { filter: 'applied', order: 'current' },
            exportOptions: {
                modifier: {
                    page: 'all'
                },
                format: {
                    header: function (data, columnIdx) {
                        if (columnIdx == 1) {
                            return 'column_1_header';
                        }
                        else {
                            return data;
                        }
                    }
                }
            }
        },
        {
            extend: 'pdfHtml5',
            title: 'Library Entry ',
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