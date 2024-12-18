
<?php
require_once('db.php'); // Include the database connection file

// Check if the 'payment_id' parameter is passed in the URL
if (isset($_GET['id'])) {
    $payment_id = $_GET['id'];

    // Fetch the current record for the given payment_id
    $sql = "SELECT * FROM payment WHERE payment_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $payment_id);  // Use 's' for string (since payment_id is a string)
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the record
        $row = $result->fetch_assoc();
        $current_status = $row['delivery_status'];  // Current delivery status
    } else {
        echo "No record found for Payment ID: " . $payment_id;
        exit();
    }

    // Handle form submission to update the delivery status
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_status = $_POST['delivery_status']; // Get the new delivery status from the form

        // Update the delivery status in the database
        $updateSql = "UPDATE payment SET delivery_status = ? WHERE payment_id = ?";
        $updateStmt = $con->prepare($updateSql);
        $updateStmt->bind_param("ss", $new_status, $payment_id);  // 's' for string (for both parameters)

        if ($updateStmt->execute()) {
            echo "<div class='container text-center mt-3'><p class='alert alert-success'>Delivery status updated successfully!</p></div>";
            header("refresh:2;url=dashboard.php"); // Redirect after 2 seconds to the list of records
        } else {
            echo "<div class='container text-center mt-3'><p class='alert alert-danger'>Error updating delivery status: " . $con->error . "</p></div>";
        }
    }
} else {
    echo "No Payment ID provided.";
    exit();
}

$con->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Delivery Status</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

<script>
    
if (!localStorage.getItem('adminData')) {
    window.location.href = 'login.php';
} 
</script>

</head>
<body>
    <div class="container mt-5">
        <h2>Update Delivery Status for Payment ID: <?php echo htmlspecialchars($payment_id); ?></h2>

        <!-- Form to update delivery status -->
        <form method="POST" action="update_delivery_status.php?id=<?php echo htmlspecialchars($payment_id); ?>">
            <div class="mb-3">
                <label for="delivery_status" class="form-label">Delivery Status</label>
                <select id="delivery_status" name="delivery_status" class="form-select">
                    <option value="Pending" <?php echo ($current_status == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                    <option value="Delivered" <?php echo ($current_status == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                    <option value="Shipped" <?php echo ($current_status == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                    <option value="Cancelled" <?php echo ($current_status == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
        
        <br>
        <a href="dashboard.php" class="btn btn-secondary">Back to Records</a>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
