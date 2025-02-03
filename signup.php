<?php
include 'connection.php';

// Start session
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

// Register user
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $confirm_password = $_POST['confirm_password'];
    $confirm_password = filter_var($confirm_password, FILTER_SANITIZE_STRING);

    // Check if email already exists
    $select_user = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $select_user->bind_param("s", $username);
    $select_user->execute();
    $result = $select_user->get_result();

    if ($result->num_rows > 0) {
        $message[] = 'Username already exists';
        echo 'Username already exists';
    } else {
        if ($password != $confirm_password) {
            $message[] = 'Passwords do not match';
            echo 'Passwords do not match';
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database
            $insert_user = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $insert_user->bind_param("ss", $username, $hashed_password);
            $insert_user->execute();

            // Redirect to index page
            header('Location: index.php');
            exit();

            // Login the user
            $select_user = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $select_user->bind_param("ss", $username, $hashed_password);
            $select_user->execute();
            $result = $select_user->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['username'];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/signup.css">
    <title>Sign Up - H&N Health Care</title>
</head>
<body>

    <div class="overlay" data-overlay></div>

    <form action="" method="post">
        <div class="form-container">
            <a href="#" class="header-logo">
                <img src="./assets/img/logo.svg" alt="H&N Logo" width="120" height="120">
                <h2>H&N Health Care</h2>
            </a>
            <h2 class="form-title">Sign Up</h2>
            <label class="form-label">
                <span>Username <sup>*</sup></span>
                <input type="text" name="username" required placeholder="Enter your username" maxlength="50" class="form-input">
            </label>
            <label class="form-label">
                <span>Email <sup>*</sup></span>
                <input type="email" name="email" required placeholder="Enter your email" maxlength="50" class="form-input">
            </label>
            <label class="form-label">
                <span>Password <sup>*</sup></span>
                <input type="password" name="password" required placeholder="Enter your password" maxlength="50" class="form-input">
            </label>
            <label class="form-label">
                <span>Confirm Password <sup>*</sup></span>
                <input type="password" name="confirm_password" required placeholder="Confirm your password" maxlength="50" class="form-input">
            </label>
            <button type="submit" name="submit" class="submit-button">Sign Up Now</button>
            <p class="form-footer">Already have an account? <a href="login.php" class="login-link">Login</a></p>
        </div>
    </form>

</body>
</html>
