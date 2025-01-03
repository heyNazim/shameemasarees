<?php
require_once('db.php'); // Include your database connection file

// Check if the product_id is passed through POST
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // SQL query to delete the product
    $sql = "DELETE FROM sarees WHERE product_id = ?";
    
    // Prepare the statement
    if ($stmt = $con->prepare($sql)) {
        // Bind the parameter (product_id)
        $stmt->bind_param("i", $product_id);

        // Execute the query
        if ($stmt->execute()) {
            echo "Product deleted successfully!";
            header("Location: dashboard.php"); // Redirect back to the page (change 'your_page.php' accordingly)
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }

    // Close the connection
    $con->close();
} else {
    echo "No product ID provided.";
}
?>
