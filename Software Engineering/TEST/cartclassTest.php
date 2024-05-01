<?php

require_once "C:\laragon\www\final set\PHARM\Software Engineering\SHOPCART\class\cart.class.php";

// Import PHPUnit TestCase class for writing test cases
use PHPUnit\Framework\TestCase;

class ShoppingCartTest extends TestCase
{
    protected $shoppingCart;

    // Setup method to initialize the ShoppingCart object before each test
    protected function setUp(): void
    {
        // Initialize the ShoppingCart object before each test
        $this->shoppingCart = new ShoppingCart();
    }

    // Test method for the updateCartItem function
    public function testUpdateCartItem()
    {
        // Mocking the PDO object for testing
        $pdoMock = $this->createMock(PDO::class);
        $this->shoppingCart->pdo = $pdoMock;

        // Setting up expectations for the PDO mock
        $pdoMock->expects($this->once())
            ->method('prepare')
            ->with("UPDATE cart SET cartQuant = ? WHERE cartID = ?")
            ->willReturnSelf();

        $pdoMock->expects($this->once())
            ->method('execute')
            ->with([5, 1])
            ->willReturn(true);

        // Call the method under test
        $result = $this->shoppingCart->updateCartItem(5, 1);

        // Assert that the method returned true
        $this->assertTrue($result);
    }

    // Test method for the removeCartItem function
    public function testRemoveCartItem()
    {
        // Mocking the PDO object for testing
        $pdoMock = $this->createMock(PDO::class);
        $this->shoppingCart->pdo = $pdoMock;

        // Setting up expectations for the PDO mock
        $pdoMock->expects($this->once())
            ->method('prepare')
            ->with("DELETE FROM cart WHERE cartID = ?")
            ->willReturnSelf();

        $pdoMock->expects($this->once())
            ->method('execute')
            ->with([1])
            ->willReturn(true);

        // Call the method under test
        $result = $this->shoppingCart->removeCartItem(1);

        // Assert that the method returned true
        $this->assertTrue($result);
    }

    // Test method for the deleteAllCartItems function
    public function testDeleteAllCartItems()
    {
        // Mocking the PDO object for testing
        $pdoMock = $this->createMock(PDO::class);
        $this->shoppingCart->pdo = $pdoMock;

        // Setting up expectations for the PDO mock
        $pdoMock->expects($this->once())
            ->method('prepare')
            ->with("DELETE FROM cart")
            ->willReturnSelf();

        $pdoMock->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        // Call the method under test
        $result = $this->shoppingCart->deleteAllCartItems();

        // Assert that the method returned true
        $this->assertTrue($result);
    }

    // Test method for the getCartItems function
    public function testGetCartItems()
    {
        // Mocking the PDO object for testing
        $pdoMock = $this->createMock(PDO::class);
        $this->shoppingCart->pdo = $pdoMock;

        // Setting up expectations for the PDO mock
        $pdoMock->expects($this->once())
            ->method('query')
            ->with("SELECT * FROM cart")
            ->willReturnSelf();

        $pdoMock->expects($this->once())
            ->method('fetch')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn([]);

        // Call the method under test
        $result = $this->shoppingCart->getCartItems();

        // Assert that the method returned an empty array
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }
}

?>
