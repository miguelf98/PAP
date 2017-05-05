<?php
include_once "includes/config.inc.php";

$categId = $_GET['id'];

$sql0 = "SELECT categoriaImagePath FROM categorias WHERE categoriaId = ". $categId;
$query = mysqli_query($con,$sql0);
$result = mysqli_fetch_assoc($query);
$fImagePath = "../".$result['categoriaImagePath'];
unlink($fImagePath);

$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "DELETE FROM categorias WHERE categoriaId = ".$categId;
mysqli_query($con,$sql);
header("location: categorias.php");


?>