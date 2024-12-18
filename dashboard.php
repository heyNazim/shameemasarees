<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
<script>
    if (!localStorage.getItem('adminData')) {
        window.location.href = 'login.php';
    } 
</script>

</head>
<body>
   
<?php  
require_once('db.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch all payment records from the database (no condition applied)
$sql = "SELECT * FROM payment";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Display fetched data in a table
    echo "<section class='mt-4 mb-5'>";
    echo "<div class='container'>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<thead class='table-dark'>";
    echo "<tr>
            <th>Payment ID</th>
            <th>Your Name</th>
            <th>Contact No</th>
            <th>Amount</th>
            <th>Payment Status</th>
            <th>Delivery Status</th>
            <th>Date</th>
            <th>Action</th>
          </tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['payment_id']) . "</td>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['phone']) . "</td>
                <td>" . htmlspecialchars($row['amount']) . "</td>
                <td>" . htmlspecialchars($row['payment_status']) . "</td>
                <td>" . htmlspecialchars($row['delivery_status']) . "</td>
                <td>" . htmlspecialchars($row['added_on']) . "</td>
                <td>
                    <a href='update_delivery_status.php?id=" . $row['payment_id'] . "' class='btn btn-warning btn-sm'>Update Delivery Status</a>
                </td>
              </tr>";
    }
    echo "</tbody>";
    echo "</table>";

    // Add Back to Home Link after the table
    echo "<div class='text-center mt-4'>";
    echo "<a href='./index.html' class='btn btn-outline-primary'>Back to Home</a>";
    echo "<button id='logoutButton' class='btn btn-outline-danger ml-3'>Logout</button>";
    echo "</div>";
    
    echo "
    <script>
        document.getElementById('logoutButton').addEventListener('click', function() {
            // Clear the 'adminData' key from local storage
            localStorage.removeItem('adminData');
            // Redirect to 'login.php'
            window.location.href = './login.php';
        });
    </script>
    ";
    

    echo "</div>";
    echo "</div>";
    echo "</section>";
} else {
    echo "<div class='container text-center mt-3'><p class='alert alert-warning'>No payment details found.</p></div>";
}

?>
</body>
</html>
