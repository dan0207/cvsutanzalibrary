<?php
include '../php_script/main_script.php';

$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Name';
$student_number = isset($_GET['student_number']) ? htmlspecialchars($_GET['student_number']) : 'Student Number';
$faculty_number = isset($_GET['faculty_number']) ? htmlspecialchars($_GET['faculty_number']) : 'Employee ID';
$faculty_department = isset($_GET['faculty_department']) ? htmlspecialchars($_GET['faculty_department']) : 'Department';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : 'Email';
$member_type = isset($_GET['member_type']) ? htmlspecialchars($_GET['member_type']) : 'User';
$picture = isset($_GET['picture']) ? htmlspecialchars($_GET['picture']) : '../assets/img/student-icon.png';
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : 'Library ID';
$status = isset($_GET['status']) ? htmlspecialchars($_GET['status']) : '';


$courseSection = isset($_GET['course']) && isset($_GET['year']) && isset($_GET['section']) ? getFormatCourseSection(htmlspecialchars($_GET['course']), htmlspecialchars($_GET['year']), htmlspecialchars($_GET['section'])) : 'Course & Section';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../web_contents/head.php'; ?>
    <title>Attendance • Tanza Campus Library</title>
    <style></style>
</head>

<body class="attendance">
    <!-- Header -->
    <nav id="navbar" class="navbar vh-5 navbar-expand-lg navbar-onSurface bg-surface border-bottom shadow-sm bg-body-surface">
        <div class="container-fluid">
            <a class="navbar-brand py-1 p-0" href="../pages/home.php" type="button">
                <img src="../assets/img/logo.png" alt="CAVITE STATE UNIVERSITY TANZA CAMPUS LIBRARY LOGO" width="180" class="img-responsive">
            </a>
            <ul class="navbar-nav nav-pills text-center ms-auto mt-3 my-lg-auto" id="navTab_pill">
                <li class="nav-item">
                    <a class="nav-link" href="../../admin/index.php"><i class="fa-solid fa-user"></i> Login Admin</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header -->

    <!-- Main -->
    <div class="contents vh-95">
        <div id="attendance_contents" class="main-contents h-100 bg-tertiary">
            <div class="banner row px-4 h-20">
                <div class="attendance-title text-cente px-2 my-auto">
                    <h1 class="title py-3 text-center text-primary rounded-3 border shadow bg-surface" style="font-family: 'Anton', sans-serif; letter-spacing: 10px;">WELCOME TO CVSU TANZA CAMPUS LIBRARY</h1>
                </div>
            </div>
            <div class="body px-5 h-70">
                <form id="qrForm" action="../php_script/attendance_script.php" method="POST">
                    <input class="qr-scanner-input" name="qr-scanner" type="text" onblur="this.focus();" style="position: absolute; left: -10000px; " autofocus>
                </form>

                <div class="toast-container position-absolute top-50 start-50 translate-middle p-3 w-35">
                    <div id="liveToast" class="toast w-100" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body py-4 text-onSecondary bg-secondary opacity-75 rounded-3 text-center">
                            <h1>INVALD QR CODE!!</h1>
                        </div>
                    </div>
                </div>

                <div class="before-scanning d-none row h-100" data-aos="fade-in" data-aos-duration="1000">
                    <div class="col-8 rounded-3 border d-flex justify-content-center align-items-center flex-column shadow-sm bg-surface h-100">

                        <div class="time-date w-80 border p-5 rounded-3 shadow-lg bg-surface">
                            <div class="attendance-title text-center mb-3 w-100">
                                <div class="text-bg-primary rounded-3 py-2 fs-3" style="font-family: 'poppins', sans-serif; letter-spacing: 10px;">CURRENT DATE AND TIME</div>
                            </div>
                            <div class="display-date text-center fs-2">
                                <span id="day">day</span>,
                                <span id="daynum">00</span>
                                <span id="month">month</span>
                                <span id="year">0000</span>
                            </div>
                            <div class="display-time text-center rounded-5 display-2 fw-bold" style="font-family: 'Lato', sans-serif;"></div>
                        </div>
                        <div class="log-btn text-center my-3">
                            <a type="button" href="../web_contents/attendance_log.php" class="btn btn-lg btn-primary px-5">
                                View Log book
                            </a>
                        </div>
                    </div>

                    <div class="col-4 pe-0 h-100">
                        <div class="sidebar m-0 rounded-3 p-5 shadow-sm bg-surface h-100">
                            <div class="card text-center h-100 border-0 shadow-lg bg-surface">
                                <div class="card h-100">
                                    <div class="card-header text-bg-primary fs-5">Please Scan Your QR Code</div>
                                    <div class="card-body d-flex align-items-center h-80">
                                        <video src="../assets/video/qr-scanning.mp4" class="qrcode-scanning w-100 h-100" autoplay loop muted></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="after-scanning row h-100" data-aos="fade-in" data-aos-duration="1000">
                    <div class="col-8 rounded-3 border shadow bg-surface h-100 p-5">
                        <div class="library-registry p-5 border rounded-3 shadow-lg bg-surface h-100">
                            <div class="attendance-title text-center mb-3">
                                <div class="text-bg-primary rounded-3 fs-2" style="font-family: 'poppins', sans-serif; letter-spacing: 10px;">LIBRARY REGISTRY</div>
                            </div>
                            <div class="attendance-container w-100 h-100 overflow-hidden">
                                <div id="attendance_table" class="attendance-table">
                                    <?php include '../tables/user_attendance_table.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 pe-0 h-100">
                        <div class="sidebar m-0 rounded-3 p-5 shadow-sm bg-surface h-100">
                            <div class="card border rounded-3 shadow-lg bg-body-tertiary h-100">
                                <div class="card-body text-center p-2 d-flex flex-column h-100">
                                    <div class="attendance-picture h-50 d-flex justify-content-center flex-column align-items-center">
                                        <h4 class="attendance-type m-1 fw-semibold"><?php echo $member_type; ?></h4>
                                        <img id="attendance_picture" src="<?php echo $picture; ?>" class="img-responsive rounded-circle border border-5 border-tertiary shadow h-70" alt="user">
                                    </div>
                                    <div class="attendance-details mx-4 h-60 d-flex flex-column justify-content-evenly">
                                        <h4 class="attendance-name m-1"><?php echo $name; ?></h4>
                                        <?php
                                        if ($member_type == 'Faculty') {
                                            echo "<h6 class='attendance-faculty-department m-1'>$faculty_department</h6>";
                                            echo "<h6 class='attendance-faculty-number m-1'>$faculty_number</h6>";
                                        } else {
                                            echo "<h6 class='attendance-student-courseSection m-1'>$courseSection</h6>";
                                            echo "<h6 class='attendance-student-number m-1'>$student_number</h6>";
                                        }
                                        ?>
                                        <h6 class="attendance-email m-1"><?php echo mask($email); ?></h6>
                                        <h6 class="attendance-libraryid m-1" id="library_id"><?php echo mask($id) ?></h6>
                                        <h5 class="<?php echo checkAttendanceStatus($status) ?> rounded-pill py-2 mx-4">STATUS: <?php echo $status ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->


    <!-- Footer -->
    <footer class="opac_footer bg-primary fixed-bottom">
        <div class="text-onPrimary text-center text-md-end px-1 fs-7 fs-md-6">
            <i class="fa-solid fa-chart-line"></i>
            27873 total views , 24 views today
        </div>
    </footer>
    <!-- Footer -->


    <!-- Script -->
    <script src="../assets/vendor/js/attendance.js" type="module"></script>
    <!-- Script -->
</body>

</html>