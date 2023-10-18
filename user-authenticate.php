<?php
session_start();

// Database configuration (replace with your credentials)
$host = "localhost";
$dbname = "myapp";
$username = "root";
$password = "password";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user data from the database by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        // Login successful, store user information in session

        $_SESSION["user"] = $email;

        // Redirect to a dashboard or user profile page
        header("Location: user-dashboard.php");
        exit();
    } else {
        // Login failed, display an error message
        header("Location: user-login.php");
        $login_error = "Invalid email or password.";
    }
}