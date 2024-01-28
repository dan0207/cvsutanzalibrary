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

            <div class="book-page-length d-flex justify-content-center justify-content-lg-start align-items-center mx-auto">
                <label for="pageLengthSelect">Show </label>
                <select class="pageLengthSelect fs-7 rounded-3">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                entries
                <!-- <div class="update-books-btn ms-auto">
                    <a href="../php_script/db_server_copyData.php" class="btn btn-primary py-1 fs-7">UPDATE LIST OF BOOKS</a>
                </div> -->
            </div>
            <div class="book-list-container w-100 overflow-hidden">
                <div id="book_list_table" class="book-list-table">
                    <?php include '../tables/book_list_table.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>