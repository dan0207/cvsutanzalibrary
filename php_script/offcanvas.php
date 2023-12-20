<div id="right_offcanvas_btn" class="right-offcanvas-btn me-3 z-1">
    <button id="chat_btn" class="chat-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1" onclick="togglechatForm()">Chat</button>
    <button id="feedback_btn" class="feedback-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1" onclick="toggleFeedbackForm()">Feedback</button>
</div>

<div id="right_offcanvas" class="right-offcanvas">
    <!-- chat -->
    <?php include '../../php_script/chat_script.php';
    ?>
    <!-- chat -->

    <!-- Feedback -->
    <?php include '../../php_script/feedback_script.php';
    ?>
    <!-- Feedback -->
</div>