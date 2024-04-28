<!--medicine section-->

<section class="top" id="top">
    <div class="container">
        <h1 class="heading">WELLNESS</h1><hr>
    </div>

    <!--box-container-->
    <div class="box-container">

        <?php
        // Include database connection file
        include('config/dbConnection.php');

        // Connect to the database
        $conn = connectToDatabase();

        // Query to retrieve products
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        // Check if there are any products
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of products
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!--box-->
                <div class="box">
                    <!--img-box-->
                    <div class="slide-img">
                        <!-- Assuming your images are stored in the database, replace the src attribute value with the appropriate field -->
                        <img src="<?php echo $row['image_path']; ?>">
                        <!--overlay-->
                        <div class="overlay">
                            <!--learn-btn-->
                            <p><?php echo $row['productDesc']; ?></p>
                            <a href="#" class="learn-btn">Learn More</a>
                        </div>
                        <!--overlay-->
                    </div>

                    <!--star-->
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                    <!--star-->

                    <!--detail box-->
                    <div class="detail-box">
                        <!--type-->
                        <div class="type">
                            <a href="#" name="PRODUCT_NAME"><?php echo $row['productName']; ?></a>
                            <span>new arrival</span>
                        </div>
                        <!--type-->
                        <!--price-->
                        <a href="#" class="price"  name="PRODUCT_PRICE">$<?php echo $row['productPrice']; ?></a>
                        <!--price-->
                    </div>

                    <!--button-->
                    <a href="#" class="my-button" title="b-title">Add to cart</a>
                    <!--button-->
                </div>
                <!--box-->
                <?php
            }
        } else {
            echo "No products found";
        }
        ?>
    </div>
    <!--box-container-->
</section>

<!--medicine section 2-->

<section class="bottom" id="bottom">
    <div class="container">
        <h1 class="heading">Medicine</h1><hr>
    </div>

    <!--box-container-->
    <div class="box-container">
        <!-- Similar to the above section, you can retrieve and display medicine products here -->
    </div>
    <!--box-container-->
</section>
