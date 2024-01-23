<?php
    include __DIR__ . '/../../render/connection.php';

    // Fetch data from the booktransaction table
    $sqlBorrowed = "SELECT * FROM booktransaction";
    $resultBorrowed = $conn->query($sqlBorrowed);

    // Check for errors in the query
    if (!$resultBorrowed) {
        die("Error: " . $conn->error);
    }

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
