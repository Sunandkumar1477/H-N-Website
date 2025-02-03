<?php
session_start();
require_once 'connection.php'; // Include your database connection

// Disable browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Define total test time limit in seconds (30 minutes = 1800 seconds)
$total_test_time_limit = 1800; // 30 minutes

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Check if the user has already started the test
if (!isset($_SESSION['session_start_time'])) {
    $_SESSION['session_start_time'] = time();
}

// Calculate the total time elapsed since the start of the quiz
$time_elapsed_since_start = time() - $_SESSION['session_start_time'];

// Check if the total time limit has been exceeded
if ($time_elapsed_since_start >= $total_test_time_limit) {
    header("Location: logout.php"); // Redirect to logout when 30 minutes have passed
    exit();
}

// Get total number of questions
$total_questions_stmt = $conn->prepare("SELECT COUNT(*) AS total FROM questions");
$total_questions_stmt->execute();
$total_questions_result = $total_questions_stmt->get_result();
$total_questions_row = $total_questions_result->fetch_assoc();
$total_questions = $total_questions_row['total'];

// Handle next question
if (isset($_POST['next_question'])) {
    if ($_SESSION['question_index'] + 1 >= $total_questions) {
        header("Location: logout.php"); // Redirect to logout if it's the last question
        exit();
    } else {
        $_SESSION['question_index'] = ($_SESSION['question_index'] + 1) % $total_questions;
        header("Location: " . $_SERVER['PHP_SELF']); // Reload the current page
        exit();
    }
}

// Log out functionality
if (isset($_POST['logout'])) {
    $_SESSION['logout_time'] = date('Y-m-d H:i:s'); // Set logout time
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to the login page
    exit();
}

// Get the current question index from the session, default to 0
if (!isset($_SESSION['question_index'])) {
    $_SESSION['question_index'] = 0;
}

$question_index = $_SESSION['question_index'];

// Fetch the question from the database
$stmt = $conn->prepare("SELECT * FROM questions ORDER BY id LIMIT 1 OFFSET ?");
$stmt->bind_param("i", $question_index);
$stmt->execute();
$result = $stmt->get_result();
?>
<!-- HTML content continues here -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/logo.svg" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles3.css">
    <link rel="stylesheet" href="assets/css/style1.1.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->

    <title>H&N Health Care</title>
    <style>

        .nav {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            margin-left: 300px;
            margin-top: -80px;
            border-radius: 30px;
        }
        .nav__logo img {
            margin-left: 20px;
            height: 80px;
            width: 200px;
            border-radius: 20px;
        }
        .nav__menu {
            display: flex;
            align-items: center;
            list-style: none;
        }
        .nav__list {
            display: flex;
            margin: 0;
            padding: 0;
        }
        .nav__item {
            margin: 0 15px;
        }
        .nav__link {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            transition: color 0.3s, border-bottom 0.3s;
            position: relative;
        }
        .nav__link.active-link,
        .nav__link:hover {
            color: #e6007e;
        }
        .nav__link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #e6007e;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }
        .nav__link.active-link::after,
        .nav__link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        .nav__toggle,
        .nav__close {
            display: none;
        }
        .scrolled {
            background-color: #f8f8f8;
        }
     
       
    </style>
</head>
<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
    <a href="#" class="nav__logo">
        <img src="assets/img/hnlogo1.2.png" alt="H&N Logo">
    </a>
    <nav class="nav navbar-container">
        
        <div class="nav__menu" id="nav-menu">
            
                <li class="nav__item">
                    <a href="index.php" class="nav__link ">Home</a>
                </li>
             
        </div>   
    </nav>
</header>
<div class="container" style="margin-top: 70px;">
        <?php
        if ($result->num_rows > 0) {
            $question = $result->fetch_assoc();

            // Fetch the options for the current question
            $stmt = $conn->prepare("SELECT * FROM options WHERE question_id = ?");
            $stmt->bind_param("i", $question['id']);
            $stmt->execute();
            $options_result = $stmt->get_result();
            $options = [];
            while ($row = $options_result->fetch_assoc()) {
                $options[$row['option_letter']] = $row['option_text'];
            }

            // Display the question and options
            echo "<div class='question-container'>";
            echo "<h3 class='question-title'>Question " . ($question_index + 1) . ": " . $question['question_text'] . "</h3>";
            echo "<form action='submit_answer.php' method='post' class='question-form'>";
            foreach ($options as $letter => $text) {
                echo "<div class='option'>";
                echo "<input type='radio' name='selected_option' value='$letter' required> $letter) $text";
                echo "</div>";
            }
            echo "<input type='hidden' name='question_id' value='" . $question['id'] . "'>";
            echo "<button type='submit' class='submit-button'>Submit</button>";
            echo "</form>";
            echo "</div>";

        } else {
            echo "<p class='no-questions'>No more questions available.</p>";
        }
        ?>

        <div class="controls">
            <form method='post' class='next-question-form'>
                <button type='submit' name='next_question' class='next-button'>Next Question</button>
            </form>
        </div>

        <!-- Countdown display for total test time -->
        <div class="countdown-container">
            <p id="total-countdown" class="countdown"></p>
        </div>
    </div>

    <script>
        var totalTimeRemaining = <?php echo ($total_test_time_limit - $time_elapsed_since_start) * 1000; ?>; // Total remaining time for the quiz
        var isLastQuestion = <?php echo ($question_index + 1 >= $total_questions) ? 'true' : 'false'; ?>; // Check if this is the last question

        function updateTotalCountdown() {
            // Update total test countdown
            var totalMinutes = Math.floor(totalTimeRemaining / 60000);
            var totalSeconds = Math.floor((totalTimeRemaining % 60000) / 1000);
            document.getElementById('total-countdown').innerText = 
                "Timer: " + totalMinutes + "m " + (totalSeconds < 10 ? "0" : "") + totalSeconds + "s";

            totalTimeRemaining -= 1000;

            if (totalTimeRemaining <= 0) {
                window.location.href = 'logout.php'; // End the test when 30 minutes are up
            }
        }

        // Update the total countdown every second
        setInterval(updateTotalCountdown, 1000);
    </script>

<script>
// Function to log the user out
function autoLogout() {
    window.location.href = 'logout.php'; // Redirect to the logout page
}

// Add an event listener for the visibilitychange event
document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
        // If the page is hidden (user switched tabs or minimized the browser), log them out
        autoLogout();
    }
});
</script>


    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--=============== MAIN JS ===============-->
 
    <!--=============== First animation  ===============-->
    <!-- Include TweenLite library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js'></script>
    <script src="assets/js/script.js"></script>

    <!-- JavaScript for bubbles -->
   

</body>
</html>
