<?php

include 'config/config.database.login.php';
include "checkout/checkout.class.php";
include "checkout/checkout.class2.php";



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
     
         $cartManager = new CartManager($pdo);
         $cartItems = $cartManager->getCartItems();
         $grand_total = 0;
         if (!empty($cartItems)) {
             foreach ($cartItems as $fetch_cart) {
                 $total_price = number_format($fetch_cart['cartPrice'] * $fetch_cart['cartQuant']);
                 $grand_total += $total_price;
                 echo "<span>{$fetch_cart['cartName']}({$fetch_cart['cartQuant']})</span>";
             }
             echo "<span class='grand-total'> grand total : $$grand_total /- </span>";
         } else {
             echo "<div class='display-order'><span>your cart is empty!</span></div>";
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


   
</body>
</html>