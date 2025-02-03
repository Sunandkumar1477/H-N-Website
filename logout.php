<?php
session_start();
$_SESSION['logout_time'] = date('Y-m-d H:i:s'); // Set logout time
session_destroy(); // Destroy the session
header("Location: login.php"); // Redirect to the login page
exit();
?>
