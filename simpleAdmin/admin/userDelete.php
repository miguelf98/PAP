<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "DELETE FROM users WHERE userId = ".$_GET['id'];
mysqli_query($con,$sql);
header("location: users.php");
?>