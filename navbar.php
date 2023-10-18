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

    <style>
        .container-fluid {
            height: 50px;
        }

        .navbar {
            /* background-color: #333; */
            overflow: hidden;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: grey !important;
            text-align: center;
            padding: 10px 16px;
            text-decoration: none !important;
        }

        #logout:hover {
            color: red !important;
        }

        .hover-underline-animation {
            display: inline-block;
            position: relative;
            color: #0087ca;
        }

        .hover-underline-animation:after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #0087ca;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        .hover-underline-animation:hover {
            color: white !important;
        }


        .hover-underline-animation:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
    </style>
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
<script>
    document.getElementById("logout").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default link behavior

        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you really want to log out?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, logout',
            cancelButtonText: 'No, cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "logout.php";
            }
        });
    });
</script>