<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
    
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Circulation</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>
        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>
        <div id="admin-body">
            <section id="list">
                <h1 id="pageHeader">List</h1>
                <div class="container-fluid p-3">
                    <table id="userList" class="table table-sm nowrap table-striped compact table-hover">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Lastname</th>
                                <th>Username</th>
                                <th>CvSu Email</th>
                                <th>Faculty No.</th>
                                <th>Member Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Kenneth</td>
                                <td>Villacorte</td>
                                <td>johnkenneth.villacorte</td>
                                <td>johnkenneth.villacorte@cvsu.edu.ph</td>
                                <td>102501</td>
                                <td>Librarian</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </section>
            
            <section id="view">
                <h1 id="pageHeader">View</h1>
            </section>
            
            <section id="profile">
                <h1 id="pageHeader">Profile</h1>
            </section>
            
        </div>

        <script src="../assets/script/script.js"></script>

        <script>
            $(document).ready(function() {
                if (window.innerWidth <= 999) {
                    var satisfactionTable =  $('#userList').DataTable({
                        scrollX: true,
                    });
                } else {
                    var satisfactionTable =  $('#userList').DataTable();
                }
                
            })
        </script>
    </body>
</html>