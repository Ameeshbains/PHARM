



<?php 


   include ("../TEMPLATE/admin.header.php");


?>

<?php 


   include("../TEMPLATE/admin.navbar.php");
   

?>



<body>
    <div class="container">
        <div class="box1">
            <h2>CREATE PRODUCT</h2>
            <form action="../CONFIG/admin.create.config.php" method="post">
                <label for="prodName">PRODUCT NAME:</label>
                <input type="text" name="prodName" id="firstname" required>

                <label for="prodPrice">PRODUCT PRICE:</label>
                <input type="text" name="prodPrice" id="lastname" required>

                <label for="prodDesc">PRODUCT DESCRIPTION:</label>
                <input type="text" name="prodDesc" id="email" required>

                <label for="category">PRODUCT CATEGORY:</label>
                <input type="text" name="category" id="age">

                <label for="file">PRODUCT IMAGE</label>
                <input type="file" name="file" id="age">


                <input type="submit" name="submit" value="Submit">
            </form>
            <a href="/Admin.php">Back to home</a>
        </div>
    </div>
</body>
</html>


