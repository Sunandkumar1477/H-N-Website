<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Clear session data or handle any cleanup if necessary
// session_destroy(); // Uncomment if you want to end the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="assets/css/styles3.css">
    <link rel="stylesheet" href="assets/css/style1.1.css">
    <style>
        .thank-you-container {
            text-align: center;
            margin-top: 50px;
        }
        .thank-you-message {
            font-size: 24px;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <p class="thank-you-message">Thank you for completing the test!</p>
        <p><a href="index.php" class="careers__btn">Return to Home</a></p>
    </div>
</body>
</html>
