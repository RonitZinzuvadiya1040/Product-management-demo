<?php
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Category</title>
        <link rel="stylesheet" type="text/css" href="css/add-category-product.css" />
    </head>

    <body>
        <div class="card">
            <h2>Add Category</h2>
            <form method="post" action="add-category.php">
                <label for="category_name">Category Name:</label>
                <input type="text" name="category_name" id="category_name" value="" required><br><br>

                <label for="parent_category">Parent Category:</label>
                <select name="parent_category" id="parent_category">
                <option value="">None</option>
                    <?php
                        include "config/database.php";
                        // Assuming you have a database connection established
                        $sql = "SELECT category_id, category_name FROM categories";
                        $result = mysqli_query($mysqli, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                            }
                        }
                        // Close the MySQLi connection
                        $mysqli->close();
                    ?>
                </select><br><br>

                <div class="save-btn">
                    <button type="submit" value="Submit" name="submit" class="submit-button">Add</button>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
    include "admin/session.php";
    include "config/database.php";

    // Initialize parentCategories array
    $parentCategories = array();

    // Fetch parent categories from the database
    $parentCategoriesQuery = "SELECT category_id, category_name FROM categories WHERE parent_category_id IS NULL";
    $parentCategoriesResult = $mysqli->query($parentCategoriesQuery);

    if ($parentCategoriesResult) {
        while ($row = $parentCategoriesResult->fetch_assoc()) {
            $parentCategories[$row['category_id']] = $row['category_name'];
        }
    }

    if (isset($_POST['submit'])) {
        $category_name = $_POST['category_name'];
        $parent_category = $_POST['parent_category'];

        unset($_POST['category_name']);
        unset($_POST['parent_category']);

        // var_dump($_POST['category_name']);
        // exit();

        if (empty($parent_category)) {
            // Insert as a new parent category
            $sql = "INSERT INTO categories (category_name, parent_category_id) VALUES (?, NULL)";
        } else {
            // Insert as a subcategory
            $sql = "INSERT INTO categories (category_name, parent_category_id) VALUES (?, ?)";
        }

        // Prepare the SQL statement
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            if (empty($parent_category)) {
                $stmt->bind_param("s", $category_name);
            } else {
                $stmt->bind_param("ss", $category_name, $parent_category);
            }

            $result = $stmt->execute();

            if ($result) {
                echo "Category added successfully.";
                header("Location: add-category.php");
            } else {
                echo "Error adding the category: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $mysqli->error;
        }
    }
?>