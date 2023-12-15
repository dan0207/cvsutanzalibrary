

function toggleChatbotForm() {
    var chatbot = document.getElementById('chatbot');
    var feedback_btn = document.getElementById('feedback_btn');
    var right_offcanvas_btn = document.getElementById('right_offcanvas_btn');
    var isOpen = chatbot.style.right === '0px';

    if (isOpen) {
        chatbot.style.right = '-500px';
        right_offcanvas_btn.style.right = '0px';
        setTimeout(function () { feedback_btn.style.visibility = "visible"; }, 300);
        console.log("Open");
    } else {
        chatbot.style.right = '0px';
        right_offcanvas_btn.style.right = '500px';
        feedback_btn.style.visibility = "hidden";
        console.log("Close");
    }
}


const chatbot_emoji_btn = document.querySelector('#chatbot_emoji_btn');
const chatbot_messege_input = document.querySelector('#chatbot_messege_input');
const chatbotContainer = document.querySelector('#chatbot');

const picker = new EmojiButton({
    position: 'bottom',
    rootElement: chatbotContainer, 
});

chatbot_emoji_btn.addEventListener('click', () => {
    picker.togglePicker(chatbot_emoji_btn);

});

picker.on('emoji', emoji => {
    chatbot_messege_input.value += emoji;
});