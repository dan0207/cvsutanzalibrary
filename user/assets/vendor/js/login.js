// Import Javascript Files ////////////////////////////////////////////////////////
import { setupFormValidation, showModal } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////


// Initialize Form ////////////////////////////////////////////////////////
const login_form = document.getElementById('login_form');
// Initialize Form ////////////////////////////////////////////////////////


// Initialize Button ////////////////////////////////////////////////////////
const login_form_btn = document.getElementById('login_form_btn');
const back_login_form_btn = document.getElementById('back_login_form_btn');
// Initialize Button ////////////////////////////////////////////////////////


['login_username', 'login_password'].forEach(id =>
    document.getElementById(id).addEventListener('input', () =>
        document.getElementById('login_feedback').textContent = '')
);


function handle_LoginFormBtn() {
    let login_username = document.getElementById('login_username').value;
    let login_password = document.getElementById('login_password').value;
    checkUserData(login_username, login_password)
        .then(user_scan_valid => {
            if (user_scan_valid) {
                document.getElementById('login_feedback').textContent = '';
                login_form.submit();
            } else {
                document.getElementById('login_feedback').textContent = 'Incorrect Username or Password';
            }
        })
        .catch(error => console.error('Error:', error));
}

async function checkUserData(login_username, login_password) {
    try {
        const response = await fetch('../php_script/check_oldCredentials_script.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                username: login_username,
                password: login_password
            })
        });

        const data = await response.json();
        console.log(data);
        return data.status;
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}





() => {

    const rememberCheckbox = document.getElementById('rememberCheckbox');
    rememberCheckbox.checked = localStorage.getItem('rememberPassword') === 'true';

    if (rememberCheckbox.checked) {
        const savedUsername = localStorage.getItem('savedUsername');
        const savedPassword = localStorage.getItem('savedPassword');

        if (savedUsername && savedPassword) {
            document.getElementById('login_username').value = savedUsername;
            document.getElementById('login_passwword').value = savedPassword;
        }
    }

    rememberCheckbox.addEventListener('change', function () {
        localStorage.setItem('rememberPassword', this.checked);

        if (!this.checked) {
            localStorage.removeItem('savedUsername');
            localStorage.removeItem('savedPassword');
        }
    });

    document.getElementById('login_form_btn').addEventListener('click', function () {
        if (rememberCheckbox.checked) {
            localStorage.setItem('savedUsername', document.getElementById('login_username').value);
            localStorage.setItem('savedPassword', document.getElementById('login_passwword').value);
        }
    });
}


function passwordToggle(password, toggle) {
    if (password.getAttribute('type') === 'password') {
        password.setAttribute('type', 'text');
        toggle.classList.add('fa-eye');
        toggle.classList.remove('fa-eye-slash');
    } else {
        password.setAttribute('type', 'password');
        toggle.classList.add('fa-eye-slash');
        toggle.classList.remove('fa-eye');
    }
}

function handle_BackLoginFormBtn() {
    window.history.back();
}

back_login_form_btn.addEventListener('click', handle_BackLoginFormBtn);
setupFormValidation(login_form.id, login_form_btn.id, handle_LoginFormBtn);
