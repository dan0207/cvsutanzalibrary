<div class="content">
    <div class="calendar">
        <div class="goto m-3">
            <div class="input-group d-flex">
                <input id="goto_input" type="text" class="goto-input form-control rounded-start-2 fs-7" placeholder="MM/YYYY">
                <button id="goto_btn" class="goto-btn btn btn-outline-primary rounded-end-2 px-3 fs-7" type="button">GO</button>
            </div>
        </div>
        <div class="month row d-flex justify-content-center align-items-center">
            <div class="col-1 px-0"><i id="prev_btn" class="prev-btn fa-solid fa-angle-left fa-2xl cursor-pointer" role="button"></i></div>
            <div class="col-8">
                <div id="active_date" class="active-date fs-5 fs-lg-6">December 2015</div>
            </div>
            <div class="col-1 px-0"><i id="next_btn" class="next-btn fa-solid fa-angle-right fa-2xl cursor-pointer" role="button"></i></div>
        </div>
        <div class="weekdays d-flex fs-8 mt-3 mb-1">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div id="days_container" class="days-container d-flex flex-wrap fs-7"></div>
        <button id="today_btn" class="today-btn btn btn-outline-primary rounded-2 px-4 fs-7 ms-1">Today</button>
        <!-- <button id="add_new_event_btn" class="btn btn-outline-primary rounded-2 col-12 col-md-4 py-2 mb-2">Add New Event</button> -->
    </div>
    <div id="event_organizer" class="event-organizer rounded-3">
        <div class="event-title d-flex my-3 p-2 border-top">
            <div id="event_month" class="event-month"></div>
        </div>
        <div id="events_container" class="events-container"></div>
    </div>
</div>



<!-- Scripts -->
<script src="../assets/vendor/js/calendar.js" type="module"></script>
<!-- Scripts -->