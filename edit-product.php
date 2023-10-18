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
        <form method="post" action="add-product.php" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" required><br><br>

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
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                }
                ?>
            </select><br><br>

            <label for="price_basic">Price Basic:</label>
            <input type="number" name="price_basic" id="price_basic" required><br><br>

            <label for="price_discounted">Price Discounted:</label>
            <input type="number" name="price_discounted" id="price_discounted" required><br><br>

            <label for="small_description">Small Description:</label>
            <textarea name="small_description" rows="3" cols="66" id="small_description" required></textarea><br><br>

            <label for="description">Description in detail:</label>
            <textarea name="description" rows="5" cols="66" id="description" required></textarea><br><br>

            <label for="product_image">Product Images:</label>
            <input type="file" name="product_image[]" id="product_image" accept="uploads/*" multiple />
            <h5>Max file size: 2MB per image</h5>
            <div id="image-preview"></div>
            <input type="submit" value="Upload Images" /><br><br>

            <div class="save-btn">
                <button type="submit" value="Submit" id="submit" class="submit-button">Add</button>
            </div>
        </form>
    </div>
</body>

</html>