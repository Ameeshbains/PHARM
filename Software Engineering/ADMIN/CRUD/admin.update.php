
<?php 


   include("C:\laragon\www\Software Engineering\ADMIN\CONFIG\admin.update.config.php");
   

?>
<?php 


   include ("../TEMPLATE/admin.header.php");


?>

<?php 


   include("../TEMPLATE/admin.navbar.php");
   

?>

<h2><a href="C:\laragon\www\Software Engineering\Admin.php">HOME</a></h2>

<div class="container1">
    
    <table class="user-table">
        <thead>
            <tr>
               
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Product Category</th>
                <th>EDIT</th>

            </tr>
        </thead>
        <tbody>



            <?php foreach ($result as $row) : ?>

                <tr>

                    <td><?php echo $row["productName"]; ?></td>
                    <td><?php echo $row["productDesc"]; ?></td>
                    <td><?php echo $row["productPrice"]; ?></td>
                    <td><?php echo $row["productIMG"]; ?></td>
                    <td><?php echo $row["productCategory"]; ?></td>


                    <td><a href="update-single.php?id=

                    <?php 
                        
                        echo $row["productID"];

                    ?>
                    
                    ">Edit</a></td>

                </tr>

        <?php endforeach; ?>

        </tbody>













    </table>
</div>
