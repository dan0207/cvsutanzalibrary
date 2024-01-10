<?php 
    include '../render/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About</title>

        <link rel="stylesheet" href="../style.css">

        <!-- bootstrap 5 style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php include '../userNavigation/header.php'?>
        <?php include '../render/satisfactionRating.php'?>

        <div class="container">
            <div class="row">
                <div class="col-9">
                    <p class="fs-4 fw-bold">UNIVERSITY MISSION AND VISION</p>
                        <div class="mb-5">
                            <span class="fs-5" id="mission">Mission</span>

                            <!-- diplaying mission -->
                            <p class="border p-2 m-2" id="mission">
                                <?php
                                $select_sql = "SELECT subText FROM librarypages WHERE mainText = 'mission'";
                                $select_sql1 = mysqli_query($conn, $select_sql);
                                while($mission = mysqli_fetch_array($select_sql1)) {
                                        ?>
                                            <?php echo $mission['subText'] ?>
                                            
                                        <?php
                                }
                                ?>

                            </p>
                        </div>

                        <div class="mb-5">
                            <span class="fs-5" id="vision">Vision</span>
                            
                            <!-- diplaying vision -->
                            <p class="border p-2 m-2" id="vision">
                            <?php
                                $select_sql = "SELECT subText FROM librarypages WHERE mainText = 'vision'";
                                $select_sql1 = mysqli_query($conn, $select_sql);
                                while($vision = mysqli_fetch_array($select_sql1)) {
                                        ?>
                                            <?php echo $vision['subText']; ?>
                                            
                                        <?php
                                }
                                ?>
                        </div>
                    </p>

                    <p id="objective" class="fs-4 fw-bold">Library Objectives</p>
                    
                    <div class="mb-5 p-2">
                        <?php
                            $select_sql = "SELECT subText FROM librarypages WHERE pages = 'about' AND mainText = 'objective'";
                            $result = mysqli_query($conn, $select_sql);
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <ul>
                                            <i class="fa-solid fa-arrow-right"></i>  <?php echo $row['subText']; ?>
                                        </ul>
                                    <?php
                                }
                        ?>
                    </div>


                    <p class="fs-4 fw-bold">Library Rules and Regulations</p>
                    <div class="mb-5 p-2">
                        <?php
                            $select_sql = "SELECT subText FROM librarypages WHERE pages = 'about' AND mainText = 'rules'";
                            $result = mysqli_query($conn, $select_sql);
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <ul>
                                            <i class="fa-solid fa-arrow-right"></i> <?php echo $row['subText']; ?>
                                        </ul>
                                    <?php
                                }
                        ?>
                    </div>
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