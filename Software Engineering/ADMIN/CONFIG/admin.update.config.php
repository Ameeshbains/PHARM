<?php 


try {

    
    require_once 'C:\laragon\www\Software Engineering\config\dbConnection.php';
    $sql = "SELECT * FROM product";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

} 
catch(PDOException $error) {

    echo $sql . "<br>" . $error->getMessage();

}

?>