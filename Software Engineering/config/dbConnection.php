<?php






    //This is like importing the dp.php to this file, and it becomes apart of this code 
    require "db.PHP";

    //Try block 
    try{

        //PDO connection 
        $conn = new PDO($dsn, $username, $password);

        echo"Database connected";

    }catch(PDOException $e){

        echo "Database Connection problem". $e->getMessage();
        exit();

    }

    
    

    

        





?>