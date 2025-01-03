<!DOCTYPE html>
<html lang="en">
  <head>
    <title>NEW LAUNCH SEMI TISSUE SOFT SILK BANARASI SAREES</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keyword" content="best banarasi saree shop in Varanasi, best saree shop in Varanasi, best place to buy banarasi saree in Varanasi, best place to buy saree in Varanasi, best banarasi silk saree shop in Varanasi, banarasi silk saree in Varanasi, banarasi silk saree price in Varanasi, pure banarasi silk sarees price, buy banarasi silk saree online, banarasi silk saree stores in Varanasi">
    <meta name="description" content="At Shameemasarees, you'll find the best selection of Banarasi sarees in Varanasi. We offer the finest Banarasi silk sarees at the best prices. Sarees are ideal for any occasion, whether it's a wedding or a party. Shop online and explore our range of pure Banarasi silk sarees, available in various designs and colours. Visit us today and experience the elegance of Banarasi sarees in Varanasi.">   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  </head>
  <body>



<script>
    function pay_now(event) {
        event.preventDefault();

        // Fetching input values
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();
        var email = jQuery('#email').val();
        var phone = jQuery('#phone').val();
        var address = jQuery('#address').val();

        // Sending data to the backend
        jQuery.ajax({
            type: 'post',
            url: 'payment_process.php',
            data: {
                amt: amt,
                name: name,
                email: email,
                phone: phone,
                address: address
            },
            success: function (result) {
                // Razorpay options
                var options = {
                    // "key": "rzp_test_zpZdWBPgQwjbq0",
                    "key": "rzp_live_9ggYgg6ccV2PqL",
                    "amount": amt * 100, // Amount in paise
                    "currency": "INR",
                   "name": "Shameema sarees",
                    "description": "Test Transaction",
                    "image": "https://shameemasarees.com/images/logo.webp",
                    "prefill": {
                        "name": name,
                        "email": email,
                        "contact": phone
                    },
                    "handler": function (response) {
                        // Send Razorpay payment ID to the server
                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: {
                                payment_id: response.razorpay_payment_id
                            },
                            success: function (result) {
                                window.location.href = "thank_you.php";
                            },
                            error: function (error) {
                                alert("Payment failed. Please try again.");
                                console.log(error);
                            }
                        });
                    },
                    "modal": {
                        "escape": false
                    }
                };

                // Initialize Razorpay and open payment popup
                var rzp1 = new Razorpay(options);
                rzp1.open();
            },
            error: function (error) {
                alert("Error occurred while initiating payment. Please try again.");
                console.log(error);
            }
        });

        return false; // Prevent form from traditional submission
    }
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Checkout detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form onsubmit="return pay_now(event)">
          <input type="text" name="name" id="name" class="form-control mb-3  myshaad " placeholder="Enter your name" required />
          <input type="number" name="amt" id="amt" class="form-control mb-3  myshaad  d-none" placeholder="Enter amount" required />
          <input type="email" name="email" id="email" class="form-control mb-3  myshaad " placeholder="Enter email" required />
          <input type="number" name="phone" id="phone" class="form-control mb-3  myshaad " placeholder="Enter phone number" required />
          <input type="text" name="address" id="address" class="form-control mb-3  myshaad " placeholder="Enter address" required />
          <button type="submit" class="btn btn-dark w-100" name="btn" id="btn">Pay Now</button>
    </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Function to set the value of 'amt' input field
  function setAmount(button) {
      // Get the value of the clicked button
      var amount = button.value;

      // Set the value of the 'amt' input field
      document.getElementById('amt').value = amount;
  }
</script>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <defs>
    <symbol xmlns="http://www.w3.org/2000/svg" id="menu" viewBox="0 0 24 24"><path fill="currentColor" d="M2 6a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1m0 6.032a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1m1 5.033a1 1 0 1 0 0 2h18a1 1 0 0 0 0-2z"/></symbol>
  </defs>
</svg>
  

    <div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>


    
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">

      <div class="offcanvas-header justify-content-between">
        <h4 class="fw-normal text-uppercase fs-6">Menu</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
    
  
        <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
         
                 <li class="nav-item border-dashed">
             <a href="bsaress.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#spices"></use></svg> -->
               <span>Banarasi Sarees</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="semigeogerttesaree.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#baby"></use></svg> -->
               <span>Semi Georgette Sarees</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="linen.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>Linen Tissue Sarees</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="#" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>Organza Sarees</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="Georgette.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>Georgette Sarees</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="banarasi-semi-tisshu-crushed-silk-saree.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>banarasi Semi Tisshue Crushed Saree</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="fabric-kora-organza-saree.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>Fabric Kora Organza Saree</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="banarasi-dybel-tisshu-silk-saree.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>BANARASI DYBEL TISSHU SILK SAREE</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="banarasi-dybel-semi-kora-silk-saree.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>BANARASI DYBEL SEMI KORA SILK SAREE</span>
             </a>
           </li>
      <li class="nav-item border-dashed">
             <a href="new-launch-semi-tissue-soft-silk-banarasi-sarees.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>SEMI TISSUE SOFT SILK BANARASI</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="new-banarsi-handloom-saree.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>BANARASI HANDLOOM SAREE</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="banarasi-dybel-semi-georget-soft-silk-saree.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>BANARASI DYBEL SEMI GEORGET SOFT SILK SARRE</span>
             </a>
           </li>
           <li class="nav-item border-dashed">
             <a href="banarasi-dybel-semi-kora-organza-silk-saree.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
               <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#health"></use></svg> -->
               <span>BANARASI DYBEL SEMI KORA ORGANZA SILK SAREE</span>
             </a>
           </li>
 
           <li class="nav-item border-dashed">
             <button class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2" data-bs-toggle="collapse" data-bs-target="#beverages-collapse" aria-expanded="false">
                 <div class="d-flex gap-3">
                   <!-- <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#beverages"></use></svg> -->
                   <span>Useful links</span>
                 </div>
               </button>
               <div class="collapse" id="beverages-collapse">
                 <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                   <li class="border-bottom py-2"><a href="index.html" class="dropdown-item">Terms and conditions</a></li>
                   <li class="border-bottom py-2"><a href="index.html" class="dropdown-item">Privacy policy</a></li>
                   <li class="border-bottom py-2"><a href="index.html" class="dropdown-item">Refund policy</a></li>
                   <li class="border-bottom py-2"><a href="index.html" class="dropdown-item">Shipping and delivery policy</a></li>
                 </ul>
               </div>
             </li>
         
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
                <form id="search-form" class="text-center" action="index.html" method="post">
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
                <a href="index.html" class="nav-link">Home</a>
              </li>
         <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle pe-3" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu border-0 p-3 rounded-0 shadow" aria-labelledby="pages">
                  <li><a href="/about-us.html" class="dropdown-item">About Us </a></li>
                  <li><a href="/contact-us.html" class="dropdown-item">Contact </a></li>
                  <li><a href="/track-your-order.php" class="dropdown-item">Track Order </a></li>
                  <li><a href="/terms-and-conditions.html" class="dropdown-item">Terms and conditions</a></li>
                  <li><a href="/privacy-policy.html" class="dropdown-item">Privacy Policy</a></li>
                  <li><a href="/refund-policy.html" class="dropdown-item">Refund Policy</a></li>
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



    <section class="pb-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between my-4">
                    <h2 class="section-title mt-5">
                        <?php echo isset($_GET['category']) ? "" . htmlspecialchars($_GET['category']) : "All Products"; ?>
                    </h2>
                    <div class="d-flex align-items-center">
                        <a href="#" class="btn btn-primary rounded-1">View All</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-5">
                <?php
require_once('db.php');

// Check if a category is selected from the URL
$category = isset($_GET['category']) ? $_GET['category'] : '';

// SQL query to retrieve products based on category (if a category is selected)
if ($category) {
    $sql = "SELECT product_id, product_name, image, description, category, price, available_in_stock FROM sarees WHERE category = ?";
} else {
    // If no category is selected, show all sarees
    $sql = "SELECT product_id, product_name, image, description, category, price, available_in_stock FROM sarees";
}

$stmt = $con->prepare($sql);

if ($category) {
    // Bind the category parameter if it's provided
    $stmt->bind_param("s", $category);
}

$stmt->execute();
$result = $stmt->get_result();

// Check if there are any sarees
if ($result->num_rows > 0) {
    // Loop through the results and display each product
    while ($row = $result->fetch_assoc()) {
        // Fetch product details
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $image_data = $row['image'];
        $category = $row['category'];
        $price = $row['price'];
        $available_in_stock = $row['available_in_stock'];
        ?>
        <div class="col mb-3">
            <div class="product-item shadow">
                <figure>
                    <?php
                    // Display image if available
                    if ($image_data) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="' . htmlspecialchars($product_name) . '" class="img-fluid">';
                    } else {
                        echo '<img src="assets/saree/default-image.webp" alt="Product Thumbnail" class="img-fluid">';
                    }
                    ?>
                </figure>
                <div class="d-flex flex-column text-center">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <span class="text-dark fw-semibold">₹<?php echo number_format($price, 2); ?></span>
                    </div>
                    <div class="">
                        <button value="<?php echo $price; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-dark w-100 mt-2 rounded-1 p-2 fs-7 btn-cart" onclick="setAmount(this)">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<div class='col-12'><p>No products found in this category.</p></div>";
}

$stmt->close();

// Close the connection
$con->close();
?>

                </div>
            </div>
        </div>
    </div>
</section>

    <hr>


   
    <footer class="py-5">
      <div class="container-lg">
        <div class="row">

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">

              <h5 class="widget-title">Contact Us</h5>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="#" class="nav-link">J 21/47 Rasoolpura Jaitpura, Varanasi-221001, Uttar Pradesh, INDIA.</a>
                </li>
              </ul>

              <div class="social-links mt-3">
                <ul class="d-flex list-unstyled gap-2">
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg width="16" height="16"><use xlink:href="#facebook"></use></svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://wa.me/+919696860365" target="_blank" class="btn btn-outline-light">
                      <svg width="16" height="16"><use xlink:href="#twitter"></use></svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg width="16" height="16"><use xlink:href="#youtube"></use></svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg width="16" height="16"><use xlink:href="#instagram"></use></svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Useful links</h5>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="/bsaress.html" class="nav-link">Banarasi Sarees</a>
                </li>
                <li class="menu-item">
                  <a href="semigeogerttesaree.html" class="nav-link">Semi Georgette Sarees </a>
                </li>
                <li class="menu-item">
                  <a href="/linen.html" class="nav-link">Linen Tissue Sarees </a>
                </li>
                <li class="menu-item">
                  <a href="/orgenza-saree.html" class="nav-link">Organza Sarees</a>
                </li>
              </ul>
            </div>
          </div>
        
          <div class="col-md-3 col-sm-6">
             <div class="footer-menu">
              <h5 class="widget-title">Help</h5>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="/about-us.html" class="nav-link">About us</a>
                </li>
                <li class="menu-item">
                  <a href="/terms-and-conditions.html" class="nav-link">Terms & Conditions </a>
                </li>
                <li class="menu-item">
                  <a href="/track-your-order.php" class="nav-link">Track Your Order </a>
                </li>
                <li class="menu-item">
                  <a href="/privacy-policy.html" class="nav-link">Privacy & Policy </a>
                </li>
                <li class="menu-item">
                  <a href="/contact-us.html" class="nav-link">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Subscribe Us</h5>
              <p>Subscribe to our newsletter to get updates about our grand offers.</p>
              <form class="d-flex mt-3 gap-0" action="index.html">
                <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="Email Address" aria-label="Email Address">
                <button class="btn btn-dark rounded-end rounded-0" type="submit">Subscribe</button>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
    <div id="footer-bottom">
      <div class="container-lg">
        <div class="row">
          <div class="col-12 text-center copyright">
             <p>© 2024 All Rights Reserved | Designed and Developed by 
                     <a href="https://www.digitalexportsmarketing.com/" target="_blank" rel="noopener noreferrer">
                Innodem pvt ltd.
              </a>
            </p>
          </div>
      
        </div>
      </div>
    </div>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>