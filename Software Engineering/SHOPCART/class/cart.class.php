<?php

@include './config/config.database.login.php';



class ShoppingCart 
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

    public function updateCartItem($update_value, $update_id)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE `cart` SET cartQuant = ? WHERE cartID = ?");
            $stmt->execute([$update_value, $update_id]);
            header('location:cart.php');
        } catch (PDOException $e) {
            // Handle error
        }
    }

    public function removeCartItem($remove_id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM `cart` WHERE cartID = ?");
            $stmt->execute([$remove_id]);
            header('location:cart.php');
        } catch (PDOException $e) {
            // Handle error
        }
    }

    public function deleteAllCartItems()
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM `cart`");
            $stmt->execute();
            header('location:cart.php');
        } catch (PDOException $e) {
            // Handle error
        }
    }

    public function getCartItems()
    {
        $cartItems = [];
        $select_cart = $this->pdo->query("SELECT * FROM `cart`");
        while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
            $cartItems[] = $fetch_cart;
        }
        return $cartItems;
    }
}





$shoppingCart = new ShoppingCart();

if (isset($_POST['update_update_btn'])) {
    $shoppingCart->updateCartItem($_POST['update_quantity'], $_POST['update_quantity_id']);
}

if (isset($_GET['remove'])) {
    $shoppingCart->removeCartItem($_GET['remove']);
}

if (isset($_GET['delete_all'])) {
    $shoppingCart->deleteAllCartItems();
}

?>
