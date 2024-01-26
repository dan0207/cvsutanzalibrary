<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Library Reminder</title>

</head>

<body style='font-family: Arial, sans-serif; margin: 0; padding: 50px; background-color: #f4f4f4;'>
    <div class='container' style='max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 5px; margin-top: 20px;'>

        <header style='text-align: center; margin-bottom: 30px'>
            <img src='../assets/img/logo.png'>
        </header>
        <h1 style='color: #333; text-align: center;'>Library Reminder</h1>
        <p style='color: #555;'>Dear $name,</p>
        <p style='color: #555;'>We hope this message finds you well. This is a gentle reminder regarding the borrowed book from the library.</p>

        <div class='book-details'>
            <p style='color: #555; margin: 10px'><strong>Transaction No:</strong> $bookAccessNo</p>
            <p style='color: #555; margin: 10px'><strong>Book Title:</strong> $bookTitle</p>
            <p style='color: #555; margin: 10px'><strong>Book Accesstion No:</strong> $bookAccessNo</p>
            <p style='color: #555; margin: 10px'><strong>Book Call No:</strong> $bookCallNo</p>
            <p style='color: #555; margin: 10px'><strong>Pickup Date:</strong> $pickupDate</p>
            <p style='color: #555; margin: 20px 10px; font-size: 30px'><strong>Return Date:</strong> $returnDate</p>
        </div>

        <div class='rules' style='margin-top: 20px; text-align: center; border: solid 1px #333'>
            <h2>Library Rules and Regulations</h2>
            <ul style='text-align: left;'>
                <li>Always present your ID as you enter the library.</li>
                <li>Two (2) non-reserved books can be borrowed at a time by library users.</li>
                <li>Reference books, reserved books, and other specified materials are for library use only.</li>
            </ul>
        </div>

        <p style='color: #555;'>If you have any questions or concerns about the borrowed book or the return process, please do not hesitate to reach out. We are here to assist you.</p>

        <p style='color: #555;'>Thank you for your cooperation, and we appreciate your adherence to our library policies.</p>

        <div class='footer' style='margin-top: 20px;'>
            <p style='color: #555;'>Best regards,<br>
                Cavite State University Tanza Campus Library</p>
        </div>
    </div>
</body>

</html>