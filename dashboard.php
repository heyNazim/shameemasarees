<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .sidebar {
            height: 100vh;
            background-color:rgb(0, 0, 0);
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 56px; /* Adjust if there's a fixed header */
            z-index: 1030;
        }
        .nav-item{
            border: 1px solid #fff;
            margin: 10px 30px;
        }
        .nav-item>button{
            color: #fff;
           
        }

        .sidebar-content {
            display: none;
        }

        .sidebar-content.active {
            display: block;
        }

        @media (min-width: 992px) {
            .sidebar {
                display: block !important;
            }
        }
    </style>
    <script>
        if (!localStorage.getItem('adminData')) {
            window.location.href = 'login.php';
        }
    </script>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar col-lg-3 col-md-4 d-none d-md-block">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <button class="nav-link btn btn-link text-start" onclick="showContent('allPayments')">All Payments</button>
                </li>
                <li class="nav-item">
                        <button class="nav-link btn btn-link text-start" onclick="showContent('secondList')">Create Product</button>
                  </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link text-start" onclick="showContent('thirdList')">All Sarees</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link text-start" onclick="gohome()">Go Home</button>
                 </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link text-start" onclick="logout()">Log Out</button>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <main class="col-lg-9 col-md-8 offset-lg-3 offset-md-4 px-3" id="mainContent">
            <!-- All Payments Content -->
            <div id="allPayments" class="sidebar-content">
                <h1 class="mt-5">All Payment Records</h1>
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
                    echo "<section class='mt-4 mb-5'>";
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
                    echo "</div>";
                    echo "</section>";
                } else {
                    echo "<div class='container text-center mt-3'><p class='alert alert-warning'>No payment details found.</p></div>";
                }
                ?>
            </div>

            <!-- Second List Content -->
            <div id="secondList" class="sidebar-content">
                <form action="insert_product.php" method="POST" enctype="multipart/form-data" class="mt-5 mb-5">
        <h2>Add New Product</h2>
        <input class="form-control" type="text" name="product_name" id="product_name" placeholder="Saree Name" required><br>

        <label for="image">Image:</label>
        <input class="form-control" type="file" name="image" id="image" accept="image/*" required><br>

        <textarea class="form-control" name="description" id="description" rows="3" placeholder="description" required ></textarea><br>

        <input class="form-control" type="text" name="category" id="category" placeholder="category" required><br>

        <input class="form-control" type="number" step="0.01" name="price" id="price" placeholder="price" required><br>

        <input class="form-control" type="number"  name="offer" id="offer" placeholder="Offer" required><br>

        <label for="available_in_stock">Available in Stock:</label>
        <input  type="checkbox" name="available_in_stock" id="available_in_stock" value="1"><br>
        <label for="istopcategory">Is Top Category:</label>
        <input  type="checkbox" name="istopcategory" id="istopcategory" value="0"><br>

        <button class='btn btn-success' type="submit" name="submit">Add Product</button>
    </form>

            </div>

            <!-- Third List Content -->
            <div id="thirdList" class="sidebar-content active">
    <h2>Third List Content</h2>
    <p>This is the content for the third list item.</p>

    <?php
    require_once('db.php'); // Include your database connection file

    // Fetch saree data from the database
    $query = "SELECT * FROM sarees";
    $result = $con->query($query);

    // Check if there are any rows in the result
    if ($result->num_rows > 0):
    ?>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Offer</th>
                        <th>Available in Stock</th>
                        <th>Top Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php if ($row['image']): ?>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="Saree Image" width="100" height="100">
                                <?php else: ?>
                                    <span>No Image</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo number_format($row['price'], 2); ?></td>
                            <td><?php echo number_format($row['offer'], 2); ?>%</td>
                            <td><?php echo $row['available_in_stock'] ? 'Yes' : 'No'; ?></td>
                            <td><?php echo $row['istopcategory'] ? 'Yes' : 'No'; ?></td>
                            <td>
                                <!-- Delete button (form submission with the product_id) -->
                                <form action="delete_product.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                </form>

                                    <!-- Edit button -->
    <a href="edit_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-warning btn-sm w-100 mt-2">Edit</a>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php
    else:
        echo "<p>No products found.</p>";
    endif;

    // Close the database connection
    $con->close();
    ?>
</div>





        </main>
    </div>

    <!-- Toggle Sidebar Button for Mobile -->
    <button class="btn btn-primary d-md-none position-fixed top-0 start-0 m-2" onclick="toggleSidebar()">☰</button>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('d-none');
        }

        function showContent(id) {
            // Hide all sidebar content
            document.querySelectorAll('.sidebar-content').forEach(content => content.classList.remove('active'));
            // Show the selected content
            document.getElementById(id).classList.add('active');
        }
        
        function logout() {
    // Display confirmation dialog
    const confirmation = confirm("Are you sure you want to log out?");
    
    if (confirmation) {
        // If the user confirms, clear the local storage and redirect to the login page
        localStorage.removeItem('adminData');
        window.location.href = 'login.php';
    }
}


        function gohome(){
            window.location.href = 'index.html';  // Redirect to login page after logout
        }
    </script>
</body>
</html>
