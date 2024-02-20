<?php
$quickLinks = [
    "https://www.accessengineeringlibrary.com/" => "Access Engineering",
    "https://search.ebscohost.com/Login.aspx" => "EBSCO Databases",
    "https://link.gale.com/apps/menu?userGroupName=phslsu&prodId=MENU" => "Infotrac",
    "http://ww7.engineeringstudymaterial.net/?usid=24&utid=4925535969" => "Engineering Study Material",
    "https://web-archive.southampton.ac.uk/cogprints.org/" => "Cogprints",
    "https://www.doabooks.org/" => "Directory of Open Access Books",
    "https://www.getfreeebooks.com/" => "Get Free Books",
    "https://www.gutenberg.org/" => "Project Gutenberg",
    "https://www.intechopen.com/" => "Intechopen",
];
$cvsuLinks = [
    "https://www.facebook.com/CvSUTC" => "Cavite State University - Tanza"
];
?>

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
                            <div id="newly_books_carousel" class="carousel slide carousel-fade w-100" data-bs-ride="carousel">
                                <div class="carousel-inner py-4">
                                    <?php
                                    $folderPath = '../assets/img/new_books/';
                                    $files = glob($folderPath . '/*.png');
                                    foreach ($files as $index => $file) {
                                        $filename = pathinfo($file, PATHINFO_FILENAME);
                                        $isActive = ($index == 0) ? 'active' : '';
                                        echo "<div class='carousel-item $isActive' data-bs-interval='3000'><a class='book-container' href='../pages/books.php?opac_search=$filename'><div class='book'><img src='$file' class='d-block w-100'></div></a></div>";
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
                            <?php
                            foreach ($quickLinks as $url => $label) {
                                echo "<li class='list-group-item border border-0'><a class='text-onSurface link-offset-2 link-underline link-underline-opacity-0' target='_blank' href='$url'><i class='fa-solid fa-share px-2'></i>$label</a></li>";
                            }
                            ?>
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
                            <?php
                            foreach ($cvsuLinks as $url => $label) {
                                echo "<li class='list-group-item border border-0'><a class='text-onSurface link-offset-2 link-underline link-underline-opacity-0' target='_blank' href='$url'><i class='fa-solid fa-share px-2'></i>$label</a></li>";
                            }
                            ?>
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