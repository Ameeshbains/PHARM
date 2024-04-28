<?php 


if(isset($_POST["submit"])){


    require_once("signupConfig.php");
    $sc = new signupConfig();


    $sc->setFirstName($_POST["firstName"]);
    $sc->setLastName($_POST["lastName"]);
    $sc->setAddress($_POST["address"]);
    $sc->setpwd($_POST["pwd"]);
    $sc->setIMG($_POST["img"]);
    $sc->setUserDOB($_POST["userDOB"]);
    $sc->setUserName($_POST["userName"]);
    $sc->insertData();

    echo"<script>alert('data saved successfully');document.location='../INDEX.php'</script>";






}


    




?>