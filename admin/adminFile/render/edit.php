<?php
    include 'connection.php';

    if(isset($_GET['subText']) && isset($_GET['id']) && isset($_GET['page'])) {
        $id = $_GET['id'];
        $page = $_GET['page'];
        $subText = $_GET['subText'];
    
        // $subText = "SELECT subText FROM librarypages WHERE mainText = '$mainText'";
        // $qry = mysqli_query($conn, $subText);
    
        // if(mysqli_num_rows($qry)) {
        //     $print = ''; // Initialize the $print variable
        //     while($items = mysqli_fetch_array($qry)) {
        //         $print = $items['subText']; // Store the last value retrieved from the database
        //     }
        // }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
        
        <link rel="stylesheet" href="../style.css">

        <!-- Bootstrap style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <!-- Bootstrap script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>

    </head>

    <body>
        <?php
            // editing data for about
            if($page == 'about') {
                ?>
                    <div class="container p-5">
                        <form method="post">
                            <textarea class="form-control mt-3 mb-3" name="editText" cols="30" rows="10"><?php echo $subText ?></textarea>
                            <button class="btn btn-success ms-auto" name="update" type="submit">SAVE</button>
                            <button class="btn btn-danger"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">CANCEL</a></button>
                        </form>

                        <?php
                            if(isset($_POST['update'])) {
                                // Get the edited mission text from the form
                                $editText = $_POST['editText'];
                            
                                // Update the data in the database
                                $mainText = mysqli_real_escape_string($conn, $mainText); // Sanitize input
                                $editText = mysqli_real_escape_string($conn, $editText); // Sanitize input
                            
                                // Construct the SQL update query
                                $updateQuery = "UPDATE librarypages SET subText = '$editText' WHERE mainText = '$mainText'";
                            
                                // Execute the update query
                                if (mysqli_query($conn, $updateQuery)) {
                                    echo "Data updated successfully!";
                                    echo '<script type="text/javascript">setTimeout(function(){ location.href = "../librarypages/about.php"; }, 500);</script>';
                                } else {
                                    echo "Error updating data: " . mysqli_error($conn);
                                }

                            }                            
                        ?>
                        <button class="btn d-flex ms-auto btn-info mt-5"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">Go Back</a></button>
                    </div>
                <?php
            } else if($page == 'services') {
                ?>
                    <div class="container p-5">
                        <form method="post">
                            <textarea class="mt-3 mb-3" name="editService" id="editService" cols="30" rows="10"><?php echo $subText; ?></textarea><br>
                            <button class="btn btn-success ms-auto" name="update" type="submit">SAVE</button>
                            <button class="btn btn-danger"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">CANCEL</a></button>
                        </form>

                        <?php
                            if (isset($_POST['update'])) {
                                // Get the edited mission text from the form
                                $editText = $_POST['editService'];
                            
                                // Update the data in the database
                                $mainText = $id; // Sanitize input
                                $editText = mysqli_real_escape_string($conn, $editText); // Sanitize input
                            
                                // Construct the SQL update query using prepared statement
                                $updateQuery = "UPDATE librarypages SET subText = ? WHERE mainText = ?";
                                $stmt = mysqli_prepare($conn, $updateQuery);
                            
                                // Bind parameters
                                mysqli_stmt_bind_param($stmt, "ss", $editText, $mainText);
                            
                                // Execute the update query
                                if (mysqli_stmt_execute($stmt)) {
                                    echo "Data updated successfully!";
                                    echo '<script type="text/javascript">setTimeout(function(){ location.href = "../librarypages/services.php"; }, 500);</script>';
                                } else {
                                    echo "Error updating data: " . mysqli_error($conn);
                                }
                            
                                // Close the prepared statement
                                mysqli_stmt_close($stmt);
                            }                                                   
                        ?>
                    </div>
                <?php
            }
        ?>

        <script src="../script.js"></script>
        
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editService' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    </body>
</html>