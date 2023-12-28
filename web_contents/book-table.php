<div class="container-fluid">
    <div class="container">
        <div id="book_search" class="book_search my-3">
            <div class="input-group">
                <span class="input-group-text rounded-start-2 text-onPrimary bg-primary d-none d-md-flex">Library Catalog</span>
                <input id="book_search_input" type="text" class="rounded-start-2 form-control fs-7" placeholder="Title, Author, Subject, Series, Call Number, ISBN or ISSN">
                <button id="book_search_btn" class="btn btn-outline-primary rounded-end-2 px-3" type="button">Search</button>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="book-page-length col-12 col-md-3 col-lg-12 col-xl-4 col-xxl-5 d-flex justify-content-center justify-content-xl-start align-items-center mx-auto">
                <label for="pageLengthSelect">Show </label>
                <select class="pageLengthSelect">
                    <option value="10">10</option>
                    <option value="25">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                entries
            </div>
    
            <!-- <div class="col-12 col-md-8 col-lg-12 col-xl-8 col-xxl-7 d-block px-3 fs-7">
                <div class="d-flex me-auto align-items-center">
                    <div class="colored-box d-flex border mx-2" style="width:20px; height:20px; background-color: rgb(0, 114, 5, 0.05);"></div>
                    <span class="text-primary fst-italic">Available</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="colored-box d-flex border mx-2" style="width:20px; height:20px; background-color: rgb(255, 0, 0, 0.05);"></div>
                    <span class="text-highlight fst-italic">Room Use Only</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="colored-box d-flex border mx-2" style="width:20px; height:20px; background-color: rgb(255, 0, 0, 0.05);"></div>
                    <span class="text-secondary fst-italic">Not Available</span>
                </div>
            </div> -->
        </div>
        <div class="book-list-container border rounded-3 w-100 overflow-hidden">
            <div id="book_list_table" class="book-list-table">
                <?php include '../../tables/book_list_table.php'; ?>
            </div>
        </div>
    </div>
</div>