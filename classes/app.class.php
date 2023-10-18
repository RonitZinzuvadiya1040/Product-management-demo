<?php
include "admin/session.php";


class App
{
    function get_name($category_id)
    {
        include "config/database.php";
        $productQuery = "SELECT category_name FROM categories WHERE category_id = ?";
        $stmt = $mysqli->prepare($productQuery);
        $stmt->bind_param("i", $category_id); // "i" indicates an integer value.
        $stmt->execute();
        $stmt->bind_result($category_name);
        $stmt->fetch();
        $stmt->close();

        return $category_name;
    }
}
