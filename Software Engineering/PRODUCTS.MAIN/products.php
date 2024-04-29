<?php

@include './config/config.database.login.php';

if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   try {
      $pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $select_cart = $pdo->prepare("SELECT * FROM `cart` WHERE cartName = :product_name");
      $select_cart->bindParam(':product_name', $product_name);
      $select_cart->execute();

      if($select_cart->rowCount() > 0){
         $message[] = 'product already added to cart';
      } else {
         $insert_product = $pdo->prepare("INSERT INTO `cart`(cartName, cartPrice, cartIMG, cartQuant) VALUES(:product_name, :product_price, :product_image, :product_quantity)");
         $insert_product->bindParam(':product_name', $product_name);
         $insert_product->bindParam(':product_price', $product_price);
         $insert_product->bindParam(':product_image', $product_image);
         $insert_product->bindParam(':product_quantity', $product_quantity);
         $insert_product->execute();
         $message[] = 'product added to cart successfully';
      }
   } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
   }
}

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
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include '../Template/NAVBAR.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      try {
         $pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $select_products = $pdo->query("SELECT * FROM `product`");
         foreach ($select_products as $fetch_product) {
      ?>

      <form action="" method="post">
         <div class="box">

            <img src="/uploaded_img/<?php echo $fetch_product['productIMG']; ?>" alt="">

            <h3><?php echo $fetch_product['productName']; ?></h3>

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
