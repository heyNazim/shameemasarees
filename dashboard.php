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
                    <button class="nav-link btn btn-link text-start" onclick="gohome()">Go Home</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link text-start" onclick="logout()">Log Out</button>
                </li>
                <!-- <li class="nav-item">
                    <button class="nav-link btn btn-link text-start" onclick="showContent('secondList')">Second List</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link text-start" onclick="showContent('thirdList')">Third List</button>
                </li> -->
            </ul>
        </nav>

        <!-- Content -->
        <main class="col-lg-9 col-md-8 offset-lg-3 offset-md-4 px-3" id="mainContent">
            <!-- All Payments Content -->
            <div id="allPayments" class="sidebar-content active">
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
                <h2>Second List Content</h2>
                <p>This is the content for the second list item.</p>
            </div>

            <!-- Third List Content -->
            <div id="thirdList" class="sidebar-content">
                <h2>Third List Content</h2>
                <p>This is the content for the third list item.</p>
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
