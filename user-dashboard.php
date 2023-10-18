<?php
include "user/session.php";
// include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <style>
        /* Basic CSS for the navbar */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* css for table */
        #users {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #users td,
        #users th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #users tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #users th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Rest of your dashboard content -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar">
                <a class="hover-underline-animation" href="">Home</a>
                <a class="hover-underline-animation" href="">Products</a>
                <a class="hover-underline-animation" href="">My Product</a>
                <a class="hover-underline-animation" href="">Cart</a>
                <a class="hover-underline-animation" href="logout.php" id="logout">Logout</a>
            </div>
        </div>
    </nav>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="js/logout.js"></script>

</html>