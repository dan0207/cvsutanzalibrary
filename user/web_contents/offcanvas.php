<div id="offcanvas_btn" class="offcanvas-btn me-3 z-1 d-none">
    <button id="chat_btn" class="chat-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1" onclick="togglechatForm()">Chat</button>
    <button id="feedback_btn" class="feedback-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1" onclick="toggleFeedbackForm()">Feedback</button>
</div>

<div id="offcanvas" class="offcanvas">
    <!-- chat -->
    <?php include '../web_contents/chat_script.php';
    ?>
    <!-- chat -->

    <!-- Feedback -->
    <?php include '../web_contents/feedback_script.php';
    ?>
    <!-- Feedback -->
</div>