<?php
session_start();

if (isset($_SESSION['admin'])) {
    include "admin/session.php";
} else {
    include "user/session.php";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
</head>

<body>
    <!-- Rest of your dashboard content -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar">
                <a class="hover-underline-animation" href="home.php">Home</a>
                <a class="hover-underline-animation" href="add-category.php">Add Category</a>
                <a class="hover-underline-animation" href="add-product.php">Add Product</a>
                <a class="hover-underline-animation" href="view-product.php">View Product</a>
                <a class="hover-underline-animation" href="#" id="logout">Logout</a>
            </div>
        </div>
    </nav>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="js/logout.js"></script>