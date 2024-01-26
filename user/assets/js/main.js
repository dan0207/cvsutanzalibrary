AOS.init();


export function updateSession() {
    return fetch('../php_script/update_session.php')
        .then(response => response.text())
        .then(data => {
            sessionStorage.setItem('sessionData', JSON.stringify(JSON.parse(data)) || {});
        })
        .catch(error => {
            console.error('Error:', error);
            throw error;
        });
}

export function showModal(show_id, hide_id) {
    if (show_id) {
        $('#' + show_id).modal('show');
    }
    if (hide_id) {
        $('#' + hide_id).modal('hide');
    }
}

export function setupFormValidation(form_id, form_btn_id, handleValidFunction) {
    'use strict';

    const form = document.getElementById(form_id);

    const validateButton = document.getElementById(form_btn_id);

    if (form && validateButton) {
        // console.log(form.id);
        validateButton.addEventListener('click', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                console.log("Invalid Input");
            } else {
                handleValidFunction();
            }
            form.classList.add('was-validated');
        });
    }
}

export function activateTopSearch() {
    function isIntersect(div1, div2) {
        if (div2 === '') return true;
        const rect1 = div1.getBoundingClientRect();
        const rect2 = div2.getBoundingClientRect();
        return rect1.bottom >= rect2.bottom;
    }

    const navbar = document.getElementById('navbar');
    const header_book_search_top = document.getElementById('header_book_search_top');
    const header_book_search_collapse_icon = document.getElementById('header_book_search_collapse_icon');
    const header_book_search_top_collapse = document.getElementById('header_book_search_top_collapse');


    const opac_search_input = document.getElementById('opac_search_input') ?? '';

    window.addEventListener('scroll', function () {
        if (isIntersect(navbar, opac_search_input)) {
            header_book_search_top.style.visibility = 'visible';
            header_book_search_collapse_icon.style.visibility = 'visible';
            header_book_search_top_collapse.style.visibility = 'visible';
        } else {
            header_book_search_top.style.visibility = 'hidden';
            header_book_search_collapse_icon.style.visibility = 'hidden';
            header_book_search_top_collapse.style.visibility = 'hidden';
        }
    });
}

// sendEmail('abanciadanilo0207@gmail.com', 'iamerikanavarro09@gmail.com', 'Try', 'Testing')

// export function sendEmail(sender_server, receiver, subject, body, attachment) {
export function sendEmail(sender_server, receiver, subject, body) {
    let smtp_secureToken = "d4a41c9a-511b-4299-af7d-b30984ce71d4";

    Email.send({
        SecureToken: smtp_secureToken,
        To: receiver,
        From: sender_server,
        Subject: subject,
        Body: body,
        // Attachments: attachment,
        // Attachments: [
        //     {
        //         name: attachmentName,
        //         path: attachmentPath
        //     }]
    }).then(
        message => alert(message)
    );
}

export async function selectBookReservation() {
    let sessionBookRequest = JSON.parse(sessionStorage.getItem('sessionBookRequest')) || {};
    let reservedDatesCount = {};
    let unavailableDates = [];
    let dates = [];
    let book_copy;

    try {
        const response = await fetch('../php_script/db_getAllData.php');
        const data = await response.json();

        data.books.forEach(function (e) {
            if (e.book_access_number == sessionBookRequest.book_accession_number) {
                book_copy = e.book_copy;
            }
        });

        data.bookreserve.forEach(function (e) {
            if (e.bookAccessNo == sessionBookRequest.book_accession_number) {
                let pickupDate = new Date(e.pickupDate);
                let returnDate = new Date(e.returnDate);
                for (let date = new Date(pickupDate); date <= returnDate; date.setDate(date.getDate() + 1)) {
                    dates.push(new Date(date));
                    reservedDatesCount[date] = (reservedDatesCount[date] || 0) + 1;
                }
            }
        });

        Object.entries(reservedDatesCount).forEach(([date, count]) => {
            if (book_copy - count <= 1) {
                unavailableDates.push(new Date(date));
            }
        });

    } catch (error) {
        console.error('Error fetching data:', error);
    }

    borrowPeriod(unavailableDates);
}



function borrowPeriod(reservedDates) {
    let pickup_date, return_date;
    const currentDate = new Date();

    $('#pickup_date').datepicker('destroy');
    $('#return_date').datepicker('destroy');
    $('#borrow_period').datepicker('destroy');

    $('#pickup_date').datepicker({
        autoclose: false,
        startDate: '+2d',
        todayHighlight: true,
        keepEmptyValues: true,
        daysOfWeekDisabled: '0,5,6', // Disable Not Open Hours
        maxViewMode: 0,
        templates: {
            leftArrow: '<i class="fa-solid fa-caret-left fa-xl"></i>',
            rightArrow: '<i class="fa-solid fa-caret-right fa-xl"></i>',
        },
        beforeShowDay: function (date) {
            if (reservedDates !== undefined) {
                for (let i = 0; i < reservedDates.length; i++) {
                    if (date.getDate() !== currentDate.getDate() && date.getDate() === new Date(reservedDates[i]).getDate() && date.getMonth() === new Date(reservedDates[i]).getMonth() && date.getYear() === new Date(reservedDates[i]).getYear()) {
                        return {
                            classes: 'bg-secondary text-onSecondary opacity-25 rounded-0 disabled',
                            tooltip: 'Reserved Date',
                        };
                    }
                }
            }
        },
    }).on('changeDate', function (e) {
        pickup_date = $('#pickup_date').datepicker('getDate');

        var maxReturnDate = new Date(e.date.getTime() + 7 * 24 * 60 * 60 * 1000);
        $('#return_date').datepicker('setStartDate', e.date);
        $('#return_date').datepicker('setEndDate', maxReturnDate);

        $('#return_date_container').css("opacity", 1);
        $('#return_date_label').css("opacity", 1);

        $('#pickup_date_label').text(getformatDate(pickup_date));
        $('#pickup_date_input').val(pickup_date);
    });


    $('#return_date').datepicker({
        autoclose: false,
        startDate: '+1d',
        todayHighlight: true,
        keepEmptyValues: true,
        daysOfWeekDisabled: '0,5,6', // Disable Not Open Hours
        maxViewMode: 0,
        templates: {
            leftArrow: '<i class="fa-solid fa-caret-left fa-xl"></i>',
            rightArrow: '<i class="fa-solid fa-caret-right fa-xl"></i>',
        },
        beforeShowDay: function (date) {
            if (reservedDates !== undefined) {
                for (let i = 0; i < reservedDates.length; i++) {
                    if (date.getDate() === reservedDates[i].getDate() && date.getMonth() === reservedDates[i].getMonth() && date.getYear() === reservedDates[i].getYear()) {
                        return {
                            classes: 'bg-secondary text-onSecondary opacity-25 rounded-0 disabled',
                            tooltip: 'Reserved Date',
                        };
                    }
                }
            }

            if (pickup_date !== undefined) {
                for (let i = 0; i < reservedDates.length; i++) {
                    if (pickup_date <= reservedDates[i] && date >= reservedDates[i]) {
                        return {
                            classes: 'disabled',
                            tooltip: 'Unavailable',
                        };
                    }
                }
            } else {
                return false;
            }

        },
    }).on('changeDate', function (e) {
        return_date = $('#return_date').datepicker('getDate');
        $('#return_date_label').text(getformatDate(return_date));
        $('#return_date_input').val(return_date);
    });

    $('#borrow_period').datepicker({
        inputs: $('.borrow-date-range'),
    });
}

activateTopSearch();