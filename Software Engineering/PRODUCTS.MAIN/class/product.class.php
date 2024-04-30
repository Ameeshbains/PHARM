<?php

// Include database configuration file
@include './config/config.database.login.php';

// Define a class named 'products' to handle product-related operations
class products
{
    // Private variable to store PDO object for database connection
    private $pdo;

    // Constructor method to establish database connection
    public function __construct()
    {
        try {
            // Connect to the database using PDO
            $this->pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
            // Set PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // If database connection fails, output error message and terminate script
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Method to add a product to the cart
    public function addToCart($product_name, $product_price, $product_image)
    {
        // Set default product quantity to 1
        $product_quantity = 1;
        try {
            // Check if the product already exists in the cart
            $select_cart = $this->pdo->prepare("SELECT * FROM `cart` WHERE cartName = :product_name");
            $select_cart->bindParam(':product_name', $product_name);
            $select_cart->execute();

            // If the product exists in the cart, return a message
            if ($select_cart->rowCount() > 0) {
                return 'Product already added to cart';
            } else {
                // If the product doesn't exist in the cart, insert it into the cart table
                $insert_product = $this->pdo->prepare("INSERT INTO `cart`(cartName, cartPrice, cartIMG, cartQuant) VALUES(:product_name, :product_price, :product_image, :product_quantity)");
                $insert_product->bindParam(':product_name', $product_name);
                $insert_product->bindParam(':product_price', $product_price);
                $insert_product->bindParam(':product_image', $product_image);
                $insert_product->bindParam(':product_quantity', $product_quantity);
                $insert_product->execute();
                // Return success message
                return 'Product added to cart successfully';
                
            }
        } catch (PDOException $e) {
            // If an error occurs, return error message
            return "Error: " . $e->getMessage();
        }
    }

    // Method to retrieve product details by ID
    public function getProductById($productId) {
        // Prepare and execute SQL query to retrieve product details by ID
        $query = "SELECT * FROM product WHERE productId = :productId";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':productId', $productId);
        $statement->execute();

        // Fetch the product details
        $product = $statement->fetch(PDO::FETCH_ASSOC);

        // Close the database connection
        $statement->closeCursor();

        // Return the product details
        return $product;
    }

    // Method to retrieve all products from the database
    public function getAllProducts()
    {
        try {
            // Initialize an empty array to store product data
            $products = [];
            // Retrieve all products from the 'product' table
            $select_products = $this->pdo->query("SELECT * FROM `product`");
            // Iterate through the fetched products and add them to the array
            foreach ($select_products as $fetch_product) {
                $products[] = $fetch_product;
            }
            // Return the array of products
            return $products;
        } catch(PDOException $e) {
            // If an error occurs, return error message
            return "Error: " . $e->getMessage();
        }
    }

    // Method to redirect to singleProduct.php page with product ID as parameter
    function redirectToSingleProduct($productId) {
        $redirectUrl = "/PRODUCTS.MAIN/singleProduct.php?productId=$productId";
        echo "<meta http-equiv='refresh' content='0;url=$redirectUrl'>";
        exit;
    }
}

// Instantiate the 'products' class
$products = new products();

// Define a variable to store any messages generated during execution
$message = '';

// If 'add_to_cart' form submission is detected, call the addToCart method
if (isset($_POST['add_to_cart'])) {
    $message = $products->addToCart($_POST['product_name'], $_POST['product_price'], $_POST['product_image']);
}

// Check if product ID is set and redirect to singleProduct.php page if so
if (isset($fetch_product['productID'])) {
    $products->redirectToSingleProduct($fetch_product['productID']);
}

// Display any messages generated during execution
echo $message;

?>
