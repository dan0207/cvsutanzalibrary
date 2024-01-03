<?php
    include '../render/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

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
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>
        <div id="admin-body">
            <section id="analytics">
                <h1 id="pageHeader">Analytics</h1>
                <div class="container-fluid text-center mb-3">
                    <h2 class="border p-2">MONTH OF DECEMBER</h2>
                    <div class="row">
                        <div class="col m-3 p-3 border">
                            <i class="fa-solid fa-hand-holding fs-1 m-4"></i>
                            <p>Total Borrow Request</p>
                            <span>19</span>
                        </div>
                        <div class="col m-3 p-3 border">
                            <i class="fa-solid fa-hand-holding-hand fs-1 m-4"></i>
                            <p>Total Borrowed Books</p>
                            <span>34</span>
                        </div>
                        <div class="col m-3 p-3 border">
                            <i class="fa-solid fa-hand-holding-dollar fs-1 m-4"></i>
                            <p>Total Fine Collected</p>
                            <span>15</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 text-center">
                            <div id="report" class=" m-1 p-3 border">
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
                            <div id="report" class="row m-1 mt-3 p-3 border">
                                <h3>Most Borrowed Books</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row m-1 border">
                                <h3>TOP LIBRARY USERS</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="collection">
                <h1 id="pageHeader">Collection</h1>
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col m-3 p-3 border">
                            <i class="fa-solid fa-book fs-1 m-4"></i>
                            <p>Total Print Books</p>
                            <span>7</span>
                        </div>
                        <div class="col m-3 p-3 border">
                            <i class="fa-solid fa-book-atlas fs-1 m-4"></i>
                            <p>Total E-Books</p>
                            <span>10</span>
                        </div>
                        <div class="col m-3 p-3 border">
                            <i class="fa-solid fa-newspaper fs-1 m-4"></i>
                            <p>Total E-Journals</p>
                            <span>15</span>
                        </div>
                    </div>
                    <div class="row m-1 border">
                        <h3>TOTAL COLLECTION BY COURSE</h3>
                    </div>
                </div>
            </section>
            
            <section id="userSatisfaction">
                <h1 id="pageHeader">Satisfaction Rating</h1>
                <div class="card m-3 ps-3 pe-3">
                    <h3 class="text-center">SUMMARY OF SATISFACTION RATINGS</h3>
                    <table class="table table-sm nowrap table-striped compact table-hover text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>Average Rating</th>
                                <th>Descriptive Rating</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>4.90</td>
                                <td>HIGHLY SATISFIED</td>
                                <td>2023</td>
                            </tr>
                            <tr>
                                <td>4.00</td>
                                <td>SATISFIED</td>
                                <td>2022</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="m-5">
                <table id="satisfactionRating" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Subject</th>
                                <th>Ratings</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>

                        <tbody>
                                <?php
                                    #select data
                                    $select_sql = "SELECT * FROM satisfactionrating";
                                    $select_sql1 = mysqli_query($conn, $select_sql);
                                    if(mysqli_num_rows($select_sql1)) {
                                        while($rows = mysqli_fetch_array($select_sql1)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $rows['Category']?></td>
                                                    <td><?php echo $rows['Subject']?></td>
                                                    <td><?php echo $rows['Ratings']?></td>
                                                    <td><?php echo $rows['Comments']?></td>
                                                    <td><?php echo $rows['Date']?></td>
                                                    <td><?php echo $rows['Time']?></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                        </tbody>

                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Subject</th>
                                <th>Ratings</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </section>
            
        </div>
        
        <script src="../script.js"></script>

        <script>
            new DataTable('#satisfactionRating');
        </script>

    </body>
</html>