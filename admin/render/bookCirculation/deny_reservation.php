<?php
    include '../../render/connection.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../assets/fonts/fonts.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $libraryId = $_GET['libraryid'];
        $name = $_GET['name'];
        $course = $_GET['course'];
        $email = $_GET['email'];
        $accessNo = $_GET['accessno'];
        $title = $_GET['title'];
        $callno = $_GET['callno'];
        $pickupDate = $_GET['pickupDate'];
        $returnDate = $_GET['returnDate'];
    }

    // Function to insert data into the booktransaction table
    function insertIntoBookTransaction($conn, $id, $libraryId, $name, $course, $email, $accessNo, $title, $callno, $pickupDate, $returnDate, $remarks)
    {
        $sql = "INSERT INTO booktransaction (id, libraryid, name, courseSection, email, bookAccessNo, bookTitle, bookcallNo, pickupDate, returnDate, remarks) 
                VALUES ('$id', '$libraryId', '$name', '$course', '$email', '$accessNo', '$title', '$callno', '$pickupDate', '$returnDate', '$remarks')";

        if ($conn->query($sql) === TRUE) {
            // Delete the record from the bookreserve table
            $deleteSql = "DELETE FROM bookreserve WHERE id = '$id'";
            if ($conn->query($deleteSql) === TRUE) {
                $redirectUrl = "../../admin/circulation.php#bookReservation";
                echo "Record inserted successfully! Record deleted from bookreserve!";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                echo "Error deleting record from bookreserve: " . $conn->error;
            }
        } else {
            echo "Error inserting record into bookborrowed: " . $conn->error;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deny Reservation</title>
        
        <link rel="stylesheet" href="../assets/style/style.css">

    </head>

    <body>
        <div class="container text-center py-5">
            <h1>Decline Reservation Details</h1>
            <div class="col-sm-10 col-lg-6 text-start border border-secondary rounded ps-5 mx-auto">
                <div class="text-end">
                    <a class="nav-link p-3" href="../../admin/circulation.php"><i class="fa-solid fa-x"></i></a>
                </div>
                <?php
                    // Display the data
                    echo '<p><strong>Library ID:</strong> ' . $libraryId . '</p>';
                    echo '<p><strong>Name:</strong> ' . $name . '</p>';
                    echo '<p><strong>Course & Section:</strong> ' . $course . '</p>';
                    echo '<p><strong>Email:</strong> ' . $email . '</p>';
                    echo '<p><strong>Book Access No.:</strong> ' . $accessNo . '</p>';
                    echo '<p><strong>Book Title:</strong> ' . $title . '</p>';
                    echo '<p><strong>Book Call No:</strong> ' . $callno . '</p>';
                    echo '<p><strong>Pickup Date:</strong> ' . $pickupDate . '</p>';
                    echo '<p><strong>Return Date:</strong> ' . $returnDate . '</p>';
                ?>
                <!-- Button to insert data into bookborrowed table -->
                <form method="post">
                    <div class="px-3">
                        <label for="declineOption">Decline Options:</label>
                        <select class="form-control" id="declineOption" name="selectedOption">
                            <option value="default" selected>Select an option</option>
                            
                            <!-- The student may have violated library policies, such as having outstanding fines or overdue materials,
                            preventing them from borrowing additional books until the issues are resolved. -->
                            <option value="Policy Violation">Policy Violation</option>

                            <!-- The student may have initially reserved the book but later canceled the request due to a change of mind
                            or a decision to use alternative resources. -->
                            <option value="Reservation Cancellation">Reservation Cancellation</option>

                            <!-- The student may have lost the book and is in the process of resolving the issue with the library, making
                            it temporarily unavailable until the matter is resolved. -->
                            <option value="Lost Book">Lost Book</option>

                            <!-- If the library is closed for a holiday, maintenance, or any other reason, students may not be able to access 
                            or borrow books during that time. -->
                            <option value="Library Closure">Library Closure</option>

                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-danger m-3" name="insert_button">DECLINE</button>
                    </div>
                </form>

                <?php
                    if (isset($_POST['insert_button'])) {
                        // Insert the data into the booktransaction table when the button is clicked
                        $remarks = $_POST["selectedOption"];
                        if($remarks != 'default') {
                            $remarksOption = 'Declined, ' . $remarks; 
                            insertIntoBookTransaction($conn, $id, $libraryId, $name, $course, $email, $accessNo, $title, $callno, $pickupDate, $returnDate, $remarksOption);
                        } else {
                            echo "<p class='text-danger'>Please select valid value</p>";
                        }
                        

                    }
                ?>
            </div>
        </div>

    </body>
</html>