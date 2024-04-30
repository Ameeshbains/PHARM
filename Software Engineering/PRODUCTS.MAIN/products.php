<?php
// Include the product class file
include "../PRODUCTS.MAIN/class/product.class.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="../css2/HEADER_MAIN.css">
   <link rel="stylesheet" href="./PRODUCTS.MAIN/css/product.main.css">
</head>
<body>
   
<?php include '../Template/NAVBAR.php'; ?>

<div class="container">
   <section class="products">
      <h1 class="heading">latest products</h1>
      <div class="box-container">

         <?php
         try {
            // Instantiate the products class
            $products = new products();
            // Retrieve all products
            $productsList = $products->getAllProducts();
            // Loop through each product
            foreach ($productsList as $fetch_product) {
         ?>

         <form action="" method="post">
            <div class="box">
               <!-- Display product image -->
               <img src="/uploaded_img/<?php echo $fetch_product['productIMG']; ?>" alt="">

               <!-- Display product name -->
               <h3><?php echo $fetch_product['productName']; ?></h3>

               <!-- Display product price -->
               <div class="price">$<?php echo $fetch_product['productPrice']; ?>/-</div>
               <!-- Hidden form inputs to pass product details -->
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['productName']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['productPrice']; ?>">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['productIMG']; ?>">

               <a href="../SINGLE_PRODUCT_PAGE/singleProd.main.php?product_id=<?php echo $fetch_product['productID']; ?>" class="btn">View Details</a>
               
               <input type="submit" class="btn" value="add to cart" name="add_to_cart">
            </div>
         </form>

         <?php
            }
         } catch(PDOException $e) {
            // If an error occurs, display error message
            echo "Error: " . $e->getMessage();
         }
         ?>

      </div>
   </section>
</div>

</body>
</html>
