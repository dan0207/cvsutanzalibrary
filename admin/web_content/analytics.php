<h1 id="pageHeader">Analytics</h1>
<div class="container-fluid text-center mb-3">
    <h2 class="border p-2">MONTH OF <span id="currentMonth"></span></h2>
    <div class="row text-center">
        <div class="col-sm-10 col-lg-4"><br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                <i class="fa-solid fa-hand-holding fs-1 m-4"></i>
                <p>Total Borrow Request</p>
                <?php
                    $currentMonth = date('m');
                    $sql = "SELECT COUNT(*) as total_rows FROM bookTransaction WHERE MONTH(pickupDate) = $currentMonth";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // Fetch the result as an associative array
                        $row = $result->fetch_assoc();
                        
                        // Access the total_rows field
                        $totalRows = $row["total_rows"];
                        
                        // Display the total number of rows
                        echo $totalRows;
                    } else {
                        echo "No rows found";
                    }
                ?>
            </div>
        </div>
        <div class="col-sm-10 col-lg-4"><br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                <i class="fa-solid fa-hand-holding-hand fs-1 m-4"></i>
                <p>Total Borrowed Books</p>
                <?php
                    $currentMonth = date('m');

                    // Modify the SQL query to exclude rows with remarks containing 'Cancelled' or 'Declined'
                    $sql = "SELECT COUNT(*) as total_rows FROM bookTransaction WHERE MONTH(returnDate) = $currentMonth AND remarks NOT LIKE '%Cancelled%' AND remarks NOT LIKE '%Declined%'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Fetch the result as an associative array
                        $row = $result->fetch_assoc();

                        // Access the total_rows field
                        $totalRows = $row["total_rows"];

                        // Display the total number of rows
                        echo $totalRows;
                    } else {
                        echo "No rows found";
                    }
                ?>
            </div>
        </div>
        <div class="col-sm-10 col-lg-4"><br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                <i class="fa-solid fa-hand-holding-dollar fs-1 m-4"></i>
                <p>Total Fine Collected</p>
                <?php
                    $currentMonth = date('m');
                    $totalFine = 0;
                    // Construct the SQL query to fetch data for the current month
                    $sql = "SELECT * FROM bookTransaction WHERE MONTH(returnDate) = $currentMonth";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // Check if 'fine' is a valid number
                            if (is_numeric($row['fine'])) {
                                // Cast 'fine' to an integer before adding to totalFine
                                $totalFine += (int)$row['fine'];
                            }
                        }
                    
                        // Display the total fine after processing all rows
                        echo $totalFine;
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-lg-8 text-center"><br>
            <div id="report" class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                <h3>Today Reports</h3>
                <div class="row">
                    <div class="col">
                        <p>Borrow Request</p>
                        <span>2</span>
                    </div>
                    <div class="col">
                        <p>Borrowed Books</p>
                        <span>7</span>
                    </div>
                    <div class="col">
                        <p>Fine Collected</p>
                        <span>0</span>
                    </div>
                </div>
                
            </div>
            <div id="report" class="m-sm-5 p-sm-5 m-lg-1 p-lg-0"><br>
                <div class="border">
                    <h3>Most Borrowed Books</h3>
                    <div class="col-sm-10 col-lg-8 mx-auto">
                        <canvas id="barGraph"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"><br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-0">
                <div class="border">
                    <h3>TOP LIBRARY USERS</h3>
                    <div id="pieChartBox"class="col-sm-10 col m-1">
                        <p>(BY COURSES)</p>
                    <canvas id="myChart"></canvas>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>