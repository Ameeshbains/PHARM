<?php


require_once("C:\laragon\www\Software Engineering\database.php");



class navSearch extends adminConfig{


    protected $db;

    



    public function __construct($db){

        

 

        $this->db = $db;



    }


   

    public function getProductByName($name) {
        $sql = "SELECT * FROM product WHERE productName = :name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }











    
}




?>