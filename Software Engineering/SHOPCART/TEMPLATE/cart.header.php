<header class="header">

   <div class="flex">

      <a href="#" class="logo">ADA PHARMACY</a>

      <nav class="navbar">
         <a href="/INDEX.PHP">HOME</a>
         <a href="#">LOGIN</a>
         <a href="/PRODUCTS.MAIN/products.php">MEDICINE</a>
      </nav>

      <?php
      try {
         $pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $select_rows = $pdo->query("SELECT * FROM `cart`");
         $row_count = $select_rows->rowCount();
      } catch(PDOException $e) {
         echo "Error: " . $e->getMessage();
      }
      ?>

      <a href="/SHOPCART/cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
