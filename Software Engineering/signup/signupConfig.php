<?php


require_once("../database.php");



class signupConfig{



    private $regID;
    private $firstName;
    private $lastName;
    private $address;

    private $pwd;

    private $IMG;

    private $userName;

    private $userDOB;
    protected $dbCnx;



    public function __construct($regID=0, $firstName="", $lastName="", $address="", $pwd= "", $IMG= "", $userName= "", $userDOB= ""){


        $this->regID = $regID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->pwd = $pwd;
        $this->IMG = $IMG;
        $this->userName = $userName;
        $this->userDOB = $userDOB;

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);



    }




    public function getRegID(){
        return $this->regID;
    }


    public function setRegID($regID){

        $this->regID = $regID;


    }

    public function getpwd(){

        return $this->pwd;
    }


    public function setpwd($pwd){

        $this->pwd = $pwd;
    }



    public function getFirstName(){

        return $this->firstName;
    }


    public function setFirstName($firstName){


        $this->firstName = $firstName;
    }


    public function getLastName(){

        return $this->lastName;
    }


    public function setLastName($lastName){


        $this->lastName = $lastName;
    }



    public function getAddress(){
        
        return $this->address;  
    }


    public function setAddress($address){

        $this->address = $address;
    }
    
    
    public function getPasswd(){
        return $this->pwd;
    }

    public function setPasswd($pwd){

        $this->pwd = $pwd;

    }


    public function getIMG(){

        return $this->IMG;

    }


    public function setIMG($IMG){

        $this->IMG = $IMG;
    }

    public function setUserDOB($userDOB){

        $this->userDOB = $userDOB;

    }


    public function getUserDOB(){

        return $this->userDOB;


    }



    public function setUserName($userName){

        $this->userName = $userName;

    }

    public function getUserName(){

        return $this->userName;


    }






    public function insertData(){

        try{

            $stm = $this->dbCnx->prepare("INSERT INTO users(firstName,lastName,address,pwd,prof_IMG,userName,userDOB) values(?,?,?,?,?,?,?)");
            $stm->execute([$this->firstName,$this->lastName,$this->address,$this->pwd, $this->IMG, $this->userName, $this->userDOB]);
            
            echo"<script>alert('data saved successfully');document.location='../INDEX.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();

        }

    }

    public function fetchAll(){


        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM users");
            $stm->execute();
            $result = $stm->fetchAll();
        }
        catch(Exception $e){
            return $e->getMessage();
        }


    }


    public function fetchOne(){

        try{
            $stm = $this->dbCnx->prepare("SELECT FROM users where id=?");
            $stm->execute([$this->regID]);
            $result = $stm->fetch();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    

    public function update(){

        try{
            $stm = $this->dbCnx->prepare("UPDATE users SET firstName = ?, lastName = ?, address = ?,pwd = ? WHERE regID = ? ");
            $stm->execute([$this->firstName,$this->lastName,$this->address,$this->regID, $this->pwd]);
        }
        catch(Exception $e){
            return $e->getMessage();

        }

    }

    public function delete(){

        try{

            $stm = $this->dbCnx->prepare("DELETE FROM users WHERE regID =?");
            $stm->execute([$this->regID]);
            return $stm->fetchAll();
            echo "<script>alert('data saved successfully');document.location='allData.php'</script>";

        }
        catch(Exception $e){
            return $e->getMessage();
        }

    } 
    
}




?>