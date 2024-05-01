<?php
session_start(); // Start the session

require_once("../config/config.database.login.php");
require_once("../CUSTOMER/cust.class.php");


//This block checks if the HTTP request method is POST, indicating that form data has been submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['firstName'];
    $password = $_POST['pwd'];

    $customer = new Customer($username, $password, null, $dbCnx);

    if ($customer->loginAccess()) {
        // Set session variables
        $_SESSION['username'] = $username;

        
        
        // Redirect to some page after successful login
        header("Location: ../PRODUCTS.MAIN/products.php");
        exit();
    } else {
        $errorMessage = "Invalid username or password";
       
    }
}


// Display logout button if user is logged in
if(isset($_SESSION['username'])) {
    echo "<h1>Welcome ".$_SESSION['username']."</h1>";
    echo "<a href='../PRODUCTS.MAIN/products.php'>Product</a><br>";
    echo "<br><a href='C:\\laragon\\www\\PHARM\\Software Engineering\\login\\loginMain.php'><input type='button' value='Logout' name='logout'></a>";
}
?>