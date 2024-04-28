<header class="header">

   <div class="flex">

      <a href="INDEX.PHP" class="logo">ADA PHARMACY</a>

      <nav class="navbar">
         <a href="#">ADMIN PAGE</a>
         

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

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>



   </div>

</header>
