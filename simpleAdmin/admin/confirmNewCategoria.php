<?php
include "includes/config.inc.php";
session_start();
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$categNome = $_POST['nameCategoria'];
$extensionRaw = $_FILES['imageCategoria']['name'];
$file_extension = pathinfo($extensionRaw, PATHINFO_EXTENSION);
$file_name = CIMAGEFOLDERPATH . $categNome . "." . $file_extension;

if(move_uploaded_file($_FILES["imageCategoria"]["tmp_name"],"../" . $file_name)){
    $sql = "INSERT INTO categorias VALUES (0, '".$categNome."', '".$file_name."')";
    mysqli_query($con,$sql);
    $_SESSION ['categUploadOK'] = 1;
    header("location: newCategoria.php");
}
?>