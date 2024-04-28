<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="./Template/singleProduct.css">
</head>
<body>
    <div class="container">
        <?php
        // Database connection
        try {
            $con = new PDO("mysql:host=localhost;dbname=pharm", 'root', 'root');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }

        if(isset($_POST['submit'])) {
            // Sanitize user input
            $str = htmlspecialchars($_POST["search_query"]);
            // Prepare and execute query
            $sth = $con->prepare("SELECT * FROM product WHERE productName = :product_name");
            $sth->bindParam(':product_name', $str);
            $sth->execute();

            if($row = $sth->fetch(PDO::FETCH_OBJ)) {
        ?>
            <div class="card">
                <img src="product-image.jpg" alt="Product Image" class="card-image">
                <div class="card-content">
                    <h1 class="product-name"><?php echo $row->productName; ?></h1>
                    <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fermentum leo at felis ullamcorper convallis.</p>
                    <p class="product-price"><?php echo $row->productPrice; ?></p>
                    <button class="add-to-basket">Add to Basket</button>
                    <div class="section1">
                        <h2 class="section-title">Ingredients</h2>
                        <p class="product-ingredients">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fermentum leo at felis ullamcorper convallis.</p>
                    </div>
                    <div class="section2">
                        <h2 class="section-title">Customer Reviews</h2>
                        <div class="review">
                            <h3>John Doe</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fermentum leo at felis ullamcorper convallis.</p>
                        </div>
                        <div class="review">
                            <h3>Jane Smith</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fermentum leo at felis ullamcorper convallis.</p>
                        </div>
                        <div class="login-form">
                            <h3>Login to Leave a Review</h3>
                            <form>
                                <input type="text" placeholder="Username" required>
                                <input type="password" placeholder="Password" required>
                                <textarea placeholder="Write your review here..." required></textarea>
                                <button type="submit">Submit Review</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            } else {
                echo "<p>Product not found.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
