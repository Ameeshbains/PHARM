<?php

include './config/config.database.login.php';

include './ADMIN.MAIN/admin.class.php';

$productManager = new ProductManager;



if(isset($_POST['add_product'])){

 

    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_category = $_POST['p_category'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/'.$p_image;

      
      
   $message[] = $productManager->addProduct($p_name, $p_price, $p_category, $p_image, $p_image_tmp_name, $p_image_folder);
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];

    $message[] = $productManager->deleteProduct($delete_id);
}

if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploaded_img/'.$update_p_image;

    $message[] = $productManager->updateProduct($update_p_id, $update_p_name, $update_p_price, $update_p_image, $update_p_image_tmp_name, $update_p_image_folder);
}

?>
