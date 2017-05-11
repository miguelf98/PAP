<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);
if ($state == true){
    $con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
    $sql = "DELETE FROM produtos WHERE produtoId = ".$_GET['id'];
    mysqli_query($con,$sql);
    header("location: produtos.php");
}else{
    header("location: login.php?err");
}

?>