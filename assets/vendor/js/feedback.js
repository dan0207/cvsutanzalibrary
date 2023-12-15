
function toggleFeedbackForm() {
    var feedback = document.getElementById('feedback');
    var chatbot_btn = document.getElementById('chatbot_btn');
    var right_offcanvas_btn = document.getElementById('right_offcanvas_btn');
    var isOpen = feedback.style.right === '0px';

    if (isOpen) {
        feedback.style.right = '-500px';
        right_offcanvas_btn.style.right = '0px';
        setTimeout(function () { chatbot_btn.style.visibility = "visible"; }, 350);
        console.log("Open");
    } else {
        feedback.style.right = '0px';
        right_offcanvas_btn.style.right = '500px';
        chatbot_btn.style.visibility = "hidden";
        console.log("Close");
    }
}