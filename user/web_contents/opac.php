<div class="opac-background" data-aos="fade-down" data-aos-duration="1000">
    <div class="opac-mask bg-primary bg-opacity-75">
        <div class="opac-page vh-35 d-flex align-items-center justify-content-center text-center p-2 text-onPrimary">
            <div class="opac-content">
                <h1 class="opac-title display-1" style="font-family: anton;">TANZA CAMPUS LIBRARY</h1>
                <label for="opac_search_input" class="opac-label fs-7 fs-md-6 w-65 mx-auto bg-primary my-2 rounded-pill border border-onPrimary border-2">Online Public Access Catalog</label>

                <form action="../pages/books.php" method="GET">
                    <div id="opac_search" class="opac-search input-group mx-auto w-90">
                        <input id="opac_search_input" name="opac_search" type="text" class="opac-search-input form-control rounded-start-pill py-2 px-3 fs-7" placeholder="Search library collection here..">
                        <button id="opac_search_btn" class="opac-search-btn btn btn-outline-primary border-2 border-onPrimary text-onPrimary rounded-end-pill py-1 px-3 fs-7 d-none d-md-block">Search</button>
                        <button id="opac_search_btn_icon" class="opac-search-btn-icon btn btn-outline-primary border-2 border-onPrimary text-onPrimary rounded-end-pill py-1 px-3 d-md-none"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>