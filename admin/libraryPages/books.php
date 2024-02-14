<?php
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
    include '../render/connection.php';
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Books</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>

            
    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div id="admin-body" class="pt-2">
                <div class="row pt-5">
                    <div class="col-lg-3">
                        <?php include '../adminNavigation/sidebar.php'; ?>
                    </div>
                    <div class="col-lg-9">
                        <section>
                            <h1 id="pageHeader">Books</h1>
                            <div id="book" class="py-4">
                                <div class="container-fluid py-5">
                                    <div class="container">

                                        <div id="opac_search" class="opac-search input-group mx-auto my-2">
                                            <input id="opac_search_input" name="opac_search" type="text" class="opac-search-input form-control rounded-start-pill py-1 px-3 fs-7 fs-md-6" placeholder="Search library collection here..">
                                            <button id="opac_search_btn" class="opac-search-btn btn btn-primary border-2 border-primary text-onPrimary rounded-end-pill py-1 px-3 fs-7 fs-md-6">Search</button>
                                        </div>

                                        <div class="room-use-reminder d-flex align-items-center mt-3 mb-2">
                                            <span class="fw-bold">Reminder : </span><span class="text-dark fs-7 ms-3">If for <button class="btn btn-outline-secondary fs-10 p-1 disabled my-1 mx-2">ROOM USE ONLY</button> kindly proceed directly to the librarian.</span>
                                        </div>

                                        <div class="accordion" id="accordionPanelsStayOpenExample">
                                            <div class="accordion-item border border-0 mb-1">
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
                                                <!-- <a href= "../../user/php_script/db_server_copyData.php" class="btn btn-primary py-1 fs-7">UPDATE LIST OF BOOKS</a> -->
                                                <a href= "" class="btn btn-primary py-1 fs-7">UPDATE LIST OF BOOKS</a>
                                            </div>
                                        </div>
                                        <div class="book-list-container w-100 overflow-hidden">
                                            <div id="book_list_table" class="book-list-table">
                                                <?php include '../../user/tables/book_list_table.php'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>




        <script src="../assets/script/script.js"></script>

        <script>
            let books_table = new DataTable('#books_table', {
                ajax: {
                    type: 'GET',
                    url: '../../user/php_script/datatable_server_script.php',
                    data: {
                        table: 'books'
                    }
                },
                processing: true, // DO NOT REMOVE
                serverSide: true, // DO NOT REMOVE
                iDisplayLength: 10,
                lengthChange: false, 
                responsive: true,
                searching: false,
                columnDefs: [{
                        targets: -1,
                        data: null,
                        render: function(data, type, row) {
                            let value = row[14];

                            if (value === 'Available to Borrow') {
                                return "<button id='request_btn' showModal('login_reminder_modal') class='btn btn-outline-primary fs-10 p-1 d-flex justify-content-center align-items-center w-100'><i class='fa-solid fa-upload fa-sm'></i><span class='ps-1'>BORROW</span></button>";
                            } else if (value === 'Room Use Only') {
                                return "<button id='request_btn' class='btn btn-outline-secondary fs-10 p-1 w-100' style='white-space: nowrap'>ROOM USE ONLY</button>";
                            } else {
                                return "<button id='request_btn' class='btn btn-outline-secondary fs-10 p-1 w-100' style='white-space: nowrap'>BORROWED</button>";
                            }
                        }
                    },
                    {
                        targets: -2,
                        render: function(data, type, row) {
                            let value = row[14];
                            if (value === 'Available to Borrow') {
                                return "<h4 class='fst-italic text-primary'>Available to Borrow</h4>";
                            } else if (value === 'Room Use Only') {
                                return "<h4 class='fst-italic text-highlight'>Available for Room Use Only</h4>";
                            } else {
                                return "<h4 class='fst-italic text-secondary'>Not Available for Borrowing</h4>";
                            }
                        }
                    },
                    {
                        responsivePriority: 1,
                        targets: 1
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    },
                    {
                        responsivePriority: 3,
                        targets: 0
                    }
                ],



                createdRow: function(row, data, index) {
                    let value = data[14];

                    if (value === 'Available to Borrow') {
                        $('#request_btn', row).prop('disabled', false);
                        $('td', row).addClass('available');
                    } else {
                        $('#request_btn', row).prop('disabled', true);
                        $('td', row).addClass('notAvailable');
                    }
                },
            });


            let opac_search_input = document.getElementById('opac_search_input');

            opac_search_input.addEventListener('keyup', function(event) {
                if (event.key === 'Enter') {
                    searchBooks(this.value);
                }
            });

            opac_search_btn.addEventListener('click', function(event) {
                searchBooks(opac_search_input.value);
            });
        </script>

    </body>
=======
        <link rel="stylesheet" href="../assets/style/style.css">
    </head>

<body>
    <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <section>
                <h1 id="pageHeader">Books</h1>
                
            </section>
        </div>

        <script src="../assets/script/script.js"></script>
    </body>
</html>