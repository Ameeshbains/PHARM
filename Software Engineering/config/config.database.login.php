<?php

try {
    $dbCnx = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
    $dbCnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>


<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
 }




 
?>

<?php

$conn = mysqli_connect('localhost','root','root','pharm') or die('connection failed');

?>
