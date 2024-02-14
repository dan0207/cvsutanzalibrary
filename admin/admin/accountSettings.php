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
        <title>Account Settings</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>

        <div id="admin-body" class="pt-2">
            <div class="row pt-5">
                <div class="col">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <h1 id="pageHeader">Account Settings</h1>
                    <div class="container p-1">
                        <?php
                        $username = $_SESSION['username'];
                        $password = $_SESSION['password'];
                        
                        // Prepare SQL statement to fetch user data based on username
                        $sql = "SELECT * FROM moderator WHERE user_username = '$username'";


                        // Execute SQL statement
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <section class="card shadow mb-3 mt-5" id="profile">
                                <h2 class="mx-3">Profile</h2>
                                <div class="row pb-5">
                                    <div class="col-lg-4 col-sm-12 px-5">
                                        <div class="col text-center admin-profile">
                                            <div class="dropdown">
                                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php
                                                    if ($row['user_picture'] != NULL) {
                                                        $user_picture = $row['user_picture']; // Ensure $user_picture is properly assigned
                                                        ?>
                                                        <img class="border border-dark rounded-circle shadow profile_picture" src="../moderator_account/moderator_profile_picture/<?php echo $user_picture; ?>" alt="">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img class="profile_picture border border-dark rounded-circle shadow" src="../render/uploads/images/profile_picture.jpg" alt="">
                                                        <?php
                                                    }
                                                    ?>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                        if($row['user_picture'] != NULL) {
                                                            ?>
                                                            <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#see_profile_picture">See profile picture</a></li>
                                                            <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#change_profile_picture">Update profile picture</a></li>
                                                            <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#remove_profile_picture">Remove profile picture</a></li>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#change_profile_picture">Update profile picture</a></li>
                                                            <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <div class="row px-2 card m-2">
                                            Email: <?php echo $row['user_email'];?>
                                        </div>
                                        <div class="row card px-2 m-2">
                                            Faculty Number: <?php echo $row['user_faculty_number'];?>
                                        </div>
                                        <div class="row card px-2 m-2">
                                            Member Type: <?php echo $row['user_member_type'];?>
                                        </div>
                                        <div class="row card px-2 m-2">
                                            Username: <?php echo $row['user_username'];?>
                                        </div>
                                        <div class="row card px-2 m-2">
                                            Password:
                                            <?php
                                                // Mask the first 10 characters of the hashed password with asterisks
                                                $hashedPassword = $password;
                                                $maskedPassword = str_repeat("*", strlen($hashedPassword));
                                                echo $maskedPassword;
                                            ?>
                                            <button class="nav-link fs-small text-primary text-start ps-3" data-bs-toggle="modal" data-bs-target="#change_password">change password</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="nav-link bg-success text-light" data-bs-toggle="modal" data-bs-target="#update_profile">
                                    Update Profile
                                </button>
                            </section>
                            <section class="card shadow mb-5" id="personalInfo">
                                <h2 class="mx-3">Personal Information</h2>
                                <div class="row py-1">
                                    <div class="col-lg-5 col-sm-10">
                                        <div class="row card px-2 m-1">
                                            Lastname: <?php echo $row['user_familyName'];?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-10">
                                        <div class="row card px-2 m-1">
                                            Firstname: <?php echo $row['user_givenName'];?>
                                        </div> 
                                    </div>
                                    <div class="col-lg-2 col-sm-10">
                                        <div class="row card px-2 m-1">
                                            M.I.: <?php echo $row['user_middleI'];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col-lg-6 col-sm-10">
                                        <div class="row card px-2 m-1">
                                            Birthday: <?php echo $row['user_birthday'];?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-10">
                                        <div class="row card px-2 m-1">
                                            Gender: <?php echo $row['user_gender'];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-10">
                                    <div class="row card px-2 m-1">
                                        Bio: <?php echo $row['user_bio'];?>
                                    </div>
                                </div>
                            </section>
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<!-- Firstname,lastname, middle, birthday, gender, -->
        <script src="../assets/script/script.js"></script>
    </body>

    <script>
        function checkOldPassword() {
            var oldPassword = document.getElementById("old_password").value;

            // Send AJAX request to PHP script
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../assets/script/php_script/check_password.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if(oldPassword === "") {
                    document.getElementById("update_password_button").disabled = true;
                    return; // Stop execution if passwords don't match
                }
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var feedbackElement = document.getElementById("old_password_feedback");
                    if (response.valid) {
                        feedbackElement.innerHTML = "<span class='text-success'>Old password is correct</span>";
                        document.getElementById("new_password").disabled = false;
                        return; // Stop execution if passwords don't match
                    } else {
                        feedbackElement.innerHTML = "<span class='text-danger'>Old password is incorrect</span>";
                        document.getElementById("new_password").disabled = true;
                        return; // Stop execution if passwords don't match
                    }
                }
            };
            xhr.send("old_password=" + oldPassword);
        }

        function checkConfirmPassword() {
            var newPassword = document.getElementById("new_password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            // Send AJAX request to PHP script
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../assets/script/php_script/check_confirm_password.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (!response.valid) {
                        feedbackElement.innerHTML = "<span class='text-danger'>Passwords do not match</span>";
                    }
                }
            };
            xhr.send("new_password=" + newPassword + "&confirm_password=" + confirmPassword);

            // Check password strength
            var xhrStrength = new XMLHttpRequest();
            xhrStrength.open("POST", "../assets/script/php_script/check_password_strength.php", true);
            xhrStrength.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhrStrength.onreadystatechange = function() {
                if (xhrStrength.readyState === 4 && xhrStrength.status === 200) {
                    var response = JSON.parse(xhrStrength.responseText);
                    var strengthElement = document.getElementById("password_strength");
                    strengthElement.textContent = response.strength;

                    // Change color based on strength
                    if (response.strength === 'Weak') {
                        strengthElement.style.color = 'red';
                    } else if (response.strength === 'Moderate') {
                        strengthElement.style.color = 'orange';
                    } else {
                        strengthElement.style.color = 'green';
                    }
                }
            };
            xhrStrength.send("new_password=" + newPassword);

            if(newPassword.length >= 7) {
                document.getElementById("confirm_password").disabled = false;
            } else {
                document.getElementById("confirm_password").disabled = true;
            }
            
            if (newPassword === "" || confirmPassword === "") {
                // If any field is empty, disable the button and return
                feedbackElement.innerHTML = "<span class='text-danger'>Passwords do not match</span>";
                document.getElementById("update_password_button").disabled = true;
                return;
            }

            // Compare passwords
            var feedbackElement = document.getElementById("confirm_password_feedback");
            if (newPassword === confirmPassword) {
                feedbackElement.innerHTML = "<span class='text-success'>Passwords match</span>";
                document.getElementById("update_password_button").disabled = false;
                return; // Stop execution if passwords don't match
            } else {
                feedbackElement.innerHTML = "<span class='text-danger'>Passwords do not match</span>";
                document.getElementById("update_password_button").disabled = true;
                return; // Stop execution if passwords don't match
            }
        }
    </script>
</html>