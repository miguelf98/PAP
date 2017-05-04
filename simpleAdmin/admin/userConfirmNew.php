<?php
include_once "includes/config.inc.php";


$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sqlPerm = "SELECT permissionId FROM permissions WHERE permissionId = ". $_POST['permission'];
$username = $_POST['user'];
$password = $_POST['pass'];
$options = ['cost' => 12];
$pwhash = password_hash($password, PASSWORD_BCRYPT, $options);
$sql = "INSERT INTO users";
$sql .= " VALUES (0, '".$username."','".$pwhash."',(".$sqlPerm."))";
mysqli_query($con,$sql);
header("location: users.php");

?>