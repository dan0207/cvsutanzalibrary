<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../web_contents/head.php'; ?>
    <title>Attendance Log • Tanza Campus Library</title>
</head>

<body class="attendance">

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
                        <div class="attendance-title text-center mb-3 h-10">
                            <div class="text-bg-primary rounded-3 fs-2 text-uppercase" style="font-family: 'poppins', sans-serif; letter-spacing: 10px;">LIBRARY REGISTRY <?php echo date('F j, Y', strtotime('+8 hours')) ?></div>
                        </div>
                        <div class="attendance-container w-100 h-80">
                            <div id="attendance_log_table" class="attendance-table h-70">
                                <?php include '../tables/user_attendance_log_table.php'; ?>
                            </div>
                        </div>
                        <div class="log-btn my-3 mt-auto h-10">
                            <a type="button" href="../pages/attendance.php" class="btn btn btn-secondary text-onSecondary px-3">
                            <i class="fa-solid fa-arrow-left px-2"></i> Back to Attendance
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