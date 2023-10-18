<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    // Redirect to the login page if not logged in
    header("Location: user-login.php");
    exit();
}

// You can now access the user's email using $_SESSION["email"]
$userEmail = $_SESSION["user"];
?>