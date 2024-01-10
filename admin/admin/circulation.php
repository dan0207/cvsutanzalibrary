<?php 
    include '../render/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Circulation</title>

        <link rel="stylesheet" href="../style.css">

        <!-- Bootstrap style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <!-- Bootstrap script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>

        <!-- Data table style-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <!-- Data table script -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>
                <div class="pt-5">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div id="admin-body" class="pt-2">
                    <section id="bookReservation" class="">
                        <h1 id="pageHeader">Book Reservation</h1>
                        <div class="p-5">
                            <?php
                                // Fetch data from the bookReservation table
                                $sql = "SELECT * FROM bookreserve";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output a table header
                                    ?>
                                     <table id="bookReserveTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Library Id</th>
                                                <th>Name</th>
                                                <th>Course & Section</th>
                                                <th>Email</th>
                                                <th>Book Access No.</th>
                                                <th>Book Title</th>
                                                <th>Book Author</th>
                                                <th>Pickup Date</th>
                                                <th>Return Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["libraryid"]; ?></td>
                                                    <td><?php echo $row["name"]; ?></td>
                                                    <td><?php echo $row["courseSection"]; ?></td>
                                                    <td><?php echo $row["email"]; ?></td>
                                                    <td><?php echo $row["bookAccessNo"]; ?></td>
                                                    <td><?php echo $row["bookTitle"]; ?></td>
                                                    <td><?php echo $row["bookAuthor"]; ?></td>
                                                    <td><?php echo $row["pickupDate"]; ?></td>
                                                    <td><?php echo $row["returnDate"]; ?></td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm accept_request"
                                                                data-id="<?php echo $row["id"]; ?>"
                                                                data-libraryid="<?php echo $row["libraryid"]; ?>"
                                                                data-name="<?php echo $row["name"]; ?>"
                                                                data-course="<?php echo $row["courseSection"]; ?>"
                                                                data-email="<?php echo $row["email"]; ?>"
                                                                data-accessno="<?php echo $row["bookAccessNo"]; ?>"
                                                                data-title="<?php echo $row["bookTitle"]; ?>"
                                                                data-author="<?php echo $row["bookAuthor"]; ?>"
                                                                data-pickup="<?php echo $row["pickupDate"]; ?>"
                                                                data-return="<?php echo $row["returnDate"]; ?>">Accept
                                                        </button> 
                                                        <button class="btn btn-danger btn-sm decline_request"
                                                                data-id="<?php echo $row["id"]; ?>"
                                                                data-libraryid="<?php echo $row["libraryid"]; ?>"
                                                                data-name="<?php echo $row["name"]; ?>"
                                                                data-course="<?php echo $row["courseSection"]; ?>"
                                                                data-email="<?php echo $row["email"]; ?>"
                                                                data-accessno="<?php echo $row["bookAccessNo"]; ?>"
                                                                data-title="<?php echo $row["bookTitle"]; ?>"
                                                                data-author="<?php echo $row["bookAuthor"]; ?>"
                                                                data-pickup="<?php echo $row["pickupDate"]; ?>"
                                                                data-return="<?php echo $row["returnDate"]; ?>">Decline
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                            ?>
                            
                        </div>
                    </section>
                    
                    <section id="bookBorrowed">
                        <h1 id="pageHeader">Book Borrowed</h1>
                        <div class="p-5">
                            <?php
                                // Fetch data from the bookBorrowed table
                                $sqlBorrowed = "SELECT * FROM bookborrowed";
                                $resultBorrowed = $conn->query($sqlBorrowed);

                                if ($resultBorrowed->num_rows > 0) {
                                    // Output a table header
                                    ?>
                                    <table id="bookBorrowedTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Library Id</th>
                                                <th>Name</th>
                                                <th>Course & Section</th>
                                                <th>Email</th>
                                                <th>Book Access No.</th>
                                                <th>Book Title</th>
                                                <th>Book Author</th>
                                                <th>Pickup Date</th>
                                                <th>Return Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Output data of each row
                                            while ($rowBorrowed = $resultBorrowed->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $rowBorrowed["libraryid"]; ?></td>
                                                    <td><?php echo $rowBorrowed["name"]; ?></td>
                                                    <td><?php echo $rowBorrowed["courseSection"]; ?></td>
                                                    <td><?php echo $rowBorrowed["email"]; ?></td>
                                                    <td><?php echo $rowBorrowed["bookAccessNo"]; ?></td>
                                                    <td><?php echo $rowBorrowed["bookTitle"]; ?></td>
                                                    <td><?php echo $rowBorrowed["bookAuthor"]; ?></td>
                                                    <td><?php echo $rowBorrowed["pickupDate"]; ?></td>
                                                    <td><?php echo $rowBorrowed["returnDate"]; ?></td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm book_returned"
                                                                data-id="<?php echo $rowBorrowed["id"]; ?>"
                                                                data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                                                data-name="<?php echo $rowBorrowed["name"]; ?>"
                                                                data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                                                data-email="<?php echo $rowBorrowed["email"]; ?>"
                                                                data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                                                data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                                                data-author="<?php echo $rowBorrowed["bookAuthor"]; ?>"
                                                                data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                                                data-return="<?php echo $rowBorrowed["returnDate"]; ?>">Returned
                                                        </button> 
                                                        <button class="btn btn-warning btn-sm book_missing"
                                                                data-id="<?php echo $rowBorrowed["id"]; ?>"
                                                                data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                                                data-name="<?php echo $rowBorrowed["name"]; ?>"
                                                                data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                                                data-email="<?php echo $rowBorrowed["email"]; ?>"
                                                                data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                                                data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                                                data-author="<?php echo $rowBorrowed["bookAuthor"]; ?>"
                                                                data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                                                data-return="<?php echo $rowBorrowed["returnDate"]; ?>">Missing
                                                        </button> 
                                                        <button class="btn btn-danger btn-sm book_damage"
                                                                data-id="<?php echo $rowBorrowed["id"]; ?>"
                                                                data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                                                data-name="<?php echo $rowBorrowed["name"]; ?>"
                                                                data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                                                data-email="<?php echo $rowBorrowed["email"]; ?>"
                                                                data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                                                data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                                                data-author="<?php echo $rowBorrowed["bookAuthor"]; ?>"
                                                                data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                                                data-return="<?php echo $rowBorrowed["returnDate"]; ?>">Damage
                                                        </button> 
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    echo "0 results";
                                }

                            ?>
                        </div>
                    </section>
                    
                    <section id="bookReturned">
                        <h1 id="pageHeader">Book Transaction</h1>
                        <div class="p-5">
                            <?php
                                // Fetch data from the bookBorrowed table
                                $sqlBorrowed = "SELECT * FROM booktransaction";
                                $resultBorrowed = $conn->query($sqlBorrowed);

                                if ($resultBorrowed->num_rows > 0) {
                                    // Output a table header
                                    ?>
                                    <table id="bookTransactionTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Library ID</th>
                                                <th>Name</th>
                                                <th>Course & Section</th>
                                                <th>Email</th>
                                                <th>Book Access No.</th>
                                                <th>Book Title</th>
                                                <th>Book Author</th>
                                                <th>Pickup Date</th>
                                                <th>Return Date</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Output data of each row
                                            while ($rowBorrowed = $resultBorrowed->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $rowBorrowed["libraryid"]; ?></td>
                                                    <td><?php echo $rowBorrowed["name"]; ?></td>
                                                    <td><?php echo $rowBorrowed["courseSection"]; ?></td>
                                                    <td><?php echo $rowBorrowed["email"]; ?></td>
                                                    <td><?php echo $rowBorrowed["bookAccessNo"]; ?></td>
                                                    <td><?php echo $rowBorrowed["bookTitle"]; ?></td>
                                                    <td><?php echo $rowBorrowed["bookAuthor"]; ?></td>
                                                    <td><?php echo $rowBorrowed["pickupDate"]; ?></td>
                                                    <td><?php echo $rowBorrowed["returnDate"]; ?></td>
                                                    <td><?php echo $rowBorrowed["remarks"]; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    echo "0 results";
                                }

                            ?>
                        </div>
                    </section>
                    
                </div>
            </div>
        </div>

        <script src="../script.js"></script>

        <script>
            $(document).ready(function () {
                // DataTable initialization for bookReserveTable
                var dataTableReserve = $('#bookReserveTable').DataTable({
                    scrollX: true
                });

                // DataTable initialization for bookBorrowedTable
                var dataTableBorrowed = $('#bookBorrowedTable').DataTable({
                    scrollX: true
                });

                // DataTable initialization for bookBorrowedTable
                var dataTableBorrowed = $('#bookTransactionTable').DataTable({
                    scrollX: true
                });

                // Handle the click event on the "Accept" button
                $('.accept_request').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Redirect to process_reservation.php with data
                    window.location.href = '../render/process_reservation.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate;
                });

                // Handle the click event on the "Decline" button
                $('.decline_request').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Redirect to process_reservation.php with data
                    window.location.href = '../render/deny_reservation.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate;

                });

                // Handle the click event on the "Return" button
                $('.book_returned').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Redirect to book_return.php with data
                    window.location.href = '../render/book_return.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate;
                });

                // Handle the click event on the "Missing" button
                $('.book_missing').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Redirect to book_return.php with data
                    window.location.href = '../render/book_missing.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate;
                });
                
                // Handle the click event on the "Damage" button
                $('.book_damage').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Redirect to book_return.php with data
                    window.location.href = '../render/book_damage.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate;
                });
            });
        </script>



    </body>
</html>