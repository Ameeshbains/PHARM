<?php 

// Check if the form has been submitted
if(isset($_POST["submit"])){

    // Include the file containing the signup configuration
    require_once("signupConfig.php");
    
    // Create an instance of the signupConfig class
    $sc = new signupConfig();

    // Set various properties of the signupConfig object with form data
    $sc->setFirstName($_POST["firstName"]);
    $sc->setLastName($_POST["lastName"]);
    $sc->setAddress($_POST["address"]);
    $sc->setpwd($_POST["pwd"]);
    $sc->setIMG($_POST["img"]);
    $sc->setUserDOB($_POST["userDOB"]);
    $sc->setUserName($_POST["userName"]);

    // Insert the data into storage (presumably a database)
    $sc->insertData();

    // Display an alert message using JavaScript and redirect to the INDEX page
    echo "<script>alert('Data saved successfully'); document.location='../INDEX.php'</script>";

}

?>




<?php
// Initialize variables to store validation errors
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $userDOB = $_POST['userDOB'];
    $pwd = $_POST['pwd'];
    
    // Validate username: minimum length 4 characters
    if (strlen($userName) < 4) {
        $errors['userName'] = "Username must be at least 4 characters long.";
    }

    // Validate date of birth: age must be at least 18 years
    $dobDate = new DateTime($userDOB);
    $today = new DateTime();
    $age = $today->diff($dobDate)->y;
    if ($age < 18) {
        $errors['userDOB'] = "You must be at least 18 years old to register.";
    }

    // Validate password: minimum length 8 characters
    if (strlen($pwd) < 8) {
        $errors['pwd'] = "Password must be at least 8 characters long.";
    }

    // Validate profile image: check if file is uploaded
    if (!isset($_FILES['img']) || $_FILES['img']['error'] == UPLOAD_ERR_NO_FILE) {
        $errors['img'] = "Please select a profile image.";
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Process the form data and perform registration
        // For example, you can insert data into the database

        // Redirect to success page or perform other actions
        header("Location: success.php");
        exit; // Terminate script execution after redirection
    }
}
?>
