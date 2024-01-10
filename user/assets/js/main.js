AOS.init();

// Status Checker Authentication
// setInterval(updateSession, 3000)

export function updateSession() {
    return fetch('../php_script/update_session.php')
        .then(response => response.text())
        .then(data => {
            sessionStorage.setItem('sessionData', JSON.stringify(JSON.parse(data)));
            // console.log(JSON.stringify(JSON.parse(data)));
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

export function generateQRCode(qr_text, qr_size) {
    var googleChartApiUrl = "https://chart.googleapis.com/chart?chs=" + qr_size + "x" + qr_size + "&cht=qr&chl=" + qr_text + "&choe=UTF-8";
    return googleChartApiUrl;
}

// export function generateBarCode(barcode_container, barcode_text, barcode_size, barcode_fontSize) {
//     JsBarcode(barcode_container.id, barcode_text, {
//         format: "EAN13",
//         displayValue: true,
//         fontSize: barcode_fontSize,
//         height: barcode_size
//     });
// }

export function generateBarCode(barcode_text, barcode_img, barcode_size) {
    let text = document.getElementById("text").value;
    JsBarcode("#barcode", text);
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

export function getFormatCourseSection(course, year, section) {
    const yearToNumber = {
        'FISRT': 1,
        'SECOND': 2,
        'THIRD': 3,
        'FOURTH': 4
    };

    const sectionToNumber = {
        'ONE': 1,
        'TWO': 2,
        'THREE': 3,
        'FOUR': 4
    };

    return course + ' ' + yearToNumber[year] + '-' + sectionToNumber[section];
}

export function getformatDate(date) {
    let formattedDate = date.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    });
    return formattedDate;
}

activateTopSearch();