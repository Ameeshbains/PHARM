<?php

require_once 'path/to/Admin.php'; // Include the file containing the Admin class

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    // Test constructor and getters
    public function testConstructorAndGetters()
    {
        // Create an instance of Admin class
        $admin = new Admin("admin1", "adminpass", 2);

        // Assert that the username is set correctly
        $this->assertEquals("admin1", $admin->getUsername());

        // Assert that the admin level is set correctly
        $this->assertEquals(2, $admin->getAdminLevel());
    }
}

?>
