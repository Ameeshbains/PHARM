
<?php


if(isset($_POST["submit"])){

    


        require_once('../classes/admin.class.php');
        $sc = new adminConfig;


        $sc->setProdName($_POST["prodName"]);
        $sc->setProductPrice($_POST["prodPrice"]);
        $sc->setProdDesc($_POST["prodDesc"]);
        $sc->setProductCategory($_POST["category"]);
        $sc->setProdIMG($_POST["file"]);

        $sc->insertData();


        echo"<script>alert('data saved successfully');document.location='C:\laragon\www\Software Engineering\INDEX.PHP'</script>";


    
}


    
?>