<?php

/*$username = $_POST['loginUsername'];
$pass = md5($_POST['loginPassword']);


$con=mysqli_connect("localhost","root","","2016psinfT1");
$sql = "SELECT * FROM admins WHERE adminUser = '". $username ."'";
$result = mysqli_query($con,$sql);
$dados = mysqli_fetch_array($result);
$sim = false;*/

$username = $_POST['user'];
$pass = $_POST['pass'];

if($username == 'admin' AND $pass = '12345'){
    session_start();
    $_SESSION['userId'] = 1;
    $sim = true;
}

if(!$sim){
    header("location:login.php?err");
}
else{
    header("location:index.php");
}


?>