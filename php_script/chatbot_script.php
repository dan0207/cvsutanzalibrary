<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>

<div id="chatbot" class="chatbot bg-background h-70 border border-primary border-5 border-end-0 rounded-start-5 z-2 px-3 my-5">
    <div class="chatbot-header bg-background text-center rounded-start-5 h-20 w-100 d-flex justify-content-center align-items-center">
        <h4 class="border m-0 px-5 h-60 w-100 d-flex justify-content-center align-items-center rounded-pill bg-surface shadow bg-body-tertiary">LIBRARY ASSISTANCE</h4>
    </div>
    <div class="chatbot-body h-80 px-3 pb-3">
        <div class="chatbox border border-2 rounded-5 h-100 w-100 shadow bg-body-tertiary px-4 py-3">
            <div class="chats border my-1 rounded-4 bg-surface h-85 p-4 overflow-auto">
                <div class="sender-chat row">
                    <div class="col-2 d-flex">
                        <img id="sender_avartar" class="border border-surface mb-2 mt-auto border-2 rounded-circle shadow bg-body-tertiary" src="../../assets/img/librarian-icon.png" alt="" width="40" height="40">
                    </div>
                    <div class="col-10">
                        <div class="sender-name fs-7">
                            Librarian ALI
                        </div>
                        <div class="sender-message border rounded-4 p-3 fs-8 shadow-sm bg-body-surface">
                            Hi there! I’m ALI Augmented Library Interface, the after-hours A.I. chatbot for Cavite State University Tanza Campus Library. What can I help you with?
                        </div>
                    </div>
                </div>
                <div class="chatbot-faqs text-center px-5">
                    <h6 class="fs-7 pt-3 pb-2">Tap to send</h6>
                    <button class="btn btn-light border py-0 my-1">Ask a Librarian</button>
                    <button class="btn btn-light border py-0 my-1">How to Request Book</button>
                    <button class="btn btn-light border py-0 my-1">Library FAQs</button>
                </div>
            </div>
            <div class="input-group h-15 d-flex justify-content-center align-items-center">
                <input id="chatbot_messege_input" type="text" class="form-control rounded-start-pill px-3 h-80" placeholder="Message">
                <button id="chatbot_emoji_btn" class="input-group-text h-80 rounded-end-pill" id="basic-addon1"><i class="fa-regular fa-face-smile fa-xl"></i></button>
                <button class="btn rounded-circle h-80 mx-1" type="button" id="button-addon2"><i class="fa-regular fa-paper-plane fa-flip-horizontal fa-2xl"></i></button>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/vendor/js/chatbot.js" type="text/javascript"></script>