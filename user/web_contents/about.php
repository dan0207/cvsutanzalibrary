<div id="about" class="py-lg-5">
    <div class="container-fluid py-3">
        <div class="container text-center">
            <h4 class="fs-3">ANNOUNCEMENTS</h4>
            <div class="d-flex justify-content-center mb-5">
                <div id="announcements_carousel" class="carousel slide w-90" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-4 border shadow-lg bg-body-tertiary">
                        <div class="carousel-item active">
                            <img src="../assets/img/newly-acquired-books.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/img/sample-announcement.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#announcements_carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#announcements_carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <h4 class="fs-4">UNIVERSITY VISION AND MISSION STATEMENTS</h4>
            <div class="accordion" id="accordionPanelsStayOpenExample">

                <div data-aos="fade-in" class="accordion-item border border-0 mb-1">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#vision-collapse">
                            <h4>VISION</h4>
                        </button>
                    </h2>
                    <div id="vision-collapse" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <em><?php //callDataFromDatabase('vision') ?></em>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-in" class="accordion-item border border-0 mb-1">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#mission-collapse">
                            <h4>MISSION</h4>
                        </button>
                    </h2>
                    <div id="mission-collapse" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <em><?php //callDataFromDatabase('mission') ?></em>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-in" class="accordion-item border border-0 mb-1">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-surface shadow-none d-block text-center pb-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#policy-collapse">
                            <h4>QUALITY POLICY</h4>
                        </button>
                    </h2>
                    <div id="policy-collapse" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <em><?php //callDataFromDatabase('policy') ?></em>
                            <!-- <p><em>We <strong>C</strong>ommit to the highest standards of education, <strong>V</strong>alue our stakeholders, <strong>S</strong>trive for continual improvement of our products and services, and <strong>U</strong>phold the University’s tenets of Truth, Excellence, and Service to produce globally competitive and morally upright individuals.</em></p> -->
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-in" class="library-objecttives mb-5">
                <h3>LIBRARY OBJECTIVES</h3>
                <?php //callDataFromDatabase('objectives') ?>
            </div>


            <div data-aos="fade-in" class="library-rules mb-5">
                <h3>LIBRARY RULES AND REGULATIONS</h3>
                <?php //callDataFromDatabase('rules') ?>
            </div>


            <div data-aos="fade-in" class="library-borrowingPrevileges mb-5">
                <h3>BORROWING PRIVILEGES</h3>
                <?php //callDataFromDatabase('privileges') ?>
            </div>


            <div data-aos="fade-in" class="library-fines mb-5">
                <h4>Overdue Fines</h4>
                <?php //callDataFromDatabase('overdue_fines') ?>
            </div>


            <div data-aos="fade-in" class="library-guides mb-5">
                <h4>Guide to CvSU Library</h4>
                <?php //callDataFromDatabase('guides') ?>
            </div>
        </div>
    </div>
</div>