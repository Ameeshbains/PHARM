<?php

@include './config/config.database.login.php';

try {
   $pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   die("Database connection failed: " . $e->getMessage());
}

if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    try {
        $stmt = $pdo->prepare("UPDATE `cart` SET cartQuant = ? WHERE cartID = ?");
        $stmt->execute([$update_value, $update_id]);
        header('location:cart.php');
    } catch (PDOException $e) {
        // Handle error
    }
}

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    try {
        $stmt = $pdo->prepare("DELETE FROM `cart` WHERE cartID = ?");
        $stmt->execute([$remove_id]);
        header('location:cart.php');
    } catch (PDOException $e) {
        // Handle error
    }
}

if(isset($_GET['delete_all'])){
    try {
        $stmt = $pdo->prepare("DELETE FROM `cart`");
        $stmt->execute();
        header('location:cart.php');
    } catch (PDOException $e) {
        // Handle error
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="/css2/HEADER_MAIN.css">

</head>
<body>

<?php 

include "../Template/NAVBAR.php";

?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 

         // Fetching cart items using PDO
         $select_cart = $pdo->query("SELECT * FROM `cart`");
         $grand_total = 0;
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
         ?>

         <tr>
            <td><img src="/uploaded_img/<?php echo $fetch_cart['cartIMG']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['cartName']; ?></td>
            <td>$<?php echo number_format($fetch_cart['cartPrice']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['cartID']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['cartQuant']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['cartPrice'] * $fetch_cart['cartQuant']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['cartID']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
         };
         ?>
         <tr class="table-bottom">
            <td><a href="../PRODUCTS.MAIN/products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="/checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>

</body>
</html>
