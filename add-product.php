<?php
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" type="text/css" href="css/add-product.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="js/add-product.js"></script>
    </head>

    <body>
        <div class="card">
            <h2>Add Product</h2>
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
                <script>imagerender();</script>
                <div id="image-preview" class="image-preview"></div>
                <br><br>

                <div class="save-btn">
                    <button type="submit" value="Submit" id="submit" class="submit-button">Add</button>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
    include "admin/session.php";
    include "config/database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $product_name = $_POST["product_name"];
        $product_category = $_POST["product_category"];
        $price_basic = $_POST["price_basic"];
        $price_discounted = $_POST["price_discounted"];
        $small_description = $_POST["small_description"];
        $description = $_POST["description"];
        $uploadedImages = [];

        // Upload and save images
        if (!empty($_FILES['product_image']['name'])) {
            $uploadDirectory = "uploads/"; // Specify your upload directory
            $uploadedImages = uploadImages($_FILES['product_image'], $uploadDirectory);
        }

        $sql = "INSERT INTO products 
        (product_name, product_category, price_basic, price_discounted, small_description, description, image) 
        VALUES ('$product_name', '$product_category', '$price_basic', '$price_discounted', '$small_description', '$description', '$uploadedImages' )";

        if ($mysqli->query($sql) === TRUE) {
            echo '<script>success();</script>';
            // header("Location: view-product.php");
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }

        $mysqli->close();
    }

    function uploadImages($files, $uploadDirectory)
    {
        $uploadedImages = [];
        $maxImageSize = 2 * 1024 * 1024; // 2MB

        foreach ($files['tmp_name'] as $key => $tmp_name) {
            
            $file_name = $files['name'][$key];
            $file_size = $files['size'][$key];
            $file_tmp = $tmp_name;
            $file_type = $files['type'][$key];

            if ($file_size <= $maxImageSize) {
                $unique_id = uniqid();
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $original_filename = pathinfo($file_name, PATHINFO_FILENAME); // Get the original filename without extension
                $unique_filename = $unique_id . '_' . $original_filename . "." . $file_extension; // Combine unique ID, original filename, and file extension
                $target_file = $uploadDirectory . $unique_filename;
                move_uploaded_file($file_tmp, $target_file);
                $uploadedImages[] = $target_file;
            }
        }

        return implode(',', $uploadedImages);
    }
?>
