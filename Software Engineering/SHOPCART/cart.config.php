<?php
// Define a class demonstrating composition

class ShoppingCart {
    private $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotalPrice() {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getPrice();
        }
        return $totalPrice;
    }
}

// Create an instance and demonstrate composition

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

echo "Total price of shopping cart: $" . $cart->getTotalPrice() . "\n";

?>