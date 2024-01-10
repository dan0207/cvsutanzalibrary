<?php
    include '../render/connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $libraryId = $_GET['libraryid'];
        $name = $_GET['name'];
        $course = $_GET['course'];
        $email = $_GET['email'];
        $accessNo = $_GET['accessno'];
        $title = $_GET['title'];
        $author = $_GET['author'];
        $pickupDate = $_GET['pickupDate'];
        $returnDate = $_GET['returnDate'];
    }

    // Function to insert data into the booktransaction table
    function insertIntoBookTransaction($conn, $id, $libraryId, $name, $course, $email, $accessNo, $title, $author, $pickupDate, $returnDate)
    {
        $sql = "INSERT INTO booktransaction (id, libraryid, name, courseSection, email, bookAccessNo, bookTitle, bookAuthor, pickupDate, returnDate, remarks) 
                VALUES ('$id', '$libraryId', '$name', '$course', '$email', '$accessNo', '$title', '$author', '$pickupDate', '$returnDate', 'Missing')";

        if ($conn->query($sql) === TRUE) {
            // Delete the record from the bookreserve table
            $deleteSql = "DELETE FROM bookborrowed WHERE id = '$id'";
            if ($conn->query($deleteSql) === TRUE) {
                $redirectUrl = "../admin/circulation.php#bookReservation";
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

    if (isset($_POST['insert_button'])) {
        // Insert the data into the booktransaction table when the button is clicked
        insertIntoBookTransaction($conn, $id, $libraryId, $name, $course, $email, $accessNo, $title, $author, $pickupDate, $returnDate);

    }

    // Close the database connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Missing</title>
        
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
    <div class="container text-center pt-5">
        <h1>BOOK Missing</h1>
        <div class="card">
            <div class="text-end">
                <a class="btn btn-secondary m-3 border rounded-circle" href="../admin/circulation.php"><i class="fa-solid fa-x"></i></a>
            </div>
            <?php
                // Display the data
                echo '<p><strong>Library ID:</strong> ' . $libraryId . '</p>';
                echo '<p><strong>Name:</strong> ' . $name . '</p>';
                echo '<p><strong>Course & Section:</strong> ' . $course . '</p>';
                echo '<p><strong>Email:</strong> ' . $email . '</p>';
                echo '<p><strong>Book Access No.:</strong> ' . $accessNo . '</p>';
                echo '<p><strong>Book Title:</strong> ' . $title . '</p>';
                echo '<p><strong>Book Author:</strong> ' . $author . '</p>';
                echo '<p><strong>Pickup Date:</strong> ' . $pickupDate . '</p>';
                echo '<p><strong>Return Date:</strong> ' . $returnDate . '</p>';
            ?>
            <!-- Button to insert data into bookborrowed table -->
            <form method="post" class="text-end">
                <button type="submit" class="btn btn-warning m-3" name="insert_button">Missing</button>
            </form>

        </div>
    </div>

</body>
</html>
