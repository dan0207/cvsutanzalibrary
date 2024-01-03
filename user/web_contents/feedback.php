<div id="feedback" class="feedback h-70 rounded-start-5 z-2 my-5 shadow bg-body-tertiary border">
    <div class="feedback-header h-10 text-center rounded-top-5 pt-3 px-3 bg-background">
        <h4 class="p-0 m-0">Library Feedback Form</h4>
        <p class=" p-0 m-0 fs-7">We welcome your comments and suggestions.</p>
    </div>
    <div class="feedback-body px-5 py-3 h-75">
        <form class="feedback-form h-100 pt-2 overflow-auto">
            <div id="feedback_ratings" class="feedback-ratings mb-2 bg-surface w-80 mx-auto border border-primary border-1 rounded-pill d-flex justify-content-center align-items-center">
                <h6 class="pt-2">Rate:</h6>
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1">1 star</label>
                </fieldset>
            </div>
            <div class="feedback-question1">
                <label class="form-label">What kind of comment would you like to send?</label>
                <div class="feedback-radio px-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="feedback_answer1" id="feedback_complaint_radio">
                        <label class="form-check-label fs-7" for="feedback_complaint_radio">
                            Complaint
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="feedback_answer1" id="feedback_problem_radio">
                        <label class="form-check-label fs-7" for="feedback_problem_radio">
                            Problem
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="feedback_answer1" id="feedback_suggestion_radio">
                        <label class="form-check-label fs-7" for="feedback_suggestion_radio">
                            Suggestion
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="feedback_answer1" id="feedback_praise_radio">
                        <label class="form-check-label fs-7" for="feedback_praise_radio">
                            Praise
                        </label>
                    </div>
                </div>
            </div>
            <div class="feedback-question2">
                <label class="form-label">What about the library do you want to comment on?</label>
                <input type="text" class="form-control" name="feedback_answer2" id="feedback_subject_input" required>
            </div>
            <div class="feedback-question3">
                <label class="form-label">Enter your comments in the space provided below:</label>
                <textarea type="text" class="form-control" name="feedback_answer3" id="feedback_comment_input" rows="8"></textarea>
            </div>
        </form>
    </div>
    <div class="feedback-footer h-15 d-flex justify-content-center align-items-center py-2">
        <button class="btn btn-primary rounded-pill h-60 w-75">SUBMIT</button>
    </div>
</div>