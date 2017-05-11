<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);

if ($state == false){
    header("location: login.php?err");
}else{
    $con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
    $prodNome = $_POST['nameProduto'];
    $prodPreco = $_POST['precoProduto'];
    $extensionRaw = $_FILES['imageProduto']['name']; //get extension from file sent
    $file_extension = pathinfo($extensionRaw, PATHINFO_EXTENSION); //get extensions from file sent
    $file_path = CIMAGEFOLDERPATHPROD . $prodNome . "." . $file_extension; //create new file_path

    if(move_uploaded_file($_FILES["imageProduto"]["tmp_name"],"../" . $file_path)){ //if file is uploaded successfully
        $sql = "INSERT INTO produtos VALUES (0, '".$prodNome."','".$prodPreco."','".$file_path."', (SELECT categoriaId FROM categorias WHERE categoriaId = ".$_POST['categoriaId']."))";
        mysqli_query($con,$sql);
        print_r($sql);
        $_SESSION ['categUploadOK'] = 1;
        header("location: produtos.php");
    }
}
?>