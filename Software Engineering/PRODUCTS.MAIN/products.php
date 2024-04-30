<?php

include "../PRODUCTS.MAIN/class/product.class.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css2/HEADER_MAIN.css">
</head>
<body>
   

<?php include '../Template/NAVBAR.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      try {

         $products = $products->getAllProducts();
         foreach ($products as $fetch_product) {
      ?>

      <form action="" method="post">
         <div class="box">

            <img src="/uploaded_img/<?php echo $fetch_product['productIMG']; ?>" alt="">

            <a href="C:\laragon\www\PHARM\Software Engineering\SINGLE_PRODUCT_PAGE\singleProd.main.php?productId=<?php echo $fetch_product['productID']; ?>">

               <h3><?php echo $fetch_product['productName']; ?></h3>

            </a>


            <div class="price">$<?php echo $fetch_product['productPrice']; ?>/-</div>

      
         
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['productName']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['productPrice']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['productIMG']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         }
      } catch(PDOException $e) {
         echo "Error: " . $e->getMessage();
      }
      ?>

   </div>

</section>

</div>






</body>





</html>





