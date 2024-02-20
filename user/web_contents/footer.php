<button id="btn_back_to_top" class="btn-back-to-top btn btn-highlight btn-floating rounded-circle" type="button" style="visibility: hidden;">
    <i class="fas fa-arrow-up"></i>
</button>

<div id="offcanvas_btn" class="me-3 z-1 d-none d-md-block">
    <button id="chat_btn" class="chat-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1 fs-7 fs-lg-6">Chat</button>
    <button id="feedback_btn" class="feedback-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1 fs-7 fs-lg-6">Feedback</button>
</div>

<!-- <div id="offcanvas_btn_icon" class="offcanvas-btn-icon z-1">
    <button id="chat_btn_icon" class="chat-button-icon btn btn-primary rounded-circle" type="button">
        <i class="fa-solid fa-list-check"></i>
    </button>
    <button id="chat_btn_icon" class="chat-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1 fs-7 fs-lg-6" onclick="togglechatForm()">Chat</button>
        <button id="feedback_btn_icon" class="feedback-button btn btn-primary rounded-top-3 border border-2 border-bottom-0 border-onPrimary mx-1 fs-7 fs-lg-6" onclick="toggleFeedbackForm()">Feedback</button>
</div> -->

<footer class="opac_footer bg-primary fixed-bottom">
    <div class="text-onPrimary text-center text-md-end px-1 fs-7 fs-md-6">
        <i class="fa-solid fa-chart-line"></i>
        27873 total views , 24 views today
    </div>
</footer>

<!-- Offcanvas -->
<?php include '../web_contents/offcanvas.php'; ?>
<!-- Offcanvas -->

<!-- Modals -->
<?php include '../web_contents/modals.php'; ?>
<!-- Modals -->


<!-- Script -->
<script src="../assets/vendor/js/footer.js" type="module"></script>
<!-- Script -->