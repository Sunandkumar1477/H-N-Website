<?php
session_start();
require_once 'connection.php'; // Include your database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $user_id = $_SESSION['user_id']; // Get the logged-in user's ID from the session
    $question_id = $_POST['question_id'];
    $selected_option = $_POST['selected_option'];

    // Validate inputs
    if (!isset($user_id, $question_id, $selected_option)) {
        die('Invalid input');
    }

    // Insert the user's answer into the answers table
    $stmt = $conn->prepare("INSERT INTO answers (user_id, question_id, selected_option) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $question_id, $selected_option);

    if ($stmt->execute()) {
        // Increment the question index for the next question
        $_SESSION['question_index'] = ($_SESSION['question_index'] ?? 0) + 1;

        // Redirect to the question display page to show the next question
        header("Location: display_question.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
