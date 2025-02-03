<?php
include 'connection.php';

// Start session
session_start();

// Initialize user_id
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

$message = []; // Initialize an empty array for error/success messages

// Check if the user is already logged in
if ($user_id) {
    $message[] = 'You are already logged in.';
    // Redirect to the home page or any other page if already logged in
    header("Location: display_question.php");
    exit();
}

// Login user
if (isset($_POST['submit'])) {
    $username = isset($_POST['username']) ? filter_var($_POST['username'], FILTER_SANITIZE_STRING) : '';
    $password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : '';

    // Check if username and password are set
    if (!empty($username) && !empty($password)) {
        // Use a prepared statement to prevent SQL injection
        $select_user = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $select_user->bind_param('s', $username);
        $select_user->execute();
        $result = $select_user->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Verify the password
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['username'];

                // Redirect the user to exam.php after successful login
                header("Location: display_question.php");
                exit();
            } else {
                $message[] = 'Incorrect username or password';
            }
        } else {
            $message[] = 'Incorrect username or password';
        }
    } else {
        $message[] = 'Username and password are required';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - H&N Health Care</title>
    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #6d5dfc, #b55dfa);
    color: #333;
    overflow: hidden;
}

/* Background Overlay */
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: -1;
}

/* Form container */
.form {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
    text-align: center;
    animation: slideIn 1s ease-in-out;
}

/* Slide-in animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Header logo and text */
.header-logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
    text-decoration: none;
    color: white;
}

.header-logo img {
    border-radius: 50%;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    margin-bottom: 10px;
    transition: transform 0.3s ease;
}

.header-logo img:hover {
    transform: scale(1.1);
}

.header-logo h2 {
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

/* Form Labels and Inputs */
label {
    display: block;
    margin-bottom: 15px;
    text-align: left;
    color: white;
    font-weight: bold;
    font-size: 14px;
    letter-spacing: 0.5px;
}

label span {
    display: block;
    margin-bottom: 5px;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background-color: rgba(255, 255, 255, 0.15);
    color: white;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    transition: all 0.3s ease;
    outline: none;
}

input[type="text"]::placeholder, input[type="password"]::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

/* Input focus effect */
input[type="text"]:focus, input[type="password"]:focus {
    background-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Submit button */
.submit {
    width: 100%;
    padding: 12px;
    background-color: #6d5dfc;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-top: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.submit:hover {
    background-color: #5745eb;
    transform: translateY(-3px);
}

/* Error/Success messages */
p {
    margin-top: 10px;
    color: #ff4d4d; /* Red for error */
    font-size: 14px;
}

    </style>
</head>
<body>
    <div class="overlay" data-overlay></div>

    <form action="" method="post">
        <div class="form log-in">
            <a href="index.php" class="header-logo">
                <img src="./assets/img/logo.svg" alt="H&N Logo" width="120" height="120">
                <h2>HOME</h2>
            </a>
       

            <label>
                <span>USER ID <sup>*</sup></span>
                <input type="text" name="username" required placeholder="Enter your username" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g, '')">
            </label>
            <label>
                <span>Password <sup>*</sup></span>
                <input type="password" name="password" required placeholder="Enter your password" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g, '')">
            </label>
      
            <button type="submit" name="submit" class="submit">Login</button><br>
    

            <?php 
                // Display error/success messages
                foreach ($message as $msg) {
                    echo '<p>' . htmlspecialchars($msg) . '</p>';
                }
            ?>
        </div>
    </form>
</body>
</html>
