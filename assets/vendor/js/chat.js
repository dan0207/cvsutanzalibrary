

function togglechatForm() {
    var chat = document.getElementById('chat');
    var feedback_btn = document.getElementById('feedback_btn');
    var right_offcanvas_btn = document.getElementById('right_offcanvas_btn');
    var isOpen = chat.style.right === '0px';

    if (isOpen) {
        chat.style.right = '-500px';
        right_offcanvas_btn.style.right = '0px';
        setTimeout(function () { feedback_btn.style.visibility = "visible"; }, 300);
        console.log("Open");
    } else {
        chat.style.right = '0px';
        right_offcanvas_btn.style.right = '500px';
        feedback_btn.style.visibility = "hidden";
        console.log("Close");
    }
}


const chat_emoji_btn = document.querySelector('#chat_emoji_btn');
const chat_messege_input = document.querySelector('#chat_messege_input');
const chatContainer = document.querySelector('#chat');

const picker = new EmojiButton({
    position: 'bottom',
    rootElement: chatContainer, 
});

chat_emoji_btn.addEventListener('click', () => {
    picker.togglePicker(chat_emoji_btn);

});

picker.on('emoji', emoji => {
    chat_messege_input.value += emoji;
});