<?php
require_once('db.php');

// SQL query to retrieve one product per category
$sql = "SELECT MIN(product_id) AS product_id, product_name, image, description, category, price, available_in_stock
        FROM sarees
        GROUP BY category";
$result = $con->query($sql);

// Check if there are any sarees
if ($result->num_rows > 0) {
    echo "<h2>Products by Category</h2>";

    // Loop through the results and display each product
    while ($row = $result->fetch_assoc()) {
        // Fetch product details
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $image_data = $row['image'];
        $description = $row['description'];
        $category = $row['category'];
        $price = $row['price'];
        $available_in_stock = $row['available_in_stock'];
        $discount = 15; // Example discount percentage
        $discounted_price = $price - ($price * ($discount / 100));
        ?>

        <div class="nav-link swiper-slide shadow-sm p-2 text-center">
            <?php
            // Display image if available
            if ($image_data) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" class="img-fluid" alt="' . htmlspecialchars($product_name) . '">';
            } else {
                echo '<img src="./assets/saree/default-image.webp" class="img-fluid" alt="Category Thumbnail">';
            }
            ?>
            <h4 class="fs-6 mt-3 fw-normal category-title"><?php echo htmlspecialchars($product_name); ?></h4>
            <div class="d-flex justify-content-center align-items-center gap-2">
                <span class="text-dark">₹<?php echo number_format($discounted_price, 2); ?></span>
                <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary"><?php echo $discount; ?>% OFF</span>
            </div>
            <a href="product-category.php?category=<?php echo urlencode($category); ?>" class="btn btn-dark">See More</a>
        </div>

        <?php
    }
} else {
    echo "No sarees found.";
}

// Close the connection
$con->close();
?>
