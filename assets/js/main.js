AOS.init();

// Status Checker Authentication
// setInterval(updateSession, 3000)

export function updateSession() {
    return fetch('../../php_script/update_session.php')
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

export function generateQRCode(qr_text, qr_img, qr_size) {
    var googleChartApiUrl = "https://chart.googleapis.com/chart?chs=" + qr_size + "x" + qr_size + "&cht=qr&chl=" + qr_text + "&choe=UTF-8";
    document.getElementById(qr_img).src = googleChartApiUrl;
}

export function generateBarCode(barcode_text, barcode_img, barcode_size) {
    var googleChartApiUrl = "https://chart.googleapis.com/chart?chs=" + barcode_size + "x" + barcode_size + "&cht=code128&chl=" + barcode_text + "&choe=UTF-8";
    document.getElementById(barcode_img).src = googleChartApiUrl;
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