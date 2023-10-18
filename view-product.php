<?php
include "admin/session.php";
include "navbar.php";
include "config/database.php";
include "classes/app.class.php";

$app = new App();
// Query to retrieve all records from the "products" table
$query = "SELECT * FROM products";
// print_r($query);
// exit;
$result = mysqli_query($mysqli, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>All Products</title>
    <link rel="stylesheet" type="text/css" href="css/view-product.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <script src="js/view-product.js">
    </script>
    <table id="productTable">
        <tr>
            <th class="image-column">Product Image</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Price Basic</th>
            <th>Price Discounted</th>
            <th>Small Description</th>
            <th>Description in Detail</th>
            <th class="actions">Actions</th>
        </tr>
        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";

            $imagePath = "{$row['image']}";
            // print $imagePath;
            // exit;

            // print_r($row);
            // exit;
            $category_name = $app->get_name($row['product_category']);

            if (file_exists($imagePath)) {
                echo '<td><img src="' . $imagePath . '" alt="Image" style="width: 60px; height: 50px; padding-left: 5px;"></td>';
            } else {
                echo "<td>Image not found</td>";
            }

            echo "<td>{$row['product_name']}</td>";
            echo "<td>$category_name</td>";
            // echo "<td> {$row['product_category']}   </td>";
            echo "<td>{$row['price_basic']}</td>";
            echo "<td>{$row['price_discounted']}</td>";
            echo "<td>{$row['small_description']}</td>";
            echo "<td>{$row['description']}</td>";

            // echo "{$row['id']}";
            // exit;
            echo "<td class='actions'>
                    <form method='post' action='delete-product.php' style='display: inline;'>
                        <input type='hidden' name='product_id' value='{$row['id']}' />
                        <center>
                        <i class='fas fa-edit' onclick=\"editProduct({$row['id']})\"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class='fas fa-trash-alt' onclick=\"confirmDelete({$row['id']})\"></i>
                    </form>
                </td>";

            echo "</tr>";
        }

        function getCategoryNameById($mysqli, $category_id)
        {
            $query = "SELECT category_name FROM categories WHERE id = ?";

            $stmt = mysqli_prepare($mysqli, $query);
            mysqli_stmt_bind_param($stmt, "i", $category_id);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $category_name);
            print_r($category_name);
            exit;
            mysqli_stmt_fetch($stmt);

            mysqli_stmt_close($stmt);

            return $category_name;
        }
        ?>
    </table>
</body>

</html>