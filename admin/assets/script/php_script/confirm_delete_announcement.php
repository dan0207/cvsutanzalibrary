<?php
    include '../../../render/connection.php';

    if(isset($_POST['postId'])) {
        $postId = $_POST['postId'];

        // Prepare the DELETE statement
        $delete_sql = "DELETE FROM createpost WHERE id = ?";
        
        // Bind parameters and execute the statement
        $stmt = mysqli_prepare($conn, $delete_sql);
        mysqli_stmt_bind_param($stmt, "i", $postId); // Assuming postId is an integer
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            $redirectUrl = "../../../libraryPages/home.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error deleting post: " . mysqli_error($conn);
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>
