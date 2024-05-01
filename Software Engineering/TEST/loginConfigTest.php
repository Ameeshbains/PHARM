<?php

require 'C:\laragon\www\PHARM\Software Engineering\login\loginConfig.php';

use PHPUnit\Framework\TestCase;

class LoginConfigTest extends TestCase
{
    protected $loginConfig;

    protected function setUp(): void
    {
        // Initialize the loginConfig object before each test
        $this->loginConfig = new loginConfig();
    }

    public function testInsertData()
    {
        // Test insertData method
        // Assuming successful execution
        $this->assertTrue($this->loginConfig->insertData());
    }

    public function testGetData()
    {
        // Test getData method
        // Assuming successful execution
        $this->assertTrue($this->loginConfig->getData());
    }

    public function testAdminGetData()
    {
        // Test adminGetData method
        // Assuming successful execution
        $this->assertTrue($this->loginConfig->adminGetData());
    }

    public function testFetchAll()
    {
        // Test fetchAll method
        // Assuming successful execution
        $this->assertNotNull($this->loginConfig->fetchAll());
    }

    public function testFetchOne()
    {
        // Test fetchOne method
        // Assuming successful execution
        $this->assertNotNull($this->loginConfig->fetchOne());
    }

    public function testUpdate()
    {
        // Test update method
        // Assuming successful execution
        $this->assertNull($this->loginConfig->update());
    }

    public function testDelete()
    {
        // Test delete method
        // Assuming successful execution
        $this->assertNull($this->loginConfig->delete());
    }
}
?>
