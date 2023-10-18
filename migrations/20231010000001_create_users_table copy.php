<?php

// echo "hi";
$config = require_once(__DIR__ . '/../config/database.php');

$pdo = new PDO(
    "mysql:host=localhost;dbname=" . $config['dbname'],
    $config['username'],
    $config['password']
);

$query = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        mobilenumber VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
";

$pdo->exec($query);
