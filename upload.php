<?php
include "admin/session.php";
include "navbar.php";
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $price_basic = $_POST['price_basic'];
    $price_discounted = $_POST['price_discounted'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];

    // File upload
    $uploadDirectory = 'uploads/'; // Directory where uploaded images will be stored

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $imagePaths = array(); // To store paths of uploaded images

    foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
        $image_name = $_FILES['image']['name'][$key];
        $image_tmp = $_FILES['image']['tmp_name'][$key];

        // Move uploaded file to the designated directory
        $imagePath = $uploadDirectory . $image_name;
        move_uploaded_file($image_tmp, $imagePath);

        $imagePaths[] = $imagePath;
    }

    // Insert product data into the database
    $sql = "INSERT INTO products (product_name, product_category, price_basic, price_discounted, small_description, description, images) 
            VALUES ('$product_name', '$product_category', '$price_basic', '$price_discounted', '$small_description', '$description', '" . implode(",", $imagePaths) . "')";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>