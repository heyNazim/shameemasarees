<?php
// Connect to your database
include('db.php');

// Get the product ID from the URL
$product_id = $_GET['product_id'];

// Fetch product details from the database
$query = "SELECT * FROM sarees WHERE product_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found!";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $offer = $_POST['offer'];
    $available_in_stock = isset($_POST['available_in_stock']) ? 1 : 0;
    $istopcategory = isset($_POST['istopcategory']) ? 1 : 0;

    // Update the product in the database
    $update_query = "UPDATE sarees SET product_name = ?, description = ?, category = ?, price = ?, offer = ?, available_in_stock = ?, istopcategory = ? WHERE product_id = ?";
    $update_stmt = $con->prepare($update_query);
    $update_stmt->bind_param('sssdiiii', $product_name, $description, $category, $price, $offer, $available_in_stock, $istopcategory, $product_id);
    $update_stmt->execute();

    // Redirect back to the product list after update
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for Centering and Styling -->
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            max-width: 600px;
            padding: 30px;
            margin:40px 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }
        .form-control {
            height: 40px;
            font-size: 16px;
        }
        .form-control:focus {
            box-shadow: 0 0 8px rgba(38, 143, 255, 0.7);
            border-color: #28a745;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2 class="">Edit Product</h2>
        <form action="edit_product.php?product_id=<?php echo $product_id; ?>" method="POST">
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required><?php echo htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="<?php echo htmlspecialchars($product['category'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="<?php echo htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div class="form-group">
            <label for="offer">Offer (%)</label>
            <input type="number" name="offer" id="offer" class="form-control" value="<?php echo htmlspecialchars($product['offer'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div class="form-group">
            <label for="available_in_stock">Available in Stock</label>
            <input type="checkbox" name="available_in_stock" id="available_in_stock" <?php echo $product['available_in_stock'] ? 'checked' : ''; ?>>
        </div>
        <div class="form-group">
            <label for="istopcategory">Top Category</label>
            <input type="checkbox" name="istopcategory" id="istopcategory" <?php echo $product['istopcategory'] ? 'checked' : ''; ?>>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
