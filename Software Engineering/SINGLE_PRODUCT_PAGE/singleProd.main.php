<?php
// Include the product class file
include "../PRODUCTS.MAIN/class/product.class.php";

// Check if product ID is provided in the URL
if(isset($_GET['productID'])) {
    try {
        // Instantiate the product class
        $productObj = new products();
        // Get product details by ID
        $product = $productObj->getProductById($_GET['productID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $product['productName']; ?></title>
   <!-- Add your CSS links here -->
</head>
<body>

<!-- Display product details -->
<h1><?php echo $product['productName']; ?></h1>
<img src="/uploaded_img/<?php echo $product['productIMG']; ?>" alt="">
<p><?php echo $product['productDescription']; ?></p>
<p>Price: $<?php echo $product['productPrice']; ?></p>

<!-- Add to cart form or button can be added here -->

</body>
</html>
<?php
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to the products page if product ID is not provided
    header("Location: C:\laragon\www\PHARM\Software Engineering\PRODUCTS.MAIN\products.php");
    exit();
}
?>
