
<?php


if(isset($_POST["submit"])){


    if( empty($_POST["firstName"]) || empty($_POST["pwd"] )){

        $message = '<label>All field is required</label>';



    }else{

        require_once('loginConfig.php');
        $sc = new loginConfig();
        $sc->setFirstName($_POST["firstName"]);
        $sc->setpwd($_POST["pwd"]);
        $sc->getData();

        echo"<script>document.location='../cust.php'</script>";


    }

}


    
?>




<?php
// Initialize variables
$loginFailed = false; // Flag to indicate if login attempt failed

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $firstNameErr = $passwordErr = "";

    // Validate Firstname
    if (empty($_POST["firstName"])) {
        $firstNameErr = "Firstname is required";
    } elseif (strlen($_POST["firstName"]) < 5 || strlen($_POST["firstName"]) > 10) {
        $firstNameErr = "Firstname must be between 5 and 10 characters";
    } else {
        $firstName = test_input($_POST["firstName"]);
    }

    // Validate Password
    if (empty($_POST["pwd"])) {
        $passwordErr = "Password is required";
    } elseif (strlen($_POST["pwd"]) < 8 || strlen($_POST["pwd"]) > 10) {
        $passwordErr = "Password must be between 8 and 10 characters";
    } else {
        $password = test_input($_POST["pwd"]);
    }

    // Check if login credentials are incorrect
    if (isset($firstName) && isset($password)) {
        // Replace this logic with your actual login validation logic
        if ($firstName !== "correctFirstName" || $password !== "correctPassword") {
            $loginFailed = true; // Set flag to indicate login attempt failed
        }
    }

    // If there are no validation errors and login attempt is successful, redirect
    if (empty($firstNameErr) && empty($passwordErr) && !$loginFailed) {
        // Process login logic here
        // Include your loginConfig.php file here and perform necessary actions
        require_once('loginConfig.php');
        $sc = new loginConfig();
        $sc->setFirstName($firstName);
        $sc->setpwd($password);
        $sc->getData();

        // Redirect after successful login
        header("Location: ../cust.php");
        exit();
    }
}

// Helper function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>





