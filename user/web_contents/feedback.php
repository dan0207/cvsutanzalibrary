<div id="feedback" class="feedback d-none d-lg-block rounded-start-5 z-2 my-5 px-2 shadow bg-body-tertiary border">
    <div class="feedback-header h-15 text-center rounded-top-5 pt-3 px-3 bg-background">
        <h5 class="p-0 m-0 h-60">Library Feedback Form</h5>
        <p class=" p-0 m-0 fs-7 h-40">We welcome your comments and suggestions.</p>
    </div>
    <div class="feedback-body mx-4 px-1 py-3 h-70 rounded-5 border bg-surface">
        <form id="feedback_form" action="../php_script/feedback_script.php" class="feedback-form needs-validation h-100 py-2 overflow-auto px-3" method="POST">
            <div id="feedback_ratings" class="feedback-ratings mb-2 bg-surface w-80 mx-auto border border-2 border-secondary rounded-pill d-flex justify-content-center align-items-center">
                <h6 class="pt-2">Rate:</h6>
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" required>
                    <label for="star5">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" required>
                    <label for="star4">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" required>
                    <label for="star3">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" required>
                    <label for="star2">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" required>
                    <label for="star1">1 star</label>
                </div>
            </div>

            <div id="feedback_category" class="feedback-category">
                <label class="form-label">What kind of comment would you like to send?</label>
                <div class="feedback-radio px-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="feedback_complaint_radio" value="Complaint" required>
                        <label class="form-check-label fs-7" for="feedback_complaint_radio">
                            Complaint
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="feedback_problem_radio" value="Problem" required>
                        <label class="form-check-label fs-7" for="feedback_problem_radio">
                            Problem
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="feedback_suggestion_radio" value="Suggestion" required>
                        <label class="form-check-label fs-7" for="feedback_suggestion_radio">
                            Suggestion
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="feedback_praise_radio" value="Praise" required>
                        <label class="form-check-label fs-7" for="feedback_praise_radio">
                            Praise
                        </label>
                    </div>
                    <div id="feedback_category_feedback" class="text-secondary fs-10"></div>
                </div>
            </div>

            <div id="feedback_subject" class="feedback-subject">
                <label class="form-label">What about the library do you want to comment on?</label>
                <input type="text" class="form-control" name="subject" id="feedback_subject_input" required>
                <div id="feedback_subject_feedback" class="text-secondary fs-10"></div>
            </div>
            <div id="feedback_comments" class="feedback-comments">
                <label class="form-label">Enter your comments in the space provided below:</label>
                <textarea class="form-control" name="comments" id="feedback_comment_input" rows="8" required></textarea>
                <div id="feedback_comments_feedback" class="text-secondary fs-10"></div>
            </div>
        </form>
    </div>
    <div class="feedback-footer d-flex h-15 justify-content-center align-items-center py-2">
        <button id="feedback_submit" class="feedback-submit btn btn-primary rounded-pill w-75">SUBMIT</button>
    </div>
</div>

<script src="../assets/vendor/js/feedback.js" type="module"></script>