<?php

@include './config/config.database.login.php';

class products
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function addToCart($product_name, $product_price, $product_image)
    {
        $product_quantity = 1;
        try {
            $select_cart = $this->pdo->prepare("SELECT * FROM `cart` WHERE cartName = :product_name");
            $select_cart->bindParam(':product_name', $product_name);
            $select_cart->execute();

            if ($select_cart->rowCount() > 0) {
                return 'product already added to cart';
            } else {
                $insert_product = $this->pdo->prepare("INSERT INTO `cart`(cartName, cartPrice, cartIMG, cartQuant) VALUES(:product_name, :product_price, :product_image, :product_quantity)");
                $insert_product->bindParam(':product_name', $product_name);
                $insert_product->bindParam(':product_price', $product_price);
                $insert_product->bindParam(':product_image', $product_image);
                $insert_product->bindParam(':product_quantity', $product_quantity);
                $insert_product->execute();
                return 'product added to cart successfully';
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }



    public function getAllProducts()
    {
        try {
            $products = [];
            $select_products = $this->pdo->query("SELECT * FROM `product`");
            foreach ($select_products as $fetch_product) {
                $products[] = $fetch_product;
            }
            return $products;
        } catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }


    








}






$products = new products();

$message = '';

if (isset($_POST['add_to_cart'])) {
    $message = $products->addToCart($_POST['product_name'], $_POST['product_price'], $_POST['product_image']);
}




?>