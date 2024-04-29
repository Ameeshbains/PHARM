<?php





require_once("../config/config.database.login.php");

require_once("../CUSTOMER/cust.class.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['firstName'];
    $password = $_POST['pwd'];

    $customer = new Customer($username, $password, null, $dbCnx);

    if ($customer->loginAccess()) {
        // Redirect to some page after successful login
        header("Location: ../PRODUCTS.MAIN/products.php");

        exit();
    } else {
        $errorMessage = "Invalid username or password";
    }
}




?>




