<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section class='mt-5 mb-5'>
        <div class="container">
            <form method="post" class="shadow p-4 rounded bg-light" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <a href="javascript:history.back()" title="Go Back" style="text-decoration: none; font-size: 14px;">&#8592; Go Back</a>
                <h1 class="mb-3 text-center">Track Your Orders</h1>

                <p class="text-center">Your payment ID and phone number were sent to you via email when you purchased the product. You can find the payment ID and phone number required to track your order.</p>
                <input class="form-control mb-3" type="text" name="payment_id" id="payment_id" required placeholder="Enter Your Payment ID">
                <input class="form-control mb-3" type="text" name="phone" id="phone" required placeholder="Enter Your Phone No.">
                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Track Order</button>
                </div>
            </form>
        </div>
    </section>

<?php  
require_once('db.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_id = $_POST['payment_id'];
    $phone = $_POST['phone'];

    // Fetch payment details from the database
    $sql = "SELECT * FROM payment WHERE payment_id = '$payment_id' AND phone = '$phone'";
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
                  </tr>";
        }
        echo "</tbody>";
        echo "</table>";

            // Add Back to Home Link after the table
            echo "<div class='text-center mt-4'>";
            echo "<a href='./index.html' class='btn btn-outline-primary'>Back to Home</a>";
            echo "</div>";


        echo "</div>";
        echo "</div>";
        echo "</section>";
    } else {
        echo "<div class='container text-center mt-3'><p class='alert alert-warning'>No payment details found for the given Payment ID and Phone number.</p></div>";
    }
}
?>
</body>
</html>
