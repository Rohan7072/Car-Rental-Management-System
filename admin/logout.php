<?php
// Start or resume the session
session_start();

// Delete all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or any other appropriate page
header("Location: ../index.php"); // Replace "login.php" with your desired redirect URL
exit();
?>