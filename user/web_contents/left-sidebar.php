<?php
$documentationLinks = [
    "./documentation.php#" => "Library Website Instructions",
    "./documentation.php#login_using_CvSU_mail" => "Login using CvSU Mail",
    "./documentation.php#requesting_reservation_for_borrowing_books" => "Requesting Reservation for Borrowing Books",
];
?>

<div class="sticky-top py-lg-5 z-1 overflow-y-auto vh-100 mb-4 mb-lg-0">
    <div id="left_sidebar" class="container py-lg-5 mb-3">
        <div class="card text-center mb-3 rounded-3 shadow">
            <div class="card-header text-bg-primary rounded-top-3">LIBRARY HOURS</div>
            <div class="card-body">
                <p class="card-text m-0">Monday - Thursday</p>
                <p class="card-text fw-semibold text-primary fs-3">7AM-6PM</p>
            </div>
        </div>
        <div class="card text-center mb-3 rounded-3 shadow">
            <div class="card-header text-bg-primary rounded-top-3">CALENDAR OF EVENTS</div>
            <div class="card-body p-1">
                <div class="calendarOfEvents">
                    <?php include '../web_contents/calendar.php'; ?>
                </div>
            </div>
        </div>
        <div class="card mb-3 rounded-3 shadow border">
            <div class="card-header text-bg-primary rounded-top-3 text-center">Documentation</div>
            <div class="card-body border p-0">
                <ul class="list-group border">
                    <?php
                    foreach ($documentationLinks as $url => $label) {
                        echo "<li class='list-group-item border border-0'><a class='text-onSurface link-offset-2 link-underline link-underline-opacity-0 fs-7' href='$url'>◉ $label</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>