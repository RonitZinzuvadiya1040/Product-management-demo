<?php

$host = 'localhost';
$database = 'myapp';
$username = 'root';
$password = 'password';

// Create a MySQLi connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection is successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>