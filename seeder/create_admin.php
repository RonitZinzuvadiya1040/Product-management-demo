<?php
require_once('./config/database.php');

$adminEmail = 'admin@gmail.com';
$adminPassword = '123';

$hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

$sqlInsertAdmin = "INSERT INTO admins (firstname, lastname, mobilenumber, email, password) VALUES ('admin', 'webmob', 9033463695, '$adminEmail', '$hashedPassword')";

// Execute the query to create the table
if (mysqli_query($connection, $sqlInsertAdmin)) {
 echo "Data inserted successfully<br>";
} else {
 echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

// Close the database connection
mysqli_close($connection);
