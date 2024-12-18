<?php
require_once('db.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if(isset($_POST['submit'])){
    $inputEmail = $_POST['InputEmail'];
    $inputPassword = $_POST['InputPassword'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM `ssadmin` WHERE email = '$inputEmail' AND password = '$inputPassword'";
    $result = $con->query($sql);

    // Check if the query was successful and if the credentials match
    if ($result->num_rows > 0) {
        // Output data of the first row (assuming email is unique)
        $row = $result->fetch_assoc();
        // Store the admin's ID in localStorage
        echo "<script>localStorage.setItem('adminData', '{$row['id']}');";
        echo "window.location.href = 'dashboard.php';</script>";
        exit; // Exit to prevent further execution
    } else {
        echo "Invalid email or password";
    }
}

// Close the connection
$con->close();
?>


        <link rel="icon" href="./images/fav.png" type="image/x-icon" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<section class='mt-5 mb-5'>
    <div class='container'>
        <h1 class='text-center'>ADMIN LOGIN</h1>
    <form method='post' enctype="multipart/form-data">
  <div class="mb-3">
    <label for="InputEmail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="InputEmail"  name="InputEmail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="InputPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="InputPassword" name="InputPassword">
  </div>
        <button name='submit' type="submit" class="btn btn-primary">LOGIN</button>
        <a style='text-decoration:none;' href="/">Back to home...</a>

</form>


    </div>
</section>