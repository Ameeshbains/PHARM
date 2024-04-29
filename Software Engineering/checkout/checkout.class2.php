<?php

include 'config/config.database.login.php';

class OrderManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function placeOrder($name, $number, $email, $method, $flat, $street, $city, $state, $country, $pin_code)
    {
        try {
            
            $cartManager = new CartManager($this->pdo);

            $cartItems = $cartManager->getCartItems();

            if (empty($cartItems)) {
                return "Your cart is empty!";
            }

            $price_total = 0;
            $product_name = [];
            foreach ($cartItems as $product_item) {
                $product_name[] = $product_item['cartName'] .' ('. $product_item['cartQuant'] .') ';
                $product_price = number_format($product_item['cartPrice'] * $product_item['cartQuant']);
                $price_total += $product_price;
            }

            $total_product = implode(', ', $product_name);
            $detail_query = $this->pdo->prepare("INSERT INTO `order`(orderName, orderNumber, orderEmail, orderMethod, orderFlat, orderStreet, orderCity, orderState, orderCountry, orderPinCode, orderTotalProducts, orderPrice) VALUES(:name, :number, :email, :method, :flat, :street, :city, :state, :country, :pin_code, :total_product, :price_total)");
            $detail_query->bindParam(':name', $name);
            $detail_query->bindParam(':number', $number);
            $detail_query->bindParam(':email', $email);
            $detail_query->bindParam(':method', $method);
            $detail_query->bindParam(':flat', $flat);
            $detail_query->bindParam(':street', $street);
            $detail_query->bindParam(':city', $city);
            $detail_query->bindParam(':state', $state);
            $detail_query->bindParam(':country', $country);
            $detail_query->bindParam(':pin_code', $pin_code);
            $detail_query->bindParam(':total_product', $total_product);
            $detail_query->bindParam(':price_total', $price_total);
            $detail_query->execute();

            // Clear the cart after placing the order
            $cartManager->clearCart();

            return [
                'message' => 'Order placed successfully!',
                'total_product' => $total_product,
                'price_total' => $price_total,
            ];
        } catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}

$orderManager = new OrderManager($pdo);

$message = '';

if(isset($_POST['order_btn'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];
    
    $message = $orderManager->placeOrder($name, $number, $email, $method, $flat, $street, $city, $state, $country, $pin_code);
}
?>
