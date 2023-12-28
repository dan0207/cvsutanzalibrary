<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../../assets/vendor/css/events_calendar.css">

    <!-- Bootstrap style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../../../assets/scss/main.css">
</head>



<body>
    <?php include '../adminNavigation/header.php' ?>

    <div class="pt-5">
        <?php include '../adminNavigation/sidebar.php'; ?>
    </div>

    <div id="admin-body">
        <section>
            <h1 id="pageHeader">Calendar of Events</h1>

            <!-- Main -->
            <div class="background container-fluid bg-background">
                <div class="main container bg-surface">
                    <div class="row border rounded-3">
                        <div class="content col-sm-12 col-lg-8 my-5">
                            <div class="container-fluid my-5">
                                <div class="eventsCalendar text-center">
                                    <h1 class="my-3">CALENDAR OF EVENTS</h1>
                                    <div class="container">
                                        <div class="calendarContainer">
                                            <div class="calendar border shadow bg-body-surfaces rounded-3">
                                                <div class="goto-today">
                                                    <div class="goto">
                                                        <div class="input-group">
                                                            <input type="text" class="date-input form-control rounded-start-2" placeholder="MM/YYYY">
                                                            <button class="goto-btn btn btn-outline-primary rounded-end-2 px-3" type="button">GO</button>
                                                        </div>
                                                    </div>
                                                    <button class="today-btn btn btn-outline-primary rounded-2 px-4">Today</button>
                                                </div>
                                                <div class="month">
                                                    <i class="prev fas fa-angle-left"></i>
                                                    <div class="date">december 2015</div>
                                                    <i class="next fas fa-angle-right"></i>
                                                </div>
                                                <div class="weekdays">
                                                    <div>Sun</div>
                                                    <div>Mon</div>
                                                    <div>Tue</div>
                                                    <div>Wed</div>
                                                    <div>Thu</div>
                                                    <div>Fri</div>
                                                    <div>Sat</div>
                                                </div>
                                                <div class="days"></div>
                                                <button id="add_new_event_btn" class="btn btn-outline-primary rounded-2 w-80 py-2 mb-2">Add New Event</button>
                                            </div>
                                        </div>
                                        <div id="organizerContainer" class="organizerContainer border shadow bg-body-surfaces rounded-3">
                                            <div class="today-date">
                                                <div class="event-day">wed</div>
                                                <div class="event-date">12th december 2022</div>
                                            </div>
                                            <div class="events"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main -->

        </section>
    </div>

    <script src="../../../assets/vendor/js/events_calendar.js" type="module"></script>
    <script src="../script.js"></script>
</body>

</html>