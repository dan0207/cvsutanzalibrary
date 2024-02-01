<div class="sticky-top py-lg-5 z-1 overflow-y-auto vh-100 mb-4 mb-lg-0">
    <div id="left_sidebar" class="container py-lg-5 mb-3">
        <div class="card text-center mb-3 rounded-3">
            <div class="card-header text-bg-primary rounded-top-3">LIBRARY HOURS</div>
            <div class="card-body">
                <?php //callDataFromDatabase('libraryHours') ?>
            </div>
        </div>
        <div class="card text-center mb-3 rounded-3">
            <div class="card-header text-bg-primary rounded-top-3">CALENDAR OF EVENTS</div>
            <div class="card-body p-1">
                <div class="calendarOfEvents">
                    <?php include '../web_contents/calendar.php'; ?>
                </div>
            </div>
        </div>
        <div class="card text-center mb-3 rounded-3">
            <div class="card-header text-bg-primary rounded-top-3">TUTORIALS</div>
            <div class="card-body">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="nav-link text-onSurface" id="v-pills-home-tab" data-bs-target="#v-pills-home" type="button" role="tab">How to request books</div>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="nav-link text-onSurface" id="v-pills-home-tab" data-bs-target="#v-pills-home" type="button" role="tab">How to login</div>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="nav-link text-onSurface" id="v-pills-home-tab" data-bs-target="#v-pills-home" type="button" role="tab">How to ask librarian</div>
                </div>
            </div>
        </div>
    </div>
</div>