
// Import Javascript Files ////////////////////////////////////////////////////////
import { setupFormValidation, showModal } from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////

const feedback = document.getElementById('feedback');
const feedback_btn = document.getElementById('feedback_btn');
const feedback_form = document.getElementById('feedback_form');
const feedback_submit = document.getElementById('feedback_submit');
const chat_btn = document.getElementById('chat_btn');
const offcanvas_btn = document.getElementById('offcanvas_btn');

const feedback_ratings = document.getElementById('feedback_ratings');
const rating = document.getElementsByName("rating");


function toggleFeedbackForm() {
    var isOpen = feedback.style.right === '0px';

    if (isOpen) {
        feedback.style.right = '-400px';
        offcanvas_btn.style.right = '0px';
        setTimeout(function () { chat_btn.style.visibility = "visible"; }, 350);
        console.log(feedback.style.right);
        console.log("Open");
    } else {
        feedback.style.right = '0px';
        console.log(offcanvas_btn.style.right);
        offcanvas_btn.style.right = '400px';
        chat_btn.style.visibility = "hidden";
        console.log("Close");
    }
}

function handle_feedbackSubmit() {
    feedback_form.submit();
}

function validRating() {
    const selectedRating = document.querySelector('input[name="rating"]:checked');

    if (selectedRating.value > 0) {
        feedback_ratings.classList.remove('border-secondary');
        feedback_ratings.classList.add('border-primary');
        console.log(selectedRating.value);
    }else{
        feedback_ratings.classList.remove('border-primary');
        feedback_ratings.classList.add('border-secondary');
        rating.setCustomValidity('Invalid');
    }
}

rating.forEach(function (radioButton) {
    radioButton.addEventListener("change", validRating);
});

feedback_btn.addEventListener("click", toggleFeedbackForm);
// feedback_submit.addEventListener("click", handle_feedbackSubmit);



setupFormValidation(feedback_form.id, feedback_submit.id, handle_feedbackSubmit);

