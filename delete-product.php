<?php
include "admin/session.php";
include "config/database.php";

// $id = $_GET['id'];
// echo $id;
// exit;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete the product record based on the provided product ID
    $delete_query = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($mysqli, $delete_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            // Product deleted successfully
            header("Location: view-product.php"); // Redirect to the product listing page
            exit();
        } else {
            // Handle deletion error
            echo "Failed to delete the product. Please try again.";
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle SQL statement preparation error
        echo "Error preparing the delete statement.";
    }
} else {
    // Handle invalid or missing product ID
    echo "Invalid product ID.";
}

include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>
<body>
    <!-- Your HTML content for the delete confirmation page, if needed -->
</body>
</html>
