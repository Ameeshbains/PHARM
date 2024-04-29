<?php

class CartManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCartItems()
    {
        try {
            $cartItems = [];
            $select_cart = $this->pdo->query("SELECT * FROM `cart`");
            foreach ($select_cart as $fetch_cart) {
                $cartItems[] = $fetch_cart;
            }
            return $cartItems;
        } catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function clearCart()
    {
        try {
            $clear_cart = $this->pdo->prepare("DELETE FROM `cart`");
            $clear_cart->execute();
            return "Cart cleared successfully!";
        } catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
