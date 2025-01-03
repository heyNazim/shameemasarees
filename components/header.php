<?php
try {
    // Database connection settings (update with your credentials)
    // $host = 'localhost'; 
    // $dbname = 'razpay'; 
    // $username = 'root';
    // $password = ''; 
$servername = "localhost";
$username = "u371702595_zubair";
$password = "Zubair@00786";
$dbname = "u371702595_razpay";


    // Set up the PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to retrieve unique saree names (use DISTINCT to avoid duplicates)
    $query_sidenav = "SELECT DISTINCT product_name, category FROM sarees";
    $stmt = $pdo->prepare($query_sidenav);
    $stmt->execute();

    // Fetch all results into an array
    $sarees = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Handle any errors
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header justify-content-between">
        <h4 class="fw-normal text-uppercase fs-6">Menu</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
            <?php if (is_array($sarees) && count($sarees) > 0): ?>
                <?php foreach ($sarees as $saree): ?>
                    <li class="nav-item border-dashed">
                        <!-- Update the link to include category in the URL -->
                        <a href="product-category.php?category=<?php echo urlencode($saree['category']); ?>" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                            <span><?php echo htmlspecialchars($saree['product_name'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="nav-item">
                    <span class="nav-link text-dark p-2">No sarees available</span>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>




<header>
<div class="container-fluid">
  <div class="row py-3 border-bottom">
    <div class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
      <div class="d-flex align-items-center my-3 my-sm-0">
       <a href="index.php">
          <img src="images/logo.webp" alt="logo" width="50px">
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#menu"></use></svg>
      </button>
    </div>
    
    <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-4">
      <div class="search-bar row bg-light p-2 rounded-4">
        <div class="col-md-6 d-none d-md-block">
          <select class="form-select border-0 bg-transparent">
            <option>All Categories</option>
            <option>Saree</option>
            <option>Lehenga</option>
            <option>Dupatta</option>
            <option>Suits</option>
            <option>Kurta</option>
          </select>
        </div>
        <div class="col-11 col-md-5">
          <form id="search-form" class="text-center" action="index.php" method="post">
            <input type="text" class="form-control border-0 bg-transparent" placeholder="Search products">
          </form>
        </div>
        <div class="col-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/></svg>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <ul class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
        <li class="nav-item active">
          <a href="index.php" class="nav-link">Home</a>
        </li>
   <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle pe-3" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
          <ul class="dropdown-menu border-0 p-3 rounded-0 shadow" aria-labelledby="pages">
            <li><a href="/about-us.php" class="dropdown-item">About Us </a></li>
            <li><a href="/contact-us.php" class="dropdown-item">Contact </a></li>
            <li><a href="/track-your-order.php" class="dropdown-item">Track Order </a></li>
            <li><a href="/terms-and-conditions.php" class="dropdown-item">Terms and conditions</a></li>
            <li><a href="/privacy-policy.php" class="dropdown-item">Privacy Policy</a></li>
            <li><a href="/refund-policy.php" class="dropdown-item">Refund Policy</a></li>
          </ul>
        </li>
      </ul>
    </div>
    
    <div class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
      <ul class="d-flex justify-content-end list-unstyled m-0">
        <li>
          <a href="/login.php" class="p-2 mx-1">
            <svg width="40" height="40"><use xlink:href="#user"></use></svg>
          </a>
        </li>
        
    
      </ul>
    </div>

  </div>
</div>
</header>
