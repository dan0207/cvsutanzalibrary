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


function handle_LoginFormBtn(){
    login_form.submit();
}

function handle_BackLoginFormBtn(){
    window.history.back();
}

back_login_form_btn.addEventListener('click', handle_BackLoginFormBtn);
setupFormValidation(login_form.id, login_form_btn.id, handle_LoginFormBtn);
