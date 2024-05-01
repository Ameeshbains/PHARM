<?php

require_once 'C:\laragon\www\PHARM\Software Engineering\checkout\checkout.class.php'; // Include the file containing the CartManager class

use PHPUnit\Framework\TestCase;

class CartManagerTest extends TestCase
{
    // Test getCartItems method
    public function testGetCartItems()
    {
        // Mock PDO object
        $mockPdo = $this->getMockBuilder(PDO::class)
                        ->disableOriginalConstructor()
                        ->getMock();

        // Create an instance of CartManager with the mock PDO object
        $cartManager = new CartManager($mockPdo);

        // Mock PDOStatement object
        $mockStatement = $this->getMockBuilder(PDOStatement::class)
                             ->getMock();

        // Set up the return value for the mock PDO object query method
        $mockPdo->expects($this->once())
                ->method('query')
                ->willReturn($mockStatement);

        // Set up the return value for the mock PDOStatement object fetchAll method
        $mockStatement->expects($this->once())
                      ->method('fetchAll')
                      ->willReturn([['id' => 1, 'name' => 'Product A', 'price' => 10], ['id' => 2, 'name' => 'Product B', 'price' => 20]]);

        // Call the getCartItems method
        $cartItems = $cartManager->getCartItems();

        // Assert that the correct cart items are returned
        $this->assertCount(2, $cartItems); // Check if the correct number of cart items are returned
        $this->assertEquals('Product A', $cartItems[0]['name']); // Check if the name of the first product is correct
        $this->assertEquals(20, $cartItems[1]['price']); // Check if the price of the second product is correct
    }

    // Test clearCart method
    public function testClearCart()
    {
        // Mock PDO object
        $mockPdo = $this->getMockBuilder(PDO::class)
                        ->disableOriginalConstructor()
                        ->getMock();

        // Create an instance of CartManager with the mock PDO object
        $cartManager = new CartManager($mockPdo);

        // Mock PDOStatement object
        $mockStatement = $this->getMockBuilder(PDOStatement::class)
                             ->getMock();

        // Set up the return value for the mock PDO object prepare method
        $mockPdo->expects($this->once())
                ->method('prepare')
                ->willReturn($mockStatement);

        // Set up the return value for the mock PDOStatement object execute method
        $mockStatement->expects($this->once())
                      ->method('execute')
                      ->willReturn(true); // Simulate successful execution

        // Call the clearCart method
        $result = $cartManager->clearCart();

        // Assert that the correct message is returned
        $this->assertEquals('Cart cleared successfully!', $result);
    }
}

?>
