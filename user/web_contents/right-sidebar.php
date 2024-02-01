<div class="sticky-top py-lg-5 z-1 overflow-y-auto vh-100 mb-4 mb-lg-0">
    <div id="right_sidebar" class="container my-lg-5">
        <div class="accordion" id="accordionPanelsStayOpenExample">

            <div class="accordion-item border border-0 mb-2">
                <div class="accordion-header">
                    <button class="accordion-button bg-surface shadow-none p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne">
                        <img src="../assets/img/drop-shape-open.png" class="w-100">
                        <div class="position-absolute top-50 start-55 translate-middle ps-0 ps-md-3 pb-md-2 pt-lg-3 ps-lg-1 pt-xl-2 w-100">
                            <p class="sidebar_header fw-semibold text-white fs-sm-5 fs-md-1 fs-lg-7">RECENT ANNOUNCEMENTS</p>
                        </div>
                    </button>
                </div>

                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <?php //callDataFromDatabase('recent_announcements') ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item border border-0 mb-2">
                <div class="accordion-header">
                    <button class="accordion-button bg-surface shadow-none p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsetwo">
                        <img src="../assets/img/drop-shape-open.png" class="w-100">
                        <div class="position-absolute top-50 start-55 translate-middle ps-0 ps-md-3 pb-md-2 pt-lg-3 ps-lg-1 pt-xl-2 w-100">
                            <p class="sidebar_header fw-semibold text-white fs-sm-5 fs-md-1 fs-lg-7">OPEN ACCESS LINKS</p>
                        </div>
                    </button>
                </div>
                <div id="panelsStayOpen-collapsetwo" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <?php //callDataFromDatabase('quick_links') ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item border border-0 mb-2">
                <div class="accordion-header">
                    <button class="accordion-button bg-surface shadow-none p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsethree">
                        <img src="../assets/img/drop-shape-open.png" class="w-100">
                        <div class="position-absolute top-50 start-55 translate-middle ps-0 ps-md-3 pb-md-2 pt-lg-3 ps-lg-1 pt-xl-2 w-100">
                            <p class="sidebar_header fw-semibold text-white fs-7 fs-sm-6 fs-md-3 fs-lg-10">CAVITE STATE UNIVERSITY - TANZA</p>
                        </div>
                    </button>
                </div>
                <div id="panelsStayOpen-collapsethree" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://www.facebook.com/CvSUTC"><i class="fa-solid fa-circle fa-2xs me-2"></i>Cavite State University - Tanza</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Scripts -->
<script defer src="../assets/vendor/js/right_sidebar.js" type="text/javascript"></script>
<!-- Scripts -->