
<?php include './ADMIN.MAIN/config/admin.config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css2/HEADER_MAIN.css">

</head>
<body>
   


<?php include './ADMIN.MAIN/TEMPLATE/admin.main.header.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
   <input type="text" name="p_category" placeholder="enter the product category" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the product" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>product category</th>

         <th>action</th>
      </thead>

      <tbody>
         <?php
         

         $products = $productManager->getProducts();

         if(!empty($products)){
             foreach($products as $row){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['productIMG']; ?>" height="100" alt=""></td>
            <td><?php echo $row['productName']; ?></td>
            <td>$<?php echo $row['productPrice']; ?>/-</td>
            <td><?php echo $row['productCategory']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['productID']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['productID']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<?php
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
   $fetch_edit = $productManager->getProductByID($edit_id);
   if($fetch_edit) {
?>
        <section class="edit-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <img src="uploaded_img/<?php echo $fetch_edit['productIMG']; ?>" height="200" alt="">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['productID']; ?>">
                <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['productName']; ?>">
                <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['productPrice']; ?>">
                <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                <input type="submit" value="update the product" name="update_product" class="btn">
                <input type="reset" value="cancel" id="close-edit" class="option-btn" >
            </form>
        </section>
<?php
      
   }
}
?>


</div>














</body>
</html>