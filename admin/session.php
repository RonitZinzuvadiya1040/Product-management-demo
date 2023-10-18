<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION["admin"])) {
    // Redirect to the login page if not logged in
    header("Location: admin-login.php");
    exit();
}

// You can now access the admin's email using $_SESSION["email"]
$adminfname = $_SESSION["firstname"];
