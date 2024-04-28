



<?php

$db_host = 'localhost';
$db_name = 'pharm';
$db_user = 'root';
$db_pass = 'root';


try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['search_query']) && !empty($_GET['search_query'])) {
        $productName = $_GET['search_query'];

        include './Template/config/nav.class.php';

        $product = new navSearch($db);
        $productInfo = $product->getProductByName($productName);

        if($productInfo) {
            // Redirect to product_details.php with product details as URL parameters
            header("Location: ./SINGLE_PRODUCT_PAGE/singleProd.main.php?name={$productInfo['productName']}&price={$productInfo['productPrice']}");
            exit();
        } else {
            echo "Product not found.";
        }
    } else {
        header("Location: index.php");
        exit();
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
