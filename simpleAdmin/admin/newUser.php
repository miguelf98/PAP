<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);

$username = $_POST['userName'];
$password = $_POST['password'];
$options = ['cost' => 12];
$pwhash = password_hash($password, PASSWORD_BCRYPT, $options);

$sql = "INSERT INTO users";
$sql .= " VALUES (0, '".$username."','".$pwhash."','admin')";
echo '<pre>';
echo $sql;

mysqli_query($con,$sql);

?>