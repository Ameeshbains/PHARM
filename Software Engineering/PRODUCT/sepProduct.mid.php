
<?php

    include("../config/dbConnection.php");
   


?>




<div class="product-details">


    <?php


    $query = "SELECT * FROM product limit 1";

    $statement = $conn->prepare($query); //Here we are preparing the queury in order to execute it 

    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);



    foreach($result as $row) {

    



    ?>



    </div>

        <div class="product-info">
            

            <img src="<?php echo $row['productIMG']; ?>" alt="Product Image" class="IMG">



            <div class="prod1">
                <h3><?php echo $row["productName"] ?></h3>

                <H3 id="description">DESCRIPTION: <?php echo $row["productDesc"] ?></H3>
            
                
                <H3 id="description">Price: <?php echo $row["productPrice"] ?></H3>

                <H3 id="description">Manufacturer: BOOTS</H3>

            </div>


            <!-- Other product details -->

            <!-- Form for reviews or contacting -->
            <form action="submit_review.php" method="post">


                <h3>Submit a Review</h3>


                <label for="name">Your Name:</label><br>

                <input type="text" id="name" name="name" required><br>

                <label for="review">Your Review:</label><br>

                <textarea id="review" name="review" required></textarea><br>

                <button type="submit">Submit Review</button>
                
            </form>

        </div>


        <?php


             }

        ?>

    </div>

            <!-- Footer-->


