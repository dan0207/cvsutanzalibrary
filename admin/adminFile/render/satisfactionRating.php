<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satisfaction Rating</title>
    
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

</head>

    <body>
        <div id="feedbackBtn">
            FEEDBACK
        </div>
        <div id="satisfaction-rating" class="satisfaction-rating border p-2">
            <div class="border text-center mb-2">
                <h5>Library Feedback Form</h5>
                <span>We Welcome your comments and suggestions.</span>
            </div>

            
                

            <div class="border">
                <form class="p-2" action="#" method="post">
                        <label for="">Rate:</label>
                    <div class="stars">
                        <input class="star star-5" id="star-5" type="radio" name="rating" value="5"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="rating" value="4"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="rating" value="3"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="rating" value="2"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="rating" value="1"/>
                        <label class="star star-1" for="star-1"></label>
                    </div>

                    <label for="">What kind of comment would you like to send?</label>

                    <input type="radio" name="category" id="rad1" value="Complaint" required>
                    <label for="rad1">Complaint</label><br>

                    <input type="radio" name="category" id="rad2" value="Problem" required>
                    <label for="rad2">Problem</label><br>

                    <input type="radio" name="category" id="rad3" value="Suggestion" required>
                    <label for="rad3">Suggestion</label><br>

                    <input type="radio" name="category" id="rad4" value="Praise" required>
                    <label for="rad4">Praise</label>

                    <label for="subject">What about the library do you want to comment on?</label>
                    <input class="form-control" type="text" name="subject" required autocomplete="off">
                    <label for="comment">Enter your comments in the space provided: </label>
                    <textarea class="form-control p-2" name="comment" id="" cols="30" rows="5" style="resize: none" required autocomplete="off"></textarea>
                    <button class="btn mt-3" type="submit">SUBMIT</button>
                </form>

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Get form data
                        $category = $_POST["category"];
                        $subject = $_POST["subject"];
                        $rating = $_POST["rating"];
                        $comment = $_POST["comment"];

                        // Set the timezone to Philippines
                        date_default_timezone_set('Asia/Manila');

                        // Get the current date and time
                        $date = date("m/d/Y");
                        $time = date("h:i A");

                        // SQL query using prepared statements to insert data into the database
                        $sql = "INSERT INTO satisfactionrating (Category, Subject, Ratings, Comments, Date, Time) VALUES (?, ?, ?, ?, ?, ?)";

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssss", $category, $subject, $rating, $comment, $date, $time);

                        
                        
                        if ($stmt->execute()) {
                            echo "<script>window.location.href = '../render/buffer.php';</script>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                ?>

                    
            </div>
        </div>

        <script>
            // user satisfaction rating 
            const ratingToggle = document.getElementById('feedbackBtn');
            const satisfactionRating = document.getElementById('satisfaction-rating');

            ratingToggle.onclick = function() {
                    ratingToggle.classList.toggle('active');
                    satisfactionRating.classList.toggle('active');
            }
        </script>
    </body>

</html>