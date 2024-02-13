<div class="sticky-top py-lg-5 z-1 overflow-y-auto vh-100 mb-4 mb-lg-0 overflow-x-hidden">
    <div id="right_sidebar" class="container my-lg-5">
        <div class="accordion" id="accordionPanelsStayOpenExample">

            <div class="accordion-item border border-0 mb-2">
                <div class="accordion-header">
                    <button class="accordion-button bg-surface shadow-none p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne">
                        <img src="../assets/img/drop-shape-open.png" class="w-100">
                        <div class="position-absolute top-50 start-55 translate-middle ps-0 ps-md-3 pb-md-2 pt-lg-3 ps-lg-1 pt-xl-2 w-100">
                            <p class="sidebar_header fw-semibold text-white fs-sm-5 fs-md-1 fs-lg-7">NEWLY ACQUIRED BOOKS</p>
                        </div>
                    </button>
                </div>

                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body px-2">
                        <div class="d-flex justify-content-center">
                            <div id="newly_books_carousel" class="carousel slide carousel-fade w-70" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-3 shadow">
                                    <?php
                                    for ($i = 1; $i <= 30; $i++) {
                                        if ($i == 1) {
                                            echo "<div class='carousel-item active' data-bs-interval='3000'><img src='../assets/img/new_books/newbk" . $i . ".png' class='d-block w-100 rounded-3 border border-3 border-white'></div>";
                                        } else {
                                            echo "<div class='carousel-item' data-bs-interval='3000'><img src='../assets/img/new_books/newbk" . $i . ".png' class='d-block w-100 border rounded-3 border-3 border-white'></div>";
                                        }
                                    }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#newly_books_carousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#newly_books_carousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
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
                    <div class="accordion-body px-2">
                        <ul class="list-group">
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://www.accessengineeringlibrary.com/"></i><i class="fa-solid fa-share px-2"></i>Access Engineering</a></li>
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://search.ebscohost.com/Login.aspx"></i><i class="fa-solid fa-share px-2"></i>EBSCO Databases</a></li>
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://link.gale.com/apps/menu?userGroupName=phslsu&prodId=MENU"></i><i class="fa-solid fa-share px-2"></i>Infotrac</a></li>
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="http://ww7.engineeringstudymaterial.net/?usid=24&utid=4925535969"></i><i class="fa-solid fa-share px-2"></i>Engineering Study Material</a></li>
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://web-archive.southampton.ac.uk/cogprints.org/"></i><i class="fa-solid fa-share px-2"></i>Cogprints</a></li>
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://www.doabooks.org/"></i><i class="fa-solid fa-share px-2"></i>Directory of Open Access Books</a></li>
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://www.getfreeebooks.com/"></i><i class="fa-solid fa-share px-2"></i>Get Free Books</a></li>
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://www.gutenberg.org/"></i><i class="fa-solid fa-share px-2"></i>Project Gutenberg</a></li>
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://www.intechopen.com/"></i><i class="fa-solid fa-share px-2"></i>Intechopen</a></li>
                        </ul>
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
                    <div class="accordion-body px-2">
                        <ul class="list-group">
                            <li class="list-group-item border border-0"><a class="text-onSurface link-offset-2 link-underline link-underline-opacity-0" target="_blank" href="https://www.facebook.com/CvSUTC"><i class="fa-solid fa-share px-2"></i>Cavite State University - Tanza</a></li>
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