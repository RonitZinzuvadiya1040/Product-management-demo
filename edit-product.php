<?php
    include "navbar.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="css/add-category-product.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/add-product.js"></script>
</head>

<body>
    <div class="card">
        <h2>Edit Product</h2>
        <?php
            // Include necessary files and establish a database connection
            include "admin/session.php";
            include "config/database.php";
            include "classes/app.class.php";

            // Check if a product ID is provided in the URL
            if (isset($_GET['product_id'])) {
                $product_id = $_GET['product_id'];

                // Fetch the existing product details from the database
                $query = "SELECT * FROM products WHERE id = $product_id";
                $result = mysqli_query($mysqli, $query);
                $product = mysqli_fetch_assoc($result);

                if (!$product) {
                    // Handle the case where the product with the given ID is not found
                    echo "Product not found.";
                    exit;
                }

                // Handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve and validate the new product data
                    $product_name = $_POST['product_name'];
                    $product_category = $_POST['product_category'];
                    $price_basic = $_POST['price_basic'];
                    $price_discounted = $_POST['price_discounted'];
                    $small_description = $_POST['small_description'];
                    $description = $_POST['description'];

                    // Update the database with the new product data using prepared statements
                    $update_query = "UPDATE products SET 
                                    product_name = ?,
                                    product_category = ?,
                                    price_basic = ?,
                                    price_discounted = ?,
                                    small_description = ?,
                                    description = ?
                                    WHERE id = ?";

                    $stmt = mysqli_prepare($mysqli, $update_query);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "ssddssi", $product_name, $product_category, $price_basic, $price_discounted, $small_description, $description, $product_id);

                        if (mysqli_stmt_execute($stmt)) {
                            // Redirect back to view-product.php after updating
                            header('Location: view-product.php');
                            exit;
                        } else {
                            echo "Error updating product: " . mysqli_error($mysqli);
                        }

                        mysqli_stmt_close($stmt);
                    }
                }
            } else {
                // Handle cases where the product ID is not provided.
                echo "Product ID not provided.";
                exit;
            }
        ?>
        <form method="post" action="edit-product.php?product_id=<?php echo $product_id; ?>" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" value="<?php echo $product['product_name']; ?>" required><br><br>

            <label for="product_category">Product Category:</label>
            <select name="product_category" id="product_category">
                <option value="">None</option>
                <?php
                // PHP code for populating the product category dropdown
                include "config/database.php";
                $sql = "SELECT category_id, category_name FROM categories";
                $result = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($product['product_category'] == $row['category_id']) ? 'selected' : '';
                        echo "<option value='" . $row['category_id'] . "' $selected>" . $row['category_name'] . "</option>";
                    }
                }
                ?>
            </select><br><br>

            <label for="price_basic">Price Basic:</label>
            <input type="number" name="price_basic" id="price_basic" value="<?php echo $product['price_basic']; ?>" required><br><br>

            <label for="price_discounted">Price Discounted:</label>
            <input type="number" name="price_discounted" id="price_discounted" value="<?php echo $product['price_discounted']; ?>" required><br><br>

            <label for="small_description">Small Description:</label>
            <textarea name="small_description" rows="3" cols="66" id="small_description" required><?php echo $product['small_description']; ?></textarea><br><br>

            <label for="description">Description in detail:</label>
            <textarea name="description" rows="5" cols="66" id="description" required><?php echo $product['description']; ?></textarea><br><br>

            <label for="product_image">Product Images:</label>
            <input type="file" name="product_image[]" id="product_image" accept="uploads/*" multiple />
            <h5>Max file size: 2MB per image</h5>
            <div id="image-preview"></div>
            <img src="<?php echo $product['image']; ?>" alt="Image" style="width: 60px; height: 50px; padding-left: 5px;">
            <br><br>

            <div class="save-btn">
                <button type="submit" value="Submit" id="submit" class="submit-button">Update</button>
            </div>
        </form>
    </div>
</body>

</html>