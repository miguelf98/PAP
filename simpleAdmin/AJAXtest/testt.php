<?php
include_once "../admin/includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM produtos";
$query = mysqli_query($con,$sql);
$prod = mysqli_fetch_assoc($query);
echo '<pre>';
print_r($query);


?>