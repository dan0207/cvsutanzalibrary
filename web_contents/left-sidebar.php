<div class="container sticky-top py-3 z-1">
    <div class="card text-center mb-3 rounded-3">
        <div class="card-header text-bg-primary rounded-top-3 fs-6">LIBRARY HOURS</div>
        <div class="card-body">
            <p class="card-text fs-6">Monday - Thursday</p>
            <p class="card-text fs-7">7AM-6PM</p>
        </div>
    </div>
    <div class="card text-center mb-3 rounded-3">
        <div class="card-header text-bg-primary rounded-top-3 fs-6">CALENDAR OF EVENTS</div>
        <div class="card-body p-1">
            <div class="calendarOfEvents">
                <?php include '../../web_contents/calendar.php'; ?>
            </div>
        </div>
    </div>
    <div class="card text-center mb-3 rounded-3">
        <div class="card-header text-bg-primary rounded-top-3 fs-6">TUTORIALS</div>
        <div class="card-body">
            <!-- <ul>
            <li>Tutorial 1</li>
            <li>Tutorial 2</li>
            <li>Tutorial 3</li>
        </ul> -->
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="nav-link text-onSurface" id="v-pills-home-tab" data-bs-target="#v-pills-home" type="button" role="tab">Home</div>
            </div>
        </div>
    </div>
</div>