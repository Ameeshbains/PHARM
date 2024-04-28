<?php 



$customer = new Customer("customer1", "customerpass", "CUST123");
echo "Customer Username: " . $customer->getUsername() . "\n";
echo "Customer ID: " . $customer->getCustomerId() . "\n";


if(isset($_POST["submit"])){


    require_once("cust.config.php");
    $sc = new Customer("customer1","cust","cust1");


    $sc->setFirstName($_POST["firstName"]);
    $sc->setLastName($_POST["lastName"]);
    $sc->setAddress($_POST["address"]);
    $sc->setpwd($_POST["pwd"]);
    $sc->insertData();

    echo"<script>alert('data saved successfully');document.location='../INDEX.php'</script>";






}




?>