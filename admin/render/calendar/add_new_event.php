<?php
    include '../../render/connection.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../assets/fonts/fonts.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $timeFrom = $_POST['timeFrom'];
        $timeTo = $_POST['timeTo'];
        $date = $_POST['date'];
    
        $sql = "INSERT INTO events (event_title, event_timeFrom, event_timeTo, event_date) VALUES ('$title', '$timeFrom', '$timeTo', '$date')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Event added successfully";
            $redirectUrl = "../../librarypages/eventActivities.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Event</title>
    </head>
    <body>
        <div class="container-fluid mx-auto p-5">
            <form class="card shadow p-2" method="post">
                <div class="text-end">
                    <a class="nav-link p-3" href="../../libraryPages/eventActivities.php"><i class="fa-solid fa-x"></i></a>
                </div>

                <h3 class="text-center">Add new Event</h3>
                
                <div class="form-group mb-2">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-lg-6">
                        <label for="timeFrom">Time From:</label>
                        <input type="time" class="form-control" id="timeFrom" name="timeFrom" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="timeTo">Time To:</label>
                        <input type="time" class="form-control" id="timeTo" name="timeTo" required>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success m-3">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>