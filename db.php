<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "razpay";
// $servername = "localhost";
// $username = "u371702595_zubair";
// $password = "Zubair@00786";
// $dbname = "u371702595_razpay";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname); // Use $con for consistency

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
