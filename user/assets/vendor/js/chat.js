
const chat = document.getElementById('chat');
const chat_btn = document.getElementById('chat_btn');
const feedback_btn = document.getElementById('feedback_btn');
const right_offcanvas_btn = document.getElementById('offcanvas_btn');
const chat_emoji_btn = document.querySelector('#chat_emoji_btn');
const chat_messege_input = document.querySelector('#chat_messege_input');
const chatContainer = document.querySelector('#chat');




function togglechatForm() {
    var isOpen = chat.style.right === '0px';

    if (isOpen) {
        chat.style.right = '-350px';
        right_offcanvas_btn.style.right = '0px';
        setTimeout(function () { feedback_btn.style.visibility = "visible"; }, 300);
        console.log("Close");
    } else {
        chat.style.right = '0px';
        right_offcanvas_btn.style.right = '350px';
        feedback_btn.style.visibility = "hidden";
        console.log("Open");
    }

    // document.addEventListener('click', function (event) {

    //     // Check if the clicked element is outside the div
    //     if (!chat.contains(event.target)) {
    //         // Perform your specific task here
    //         alert('Clicked outside the div! Performing a specific task.');
    //     }
    // });
}

// const picker = new EmojiButton({
//     position: 'bottom',
//     rootElement: chatContainer,
// });

// chat_emoji_btn.addEventListener('click', () => {
//     picker.togglePicker(chat_emoji_btn);
// });

// picker.on('emoji', emoji => {
//     chat_messege_input.value += emoji;
// });



chat_btn.addEventListener("click", togglechatForm);