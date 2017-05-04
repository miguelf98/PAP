<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sqlPerm = "SELECT permissionId FROM permissions WHERE permissionId = ". $_POST['permission'];
$username = $_POST['user'];
$sql = "UPDATE users SET userName = '".$username."', userPermissionId = (" .$sqlPerm;
$sql .= ") WHERE userId = ". $_POST['idUser'];

mysqli_query($con,$sql);
header("location: users.php");

?>