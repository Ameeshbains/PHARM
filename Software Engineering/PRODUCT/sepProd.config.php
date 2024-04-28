

<?php

require_once("../database.php");

class Product
{

    // Properties
    private $productName;
    private $productDesc;
    private $productPrice;
    private $productIMG;

    protected $dcnx;

    // Constructor
    public function __construct($name = "", $desc = " ", $price = " ", $img =" ",)
    {
        $this->productName = $name;
        $this->productDesc = $desc;
        $this->productPrice = $price;
        $this->productIMG = $img;
        $this->dcnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }


    public function getProductName(){

        return $this->productName;
    }

    public function getProductDesc(){

        return $this->productDesc;
    }


    public function getProductPrice(){
        return $this->productPrice;
    }

    public function getProductIMG(){
        return $this->productIMG;
    }


    public function setProductName($productName){

        $this->productName = $productName;
    }

    public function setProductDesc($productDesc){
        $this->productDesc = $productDesc;
    }

    public function setProductPrice($productPrice){

        $this->productPrice = $productPrice;
    }

    public function setProductIMG($img){
        $this->productIMG = $img;

    }



















}



















?>