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

// Registration
if (isset($_POST["register"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $mobilenumber = $_POST["mobilenumber"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Insert user data into the database
    $sql = "INSERT INTO users (firstname, lastname, mobilenumber, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firstname, $lastname, $mobilenumber, $email, $password]);

    // Redirect to a success page or login page
    header("Location: user-login.php");
    exit();
}
