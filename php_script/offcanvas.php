<div id="right_offcanvas_btn" class="right-offcanvas-btn me-3 z-3">
    <button id="chatbot_btn" class="chatbot-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1" onclick="toggleChatbotForm()">Chat</button>
    <button id="feedback_btn" class="feedback-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1" onclick="toggleFeedbackForm()">Feedback</button>
</div>

<div id="right_offcanvas" class="right-offcanvas">
    <!-- Chatbot -->
    <?php include '../../php_script/chatbot_script.php';
    ?>
    <!-- Chatbot -->

    <!-- Feedback -->
    <?php include '../../php_script/feedback_script.php';
    ?>
    <!-- Feedback -->
</div>