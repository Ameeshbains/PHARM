<?php

@include 'config.php';

class ProductManager {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=pharm", "root", "root");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }


    public function getPDO() {
        return $this->pdo;
    }

    public function addProduct($p_name, $p_price, $p_category, $p_image, $p_image_tmp_name, $p_image_folder) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO `product`(productName, productPrice, productIMG, productCategory) VALUES(?, ?, ?, ?)");
            $stmt->execute([$p_name, $p_price, $p_image, $p_category]);
            move_uploaded_file($p_image_tmp_name, $p_image_folder);
            return 'product added successfully';
        } catch (PDOException $e) {
            return 'could not add the product';
        }
    }

    public function deleteProduct($delete_id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM `product` WHERE productID = ?");
            $stmt->execute([$delete_id]);
            return 'product has been deleted';
        } catch (PDOException $e) {
            return 'product could not be deleted';
        }
    }

    public function updateProduct($update_p_id, $update_p_name, $update_p_price, $update_p_image, $update_p_image_tmp_name, $update_p_image_folder) {
        try {
            $stmt = $this->pdo->prepare("UPDATE `product` SET productName = ?, productPrice = ?, productIMG = ? WHERE productID = ?");
            $stmt->execute([$update_p_name, $update_p_price, $update_p_image, $update_p_id]);
            move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
            return 'product updated successfully';
        } catch (PDOException $e) {
            return 'product could not be updated';
        }
    }

    public function getProducts() {
        $products = [];
        $select_products = $this->pdo->query("SELECT * FROM `product`");
        while ($row = $select_products->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }
        return $products;
    }

    public function getProductByID($productID) {
        $stmt = $this->pdo->prepare("SELECT * FROM `product` WHERE productID = ?");
        $stmt->execute([$productID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}



?>
