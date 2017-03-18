<?php
$con = mysqli_connect("localhost","root","","mydb");
print_r($_POST['userName']);
print_r(md5($_POST['password']));

$sql = "INSERT INTO users";
$sql .= "VALUES (0,'".$_POST['userName']."','".md5($_POST['password'])."','admin')";
mysqli_query($con,$sql);


/* TODO USER INSERT INTO */

?>