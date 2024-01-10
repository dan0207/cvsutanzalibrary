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


        
        <!-- Bootstrap style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <!-- Bootstrap script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <section>
                <h1 id="pageHeader">Home</h1>
                <div class="container text-center p-4 mt-3 w-50">
                    <div id="createPostBtn" class="container border shadow rounded p-1 mb-5">
                        <div class="row m-2">
                            <div class="col m-2 pt-2">
                                <h4 class="pt-3"><i class="fa-solid fa-user fa-2xl"></i></h4>
                            </div>
                            <div class="col-9 m-2">
                                <div class="row text-center pb-2">
                                    <span class="border border-dark rounded-pill p-2">CREATE A POST</span>
                                </div>
                                <div class="row">
                                    <div class="col border border-dark rounded-pill m-1">
                                        <span><i class="fa-solid fa-camera"></i> PHOTO</span>
                                    </div>
                                    <div class="col border border-dark rounded-pill m-1">
                                        <span><i class="fa-solid fa-video"></i> VIDEO</span>
                                    </div>
                                    <div class="col border border-dark rounded-pill m-1">
                                        <span>&lt;/&gt; EMBED</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <?php
                            # Select data
                            $select_sql = "SELECT * FROM createpost ORDER BY timestamp DESC";
                            $select_sql1 = mysqli_query($conn, $select_sql);

                            if ($select_sql1) { // Check if the query was successful
                                while ($row = mysqli_fetch_array($select_sql1))  {
                                    ?>
                                    <div class="shadow border rounded p-2 my-4">
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
                </div>
            </section>
        </div>






        
        <script src="../script.js"></script>

        <script>
            // admin create post
            const createPostBtn = document.getElementById('createPostBtn');
            createPostBtn.onclick = function() {
                window.location.href = "../render/uploadForm.php";
            }
        </script>
        
    </body>
</html>