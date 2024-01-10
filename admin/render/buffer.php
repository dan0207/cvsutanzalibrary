<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Return</title>

    <!-- Bootstrap style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    
</head>
    <body>

        <div class="container-fluid p-5" style="text-align: justify;">
            <h4 style="letter-spacing: .2rem;">
                Your feedback means a lot to us! If there's anything specific you liked or think we can improve, feel free to let us know.

                <!-- Button to trigger the goBack function -->
                <button class="btn btn-success ms-5" onclick="goBack()">Go Back</button>
            </h4>

            
        </div>
        
        <script>
        // Function to go back to the previous page
        function goBack() {
            window.history.back();
        }
    </script>
    </body>
</html>
