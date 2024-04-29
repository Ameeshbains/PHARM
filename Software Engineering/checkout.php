<?php

@include 'config/config.database.login.php';

if(isset($_POST['order_btn'])){
   
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   
   try {
      $pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $cart_query = $pdo->query("SELECT * FROM `cart`");
      $price_total = 0;
      $product_name = [];
      foreach ($cart_query as $product_item) {
         $product_name[] = $product_item['cartName'] .' ('. $product_item['cartQuant'] .') ';
         $product_price = number_format($product_item['cartPrice'] * $product_item['cartQuant']);
         $price_total += $product_price;
      }

      $total_product = implode(', ', $product_name);
      $detail_query = $pdo->prepare("INSERT INTO `order`(orderName, orderNumber, orderEmail, orderMethod, orderFlat, orderStreet, orderCity, orderState, orderCountry, orderPinCode, orderTotalProducts, orderPrice) VALUES(:name, :number, :email, :method, :flat, :street, :city, :state, :country, :pin_code, :total_product, :price_total)");
      $detail_query->bindParam(':name', $name);
      $detail_query->bindParam(':number', $number);
      $detail_query->bindParam(':email', $email);
      $detail_query->bindParam(':method', $method);
      $detail_query->bindParam(':flat', $flat);
      $detail_query->bindParam(':street', $street);
      $detail_query->bindParam(':city', $city);
      $detail_query->bindParam(':state', $state);
      $detail_query->bindParam(':country', $country);
      $detail_query->bindParam(':pin_code', $pin_code);
      $detail_query->bindParam(':total_product', $total_product);
      $detail_query->bindParam(':price_total', $price_total);
      $detail_query->execute();

      echo "
      <div class='order-message-container'>
         <div class='message-container'>
            <h3>thank you for shopping!</h3>
            <div class='order-detail'>
               <span>".$total_product."</span>
               <span class='total'> total : $".$price_total."/-  </span>
            </div>
            <div class='customer-details'>
               <p> your name : <span>".$name."</span> </p>
               <p> your number : <span>".$number."</span> </p>
               <p> your email : <span>".$email."</span> </p>
               <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
               <p> your payment mode : <span>".$method."</span> </p>
               <p>(*pay when product arrives*)</p>
            </div>
            <a href='./PRODUCTS.MAIN/products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
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
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="/css2/HEADER_MAIN.css">

</head>
<body>

<?php include './Template/NAVBAR.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         try {
            $pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $select_cart = $pdo->query("SELECT * FROM `cart`");
            $total = 0;
            $grand_total = 0;
            foreach ($select_cart as $fetch_cart) {
               $total_price = number_format($fetch_cart['cartPrice'] * $fetch_cart['cartQuant']);
               $grand_total = $total += $total_price;
               echo "<span>{$fetch_cart['cartName']}({$fetch_cart['cartQuant']})</span>";
            }
         } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
         }
         if ($grand_total == 0) {
            echo "<div class='display-order'><span>your cart is empty!</span></div>";
         } else {
            echo "<span class='grand-total'> grand total : $$grand_total /- </span>";
         }
      ?>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. House no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. DUBLIN" name="city" required>
         </div>

         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. WICKLOW" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. IRELAND" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>