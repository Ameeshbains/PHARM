<?php


class Order {

    //This class is used when we add on the amount of product we need of from any product
    private $products = [];

    public function addProduct(Product $product, $quantity) {
        $this->products[] = ['product' => $product, 'quantity' => $quantity];
    }

    public function getTotalPrice() {
        $totalPrice = 0;
        foreach ($this->products as $item) {
            $totalPrice += $item['product']->getPrice() * $item['quantity'];
        }
        return $totalPrice;
    }
}

// Create instances and demonstrate aggregation

$product1 = new Product("DOVE","This is a product used for cleaning","20","IMG/1.jpg");
$product2 = new Product("Cinthol","This is a product used for cleaning","50","IMG/2.jpg");

$order = new Order();
$order->addProduct($product1, 2);
$order->addProduct($product2, 1);

echo "Total price of order: $" . $order->getTotalPrice() . "\n";

























