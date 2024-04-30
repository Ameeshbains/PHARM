<?PHP  include "../PRODUCTS.MAIN/class/product.class.php"; ?>
<body>
   <div class="container1">
      <div class="product-details">
         <?php


         // Check if product_id is set in the URL
         if (isset($_GET['product_id'])) {
            // Get the product ID from the URL
            $productId = $_GET['product_id'];

            try {
               // Instantiate the products class
               $products = new Products();
               // Retrieve product details by ID
               $productDetails = $products->getProductById($productId);

               // Check if product details are found
               if ($productDetails) {
                  $productName = $productDetails['productName'];
                  $productPrice = $productDetails['productPrice'];
                  $productImage = $productDetails['productIMG'];
                  // Display product details
                  echo "<img class='product-image' src='/uploaded_img/$productImage' alt='$productName'>";

                  echo "<div class='product-info'>";

                    echo "<h1 class='h1'>$productName</h1>";

                    echo "<p class='price'>Price: $$productPrice</p>";
                    // Add a form to send product data to add_to_cart.php
                    echo "<form action='../PRODUCTS.MAIN/class/product.class.php' method='post'>";

                        echo "<input type='hidden' name='product_name' value='$productName'>";
                        echo "<input type='hidden' name='product_price' value='$productPrice'>";
                        echo "<input type='hidden' name='product_image' value='$productImage'>";
                        echo "<input type='submit' class='btn' value='Add to Cart' name='add_to_cart'>";
                        
                    echo "</form>";

                  echo "</div>"; // Close product-info
               } else {
                  echo "Product not found.";
               }
            } catch(PDOException $e) {
               // If an error occurs, display error message
               echo "Error: " . $e->getMessage();
            }
         } else {
            // Redirect back to the main page if product_id is not set
            header("Location: index.php");
            exit();
         }
         ?>
      </div> <!-- Close product-details -->
   </div> <!-- Close container -->
</body>


</html>
