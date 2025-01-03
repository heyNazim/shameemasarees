<?php
require_once('db.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $offer = $_POST['offer'];
    $available_in_stock = isset($_POST['available_in_stock']) ? 1 : 0;
    $istopcategory = isset($_POST['istopcategory']) ? 1 : 0;

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Validate image file type (e.g., only allow jpeg, png, jpg)
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        $image_type = $_FILES['image']['type'];

        if (in_array($image_type, $allowed_types)) {
            // Get the image content
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
        } else {
            echo "Invalid image format. Please upload a jpeg, jpg, or png file.";
            exit;
        }
    } else {
        $image_data = null; // Set to null if no image is uploaded
    }

    // SQL query to insert data
    $sql = "INSERT INTO sarees (product_name, image, description, category, price, offer, available_in_stock, istopcategory)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $con->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssssdiis", $product_name, $image_data, $description, $category, $price, $offer, $available_in_stock, $istopcategory);

    // Execute the query
    if ($stmt->execute()) {
        echo "Saree added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
