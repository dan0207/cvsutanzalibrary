<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Button</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .feedback-button {
            position: fixed;
            right: 0;
            /* Adjust the position as needed */
            top: 0;
            transform: translateX(50%) translateY(50%) rotate(90deg);
            background-color: #007bff;
            /* Button background color */
            color: #fff;
            /* Button text color */
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            z-index: 1000;
            /* Make sure the button is on top of other elements */
        }

        /* Optional: Add hover effect */
        .feedback-button:hover {
            background-color: #0056b3;
            /* Hovered state background color */
        }
    </style>
</head>

<body>

    <button class="feedback-button">Feedback</button>

</body>

</html>