<?php 
    include '../render/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <link rel="stylesheet" href="../style.css">

        <!-- bootstrap 5 style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php include '../userNavigation/header.php'; ?>
        <?php include '../render/satisfactionRating.php';?>

        <div class="container">
            <div class="row">
                <div class="col-9">
                <?php
                            # Select data
                            $select_sql = "SELECT * FROM createpost ORDER BY timestamp DESC";
                            $select_sql1 = mysqli_query($conn, $select_sql);

                            if ($select_sql1) { // Check if the query was successful
                                while ($row = mysqli_fetch_array($select_sql1))  {
                                    ?>
                                    <div class="shadow border rounded p-2 my-4 w-75 mx-5">
                                        <div class="col">
                                            <div class="row ps-3">
                                                <div class="col-1 mt-4">
                                                    <span class="border bg-dark text-light p-2 mt-3 rounded-circle"><i class="fa-solid fa-user fa-xl"></i></span>
                                                </div>
                                                <div class="col text-start">
                                                    <span ><b>Rocelyn Cea Baltar</b></span><br>
                                                    <span style="font-size: .8rem">Campus Librarian</span><br>
                                                    <span style="font-size: .6rem">
                                                        <?php if (isset($row['timestamp'])) {
                                                            $formattedDate = date('M d, Y h:i A', strtotime($row['timestamp']));
                                                            echo $formattedDate;
                                                        } else { ?>
                                                            <p>No timestamp available</p>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                                <div class="col-1">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="row-9">
                                                <?php if (isset($row['text'])) { ?>
                                                    <div class="container px-5 pt-4 text-center card">
                                                        <p><?php echo $row['text']; ?></p>
                                                    </div>
                                                <?php } else { ?>
                                                    <p>No text available</p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "Error: " . mysqli_error($conn); // Output the error message
                            }
                        ?>
                </div>
                
                <div class="col">
                    <?php include '../userNavigation/sidenav.php'; ?>
                </div>
            </div>
        </div>





        <!-- bootstrap 5 script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>