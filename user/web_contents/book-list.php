<?php
$search_query = isset($_GET['opac_search']) ? $_GET['opac_search'] : '';
$_GET['opac_search'] = '';
?>

<div id="book" class="py-4">
    <div class="container-fluid py-5">
        <div class="container">
            <div class="title text-center">
                <h3>Books</h3>
            </div>

            <div id="opac_search" class="opac-search input-group mx-auto my-2">
                <input id="opac_search_input" name="opac_search" type="text" class="opac-search-input form-control rounded-start-pill py-1 px-3 fs-7 fs-md-6" placeholder="Search library collection here.." value="<?php echo htmlspecialchars($search_query); ?>">
                <button id="opac_search_btn" class="opac-search-btn btn btn-primary border-2 border-primary text-onPrimary rounded-end-pill py-1 px-3 fs-7 fs-md-6">Search</button>
            </div>

            <div class="room-use-reminder d-flex align-items-center mt-3 mb-2">
                <span class="fw-bold">Reminder : </span><span class="text-dark fs-7 ms-3">If for <button class="btn btn-outline-secondary fs-10 p-1 disabled my-1 mx-2">ROOM USE ONLY</button> kindly proceed directly to the librarian.</span>
            </div>

            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div data-aos="fade-in" class="accordion-item border border-0 mb-1">
                    <h2 class="accordion-header d-flex">
                        <div>
                            <button class="accordion-button bg-surface shadow-none d-block pb-0 text-primary p-0" type="button" data-bs-toggle="collapse" data-bs-target="#book_instructions_collapse">
                                <h6 class="fs-7">View instructions</h6>
                            </button>
                        </div>
                    </h2>
                    <div id="book_instructions_collapse" class="accordion-collapse collapse">
                        <div class="accordion-body p-0">
                            <button class="btn btn-outline-primary fs-8 p-1 disabled my-1 px-3"><i class="fa-solid fa-upload fa-sm"></i><span class="ps-1">BORROW</span></button><span class="fs-7"> - Allows users to and bring home up to two non-reserved books at a time</span><br>
                            <button class="btn btn-outline-secondary fs-8 p-1 disabled my-1">ROOM USE ONLY</button><span class="fs-7"> - Users can use books within the library room only cannot take them outside</span><br>
                            <button class="btn btn-outline-secondary fs-8 p-1 disabled my-1 px-3">BORROWED</button><span class="fs-7"> - Signifies that all copies of a particular book are currently on loan or borrowed</span><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="book-page-length d-flex justify-content-center justify-content-lg-start align-items-center mx-auto">
                <label for="pageLengthSelect">Show </label>
                <select class="pageLengthSelect fs-7 rounded-3">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                entries
                <div class="update-books-btn ms-auto">
                    <a href="../php_script/db_server_copyData.php" class="btn btn-primary py-1 fs-7">UPDATE LIST OF BOOKS</a>
                </div>
            </div>
            <div class="book-list-container w-100 overflow-hidden">
                <div id="book_list_table" class="book-list-table">
                    <?php include '../tables/book_list_table.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>