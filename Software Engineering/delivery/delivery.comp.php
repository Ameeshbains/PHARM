<?php
// Define a class demonstrating composition
//This class is used to get the delivery prices with the help of order class
class delivery {
    private $items = [];

    public function addItem(Order $order) {
        $this->items[] = $order;
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
//we are adding the order to the delivery, so they know what they are delivering, and the quantity
$delivery = new delivery();
$delivery->addItem($order);

echo "Total price of delivery: $" . $delivery->getTotalPrice() . "\n";

?>