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
        paging: false,
        scrollY: $('.attendance-container').height(),
        deferRender: true,
        scroller: true,
        order: [[0, "desc"]],
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
});


const displayTime = document.querySelector(".display-time");
function showTime() {
    let time = new Date();
    displayTime.innerText = time.toLocaleTimeString("en-US", { hour12: true });
    setTimeout(showTime, 1000);
}

showTime();

function updateDate() {
    let today = new Date();

    let dayName = today.getDay(),
        dayNum = today.getDate(),
        month = today.getMonth(),
        year = today.getFullYear();

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    const dayWeek = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
    ];
    const IDCollection = ["day", "daynum", "month", "year"];
    const val = [dayWeek[dayName], dayNum, months[month], year];
    for (let i = 0; i < IDCollection.length; i++) {
        document.getElementById(IDCollection[i]).firstChild.nodeValue = val[i];
    }
}

updateDate();

$('#qrForm').submit(function (event) {
    event.preventDefault();
});


setTimeout(function () {
    $(".before-scanning, .after-scanning").toggleClass("d-none");
}, 5000);

$(".qr-scanner-input").change(function (e) {
    var qr_scanner_input = this;
    let qr_scanner_input_value = $(qr_scanner_input).val();

    const toastLiveExample = document.getElementById('liveToast')
    const InvalidQRcodeTaost = bootstrap.Toast.getOrCreateInstance(toastLiveExample, { delay: 2000 })

    checkUserData(qr_scanner_input_value)
        .then(user_scan_valid => {
            if (user_scan_valid) {
                $('#qrForm').off('submit').submit();
            } else {
                InvalidQRcodeTaost.show()
            }
            $(qr_scanner_input).focus().val('');
        })
        .catch(error => console.error('Error:', error));
});

function checkUserData(qr_scanner_input_value) {
    return fetch('../php_script/db_getAllData.php')
        .then(response => response.json())
        .then(data => {
            let user_scan = Object.values(data.users).find(user => user.user_token === qr_scanner_input_value);
            return user_scan;
        })
        .catch(error => {
            console.error('Error:', error);
            throw error;
        });
}

