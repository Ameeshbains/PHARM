


<?php

    include("config/dbConnection.php");
   


?>

<!--medicine section-->

<section class="top" id="top">
    <div class="container">
        <h1 class="heading">BEAUTY & SKINCARE</h1><hr>
    </div>



<!--box-container-->

<div class="box-container">


    <!--1-->

    <?php


    //SETTING up query for the wellness section 
     $query = "SELECT * FROM product WHERE productCategory = 'wellness'";
     $statement = $conn->prepare($query); //Here we are preparing the queury in order to execute it 

     $statement->execute();

     $result = $statement->fetchAll(PDO::FETCH_ASSOC);

   

        foreach($result as $row) {
 
        

     

    ?>


    <!--box-->

        <div class="box"  action="PRODUCT.PHP" method="post">
            <!--img-box-->
            <div class="slide-img">

                <img src="<?php echo $row['productIMG']; ?>">

                <!--overlay-->
                <div class="overlay" >
                    <!--learn-btn-->
                    <p name="PRODUCT_DESCRIPTION">




                        <?php echo $row["productDesc"] ?>


                    </p>

                    <a href="../PRODUCT/sepProduct.php" class="learn-btn">Learn More</a>
                </div>
                <!--overlay-->
            </div>

            <!--star-->
            <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half"></i>
                <i class=""></i>
                <i class=""></i>
            </div>
            <!--star-->

            <!--detail box-->

            <div class="detail-box">

                <!--type-->
                <div class="type">
                    <a href="#" name="PRODUCT_NAME"> <?php echo $row["productName"] ?></a>
                    <span>new arrival</span>
                </div>
                <!--type-->

                <!--price-->
                <a href="#" class="price"  name="PRODUCT_PRICE">$ <?php echo $row["productPrice"] ?></a>
                <!--price-->
            </div>

            <!--button-->
            <a href="#" class="my-button" title="b-title">Add to cart</a>
            


        </div>

        <?php
        
            }

        ?>

        <!--button-->



</section>





<section class="bottom" id="bottom">
    <div class="container">
        <h1 class="heading">HEALTH</h1><hr>
    </div>



<!--box-container-->

<div class="box-container">


    <!--1-->

    <?php

     $query2 = "SELECT * FROM product WHERE productCategory = 'HEALTH'";
     $statement = $conn->prepare($query2); //Here we are preparing the queury in order to execute it 

     $statement->execute();

     $result = $statement->fetchAll(PDO::FETCH_ASSOC);

   

        foreach($result as $row1) {
 
        

     

    ?>


    <!--box-->

        <div class="box"  action="PRODUCT.PHP" method="post">
            <!--img-box-->
            <div class="slide-img">

                <img src="<?php echo $row1['productIMG']; ?>">

                <!--overlay-->
                <div class="overlay" >
                    <!--learn-btn-->
                    <p name="PRODUCT_DESCRIPTION">




                        <?php echo $row1["productDesc"] ?>


                    </p>

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
                    <a href="#" name="PRODUCT_NAME"> <?php echo $row1["productName"] ?></a>
                    <span>new arrival</span>
                </div>
                <!--type-->

                <!--price-->
                <a href="#" class="price"  name="PRODUCT_PRICE">$ <?php echo $row1["productPrice"] ?></a>
                <!--price-->
            </div>

            <!--button-->
            <a href="#" class="my-button" title="b-title">Add to cart</a>
            


        </div>

        <?php
        
            }

        ?>

        <!--button-->



</section>
<!--medicine section 2-->













<!--medicine section 2-->
<section class="bottom" id="bottom">
    <div class="container">
        <h1 class="heading">SUPPLEMENTS</h1><hr>
    </div>



<!--box-container-->

<div class="box-container">


    <!--1-->

    <?php

     $query2 = "SELECT * FROM product WHERE productCategory = 'SUPS'";
     $statement = $conn->prepare($query2); //Here we are preparing the queury in order to execute it 

     $statement->execute();

     $result = $statement->fetchAll(PDO::FETCH_ASSOC);

   

        foreach($result as $row1) {
 
        

     

    ?>


    <!--box-->

        <div class="box"  action="PRODUCT.PHP" method="post">
            <!--img-box-->
            <div class="slide-img">

                <img src="<?php echo $row1['productIMG']; ?>">

                <!--overlay-->
                <div class="overlay" >
                    <!--learn-btn-->
                    <p name="PRODUCT_DESCRIPTION">




                        <?php echo $row1["productDesc"] ?>


                    </p>

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
                    <a href="#" name="PRODUCT_NAME"> <?php echo $row1["productName"] ?></a>
                    <span>new arrival</span>
                </div>
                <!--type-->

                <!--price-->
                <a href="#" class="price"  name="PRODUCT_PRICE">$ <?php echo $row1["productPrice"] ?></a>
                <!--price-->
            </div>

            <!--button-->
            <a href="#" class="my-button" title="b-title">Add to cart</a>
            


        </div>

        <?php
        
            }

        ?>

        <!--button-->



</section>
<!--medicine section 2-->



