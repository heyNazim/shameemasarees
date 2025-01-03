<!-- New Section: Top Category Sarees -->
<section class="py-5 overflow-hidden">
   <div class="container-lg">
      <div class="section-header d-flex justify-content-between mb-3">
         <h2 class="section-title mt-5">Top Category Sarees</h2>
      </div>

      <div class="row">
         <?php
         require_once('db.php');

         // SQL query to retrieve sarees where istopcategory is true
         $query_top_sarees = "SELECT product_id, product_name, image, price FROM sarees WHERE istopcategory = 1";
         $result_top_sarees = $con->query($query_top_sarees);

         // Check if there are any top category sarees
         if ($result_top_sarees->num_rows > 0) {
            // Loop through the results and display each product
            while ($saree_data = $result_top_sarees->fetch_assoc()) {
               $saree_id = $saree_data['product_id'];
               $saree_name = $saree_data['product_name'];
               $saree_image = $saree_data['image'];
               $saree_price = $saree_data['price'];
         ?>
               <div class="col-md-3 col-sm-6 col-12 mb-4">
                  <div class="card">
                     <?php
                     // Display image if available
                     if ($saree_image) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($saree_image) . '" class="card-img-top" alt="' . htmlspecialchars($saree_name) . '">';
                     } else {
                        echo '<img src="./assets/saree/default-image.webp" class="card-img-top" alt="Category Thumbnail">';
                     }
                     ?>
                     <div class="card-body text-center">
                        <h5 class="card-title"><?php echo htmlspecialchars($saree_name); ?></h5>
                        <p class="card-text">₹<?php echo number_format($saree_price); ?></p>
                        <a href="product-category.php?category=<?php echo urlencode($saree_name); ?>" class="btn btn-primary">See More</a>
                     </div>
                  </div>
               </div>
         <?php
            }
         } else {
            echo "<p>No top category sarees found.</p>";
         }

         // Close the connection after data fetching is complete
         $con->close();
         ?>
      </div>
   </div>
</section>
