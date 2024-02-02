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
                    <h3>Moderators</h3>
                    <table id="moderatorList" class="table table-sm nowrap table-striped compact table-hover">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Lastname</th>
                                <th>Username</th>
                                <th>CvSu Email</th>
                                <th>Student No.</th>
                                <th>Faculty No.</th>
                                <th>Member Type</th>
                                <th>Permission</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM moderator";
                                $result = $conn->query($sql);

                                // Check if the query was successful
                                if ($result) {
                                    // Check if there are rows in the result set
                                    if ($result->num_rows > 0) {
                                        ?>
                                            <?php
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["user_givenName"]; ?></td>
                                                    <td><?php echo $row["user_familyName"]; ?></td>
                                                    <td><?php echo $row["user_username"]; ?></td>
                                                    <td><?php echo $row["user_email"]; ?></td>
                                                    <td><?php echo $row["user_student_number"]; ?></td>
                                                    <td><?php echo $row["user_faculty_number"]; ?></td>
                                                    <td><?php echo $row["user_member_type"]; ?></td>
                                                    <td>
                                                        <?php echo $row["permission"]; ?>
                                                        <a class="nav-link text-success" href="../render/moderator/editPermission.php?user_token=<?php echo $row['user_token']?>">Edit</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        <?php
                                    } else {
                                        echo "No records found.";
                                    }
                                } else {
                                    // Display an error message if the query fails
                                    echo "Error: " . $conn->error;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="container-fluid p-3">
                    <h3>Users</h3>
                    <table id="userList" class="table table-sm nowrap table-striped compact table-hover">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Lastname</th>
                                <th>Username</th>
                                <th>CvSu Email</th>
                                <th>Student No.</th>
                                <th>Faculty No.</th>
                                <th>Member Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);

                                // Check if the query was successful
                                if ($result) {
                                    // Check if there are rows in the result set
                                    if ($result->num_rows > 0) {
                                        ?>
                                            <?php
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["user_givenName"]; ?></td>
                                                    <td><?php echo $row["user_familyName"]; ?></td>
                                                    <td><?php echo $row["user_username"] ?></td>
                                                    <td><?php echo $row["user_email"]; ?></td>
                                                    <td><?php echo $row["user_student_number"]; ?></td>
                                                    <td><?php echo $row["user_faculty_number"]; ?></td>
                                                    <td>
                                                        <?php echo $row["user_member_type"]; ?>
                                                        <a class="nav-link text-success" href="../render/moderator/process_access.php?user_token=<?php echo $row['user_token']?>">Grant Access</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        <?php
                                    } else {
                                        echo "No records found.";
                                    }
                                } else {
                                    // Display an error message if the query fails
                                    echo "Error: " . $conn->error;
                                }
                            ?>
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
                if (window.innerWidth <= 1000) {
                    var satisfactionTable =  $('#userList').DataTable({
                        scrollX: true,
                    });
                    var satisfactionTable =  $('#moderatorList').DataTable({
                        scrollX: true,
                    });
                } else {
                    var satisfactionTable =  $('#userList').DataTable();
                    var satisfactionTable =  $('#moderatorList').DataTable();
                }
                
            })

        </script>
    </body>
</html>