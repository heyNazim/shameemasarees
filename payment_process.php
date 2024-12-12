<?php
session_start();
include('db.php');

// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if (isset($_POST['amt']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])) {
    $amt = $_POST['amt'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment_status = "pending";
    $added_on = date('Y-m-d H:i:s');

    // Insert data into the database
    $query = "INSERT INTO payment (name, email, phone, address,  amount, payment_status, added_on) VALUES ('$name', '$email', '$phone', '$address',  '$amt', '$payment_status', '$added_on')";
    if (mysqli_query($con, $query)) {
        $_SESSION['OID'] = mysqli_insert_id($con);
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    $oid = $_SESSION['OID'];

    // Update payment status
    $update_query = "UPDATE payment SET payment_status='complete', payment_id='$payment_id' WHERE id='$oid'";
    if (mysqli_query($con, $update_query)) {
        echo "Payment status updated successfully.";
    } else {
        echo "Error updating payment status: " . mysqli_error($con);
    }
}
?>
