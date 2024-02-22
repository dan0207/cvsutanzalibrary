// Import Javascript Files ////////////////////////////////////////////////////////
import { confirmationModal } from '../../js/main.js';
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
        order: [[0, "desc"]],
        columnDefs: [
            {
                targets: 1,
                render: function (data, type, row) {
                    let value = row[1];
                    if (value == 'Checking') {
                        return "<h7 class='fw-semibold text-warning m-0'> " + data + " </h7>";
                    } else if (value == 'Return Day') {
                        return "<h7 class='fw-semibold text-primary m-0'> " + data + " </h7>";
                    } else if (value == 'Overdue') {
                        return "<h7 class='fw-semibold text-secondary m-0'>" + data + "</h7>";
                    } else {
                        return "<h7 class='fw-semibold text-primary m-0'>" + data + "</h7>";
                    }
                }
            },
            {
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
        order: [[0, "desc"]],
        columnDefs: [
            {
                targets: 1,
                render: function (data, type, row) {
                    let value = row[1];
                    switch (value) {
                        case 'Returned':
                            return "<h7 class='fw-semibold text-primary m-0'> " + data + " </h7>";
                        case 'Missing':
                            return "<h7 class='fw-semibold text-warning m-0'> " + data + " </h7>";
                        default:
                            return "<h7 class='fw-semibold text-secondary m-0'> " + data + " </h7>";
                    }
                }
            },
            {
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
});


const profileDetailsForm = document.querySelector(".profile-details");

const editProfileBtn = document.getElementById("edit_profile_btn");
const saveProfileBtn = document.getElementById("save_profile_btn");
const cancelProfileBtn = document.getElementById("cancel_profile_btn");
const saveProfileBtnProcessing = document.getElementById("save_profile_btn_processing");

const profileInputs = document.querySelectorAll(".update-profile");
const showNewPasswordToggle = document.getElementById("show_new_password_toggle");
const showOldPasswordToggle = document.getElementById("show_old_password_toggle");

const profileUsernameInput = document.getElementById("profile_username_input");
const profileNewPasswordInput = document.getElementById("profile_new_password_input");
const profileOldPasswordInput = document.getElementById("profile_old_password_input");

const updateProfileUsernameFeedback = document.getElementById("updateProfile_username_feedback");
const updateProfilePasswordOldFeedback = document.getElementById("updateProfile_password_old_feedback");
const updateProfilePasswordNewFeedback = document.getElementById("updateProfile_password_new_feedback");

function toggleInputs(isEditing) {
    profileInputs.forEach(element => {
        element.disabled = isEditing;
        element.classList.toggle("disabled", isEditing);
    });
}

editProfileBtn.addEventListener('click', async function () {
    toggleInputs(false);
    [editProfileBtn, saveProfileBtn, cancelProfileBtn].forEach(btn => btn.classList.toggle("d-none"));
});

cancelProfileBtn.addEventListener('click', async function () {
    toggleInputs(true);
    [editProfileBtn, saveProfileBtn, cancelProfileBtn].forEach(btn => btn.classList.toggle("d-none"));
    profileDetailsForm.reset();
});

saveProfileBtn.addEventListener('click', async function () {
    toggleInputs(false);
    const usernameValue = profileUsernameInput.value;
    const oldPasswordValue = profileOldPasswordInput.value;
    let verified = true;

    if (!(profileOldPasswordInput.value === '' && profileNewPasswordInput.value === '' && profileUsernameInput.value === '')) {

        try {
            const response = await fetch('../php_script/check_oldCredentials_script.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    username: usernameValue,
                    old_password: oldPasswordValue,
                }),
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();


            if (!data.isVerifiedUsername) {
                profileUsernameInput.style.boxShadow = "0 0 1px 1px #ff0000";
                updateProfileUsernameFeedback.textContent = "Incorrect Username";
                verified = false;
            } else {
                profileUsernameInput.style.boxShadow = "0 0 1px 1px #007205";
                updateProfileUsernameFeedback.textContent = "";
            }
            if (!data.isVerifiedPassword) {
                profileOldPasswordInput.style.boxShadow = "0 0 1px 1px #ff0000";
                updateProfilePasswordOldFeedback.textContent = "Incorrect Password";
                verified = false;
            } else {
                profileOldPasswordInput.style.boxShadow = "0 0 1px 1px #007205";
                updateProfilePasswordOldFeedback.textContent = "";
            }
            if (checkPasswordStrength(profileNewPasswordInput, updateProfilePasswordNewFeedback)) {
                profileNewPasswordInput.style.boxShadow = "0 0 1px 1px #ff0000";
                verified = false;
            } else {
                profileNewPasswordInput.style.boxShadow = "0 0 1px 1px #007205";
            }

        } catch (error) {
            console.error(error);
            alert("Error checking old password. Please try again.");
        }
    }

    if (verified) {
        [saveProfileBtn, cancelProfileBtn, saveProfileBtnProcessing].forEach(btn => btn.classList.toggle("d-none"));
        setTimeout(() => {
            profileDetailsForm.submit();
        }, 2000);
    }
});


function checkPasswordStrength(password, label) {
    const result = zxcvbn(password.value);

    switch (result.score) {
        case 0:
        case 1:
        case 2:
            label.textContent = 'Weak Password!';
            label.classList.add('text-secondary');
            label.classList.remove('text-info');
            label.classList.remove('text-primary');
            return true;
        case 3:
            label.textContent = 'Moderate Password!';
            label.classList.add('text-info');
            label.classList.remove('text-secondary');
            label.classList.remove('text-primary');
            return true;
        case 4:
            label.textContent = 'Strong Password';
            label.classList.add('text-primary');
            label.classList.remove('text-secondary');
            label.classList.remove('text-info');
            return false;
    }
}


showNewPasswordToggle.addEventListener('click', () => passwordToggle(profileNewPasswordInput, showNewPasswordToggle));
showOldPasswordToggle.addEventListener('click', () => passwordToggle(profileOldPasswordInput, showOldPasswordToggle));

function passwordToggle(password, toggle) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    toggle.classList.toggle('fa-eye', type === 'text');
    toggle.classList.toggle('fa-eye-slash', type === 'password');
}


$(function () {
    $('#user_book_request_table tbody').on('click', '[id*=cancel_btn]', function () {
        let clickedRow = $(this).closest('tr');
        let transactionID = clickedRow.find('td:eq(0)').text();
        confirmationModal('Are you sure want to delete this request? \n Transaction ID: ' + transactionID, 'Delete', function () {
            fetch('../php_script/db_delete_row_script.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'transactionID=' + transactionID,
            })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    if (data) {
                        const deletedLiveToast = document.getElementById('deletedLiveToast');
                        const deletedRequestToast = bootstrap.Toast.getOrCreateInstance(deletedLiveToast);
                        deletedRequestToast.show();
                        setInterval(function (e) {
                            window.location.reload();
                        }, 1000);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
});


let logout_btn = document.querySelectorAll(".logout-btn");
logout_btn.forEach(function (e) {
    e.addEventListener("click", function () {
        sessionStorage.clear();
        confirmationModal('Are you sure you want to logout?', 'Logout', function confirmationModal_function(e) {
            location.href = '../php_script/logout_script.php';
        });
    });
})