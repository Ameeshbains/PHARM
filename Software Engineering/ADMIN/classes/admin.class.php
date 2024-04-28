<?php


require 'C:\laragon\www\Software Engineering\database.php';




class adminConfig{



    private $prodName;

    private $prodDesc;

    private $productPrice;

    private $productIMG;

    private $productCategory;

 

    protected $dbCnx;



    public function __construct($prodName="",$prodDesc="",$productPrice="",$productIMG="",$productCategory=""){

        $this->prodName = $prodName;
        $this->prodDesc = $prodDesc;
        $this->productPrice = $productPrice;
        $this->productIMG = $productIMG;
        $this->productCategory = $productCategory;



       

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);



    }


    

    public function getProdName(){
        return $this->prodName;
    }



    public function getProdDesc(){

       return $this->prodDesc;
    }


    


    public function getProductPrice(){

        return $this->productPrice;
    }
 
 
    



    public function getProdIMG(){

        return $this->productIMG;
    }
 



 
    public function getProductCategory(){

        return $this->productCategory;
    }
 
 


    public function setProdName($prodName){
        $this->prodName = $prodName;
    }
    
    public function setProdDesc($prodDesc){
        $this->prodDesc = $prodDesc;
    }
    
    public function setProductPrice($productPrice){
        $this->productPrice = $productPrice;
    }
    
    public function setProdIMG($productIMG){
        $this->productIMG = $productIMG;
    }
    
    public function setProductCategory($productCategory){
        $this->productCategory = $productCategory;
    }



    public function insertData(){

        try{

            $stm = $this->dbCnx->prepare("INSERT INTO product(productName,productDesc,productPrice,productIMG,productCategory) values(?,?,?,?,?)");
            $stm->execute([$this->prodName,$this->prodDesc,$this->productPrice,$this->productIMG,$this->productCategory]);
            
            echo"<script>alert('data saved successfully');document.location='../INDEX.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();

        }

    }




    
}




?>