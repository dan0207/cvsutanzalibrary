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
    <title>Attendance Log <?php echo date("Y-m-d") ?> • Tanza Campus Library</title>
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
                <div class="row h-100" data-aos="fade-in" data-aos-duration="1000">
                    <div class="library-registry p-5 rounded-3 shadow-lg bg-surface h-100">
                        <div class="attendance-title text-center mb-3">
                            <div class="text-bg-primary rounded-3 fs-2" style="font-family: 'poppins', sans-serif; letter-spacing: 10px;">LIBRARY REGISTRY</div>
                        </div>
                        <div class="attendance-container w-100 h-80 overflow-hidden">
                            <div id="attendance_table" class="attendance-table">
                                <?php include '../tables/user_attendance_table.php'; ?>
                            </div>
                        </div>
                        <div class="log-btn text-center my-3 mt-auto">
                            <a type="button" href="../pages/attendance.php" class="btn btn-lg btn-primary px-5">
                                Back to Attendance
                            </a>
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
    <script src="../assets/vendor/js/attendance_log.js" type="module"></script>
    <!-- Script -->
</body>

</html>