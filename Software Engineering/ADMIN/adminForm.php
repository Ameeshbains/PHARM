
<?php


if(isset($_POST["submit"])){


    if( empty($_POST["firstName"]) || empty($_POST["pwd"] )){

        $message = '<label>All field is required</label>';



    }else{

        require_once('../login/loginConfig.php');

        //OBJECT HERE 
        $sc = new loginConfig();
        $sc->setFirstName($_POST["firstName"]);
        $sc->setpwd($_POST["pwd"]);
        $sc->adminGetData();

        echo"<script>document.location='../Admin.php'</script>";


    }


    






}


    
?>