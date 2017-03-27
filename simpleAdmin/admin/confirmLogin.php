<?php
include_once "includes/body.inc.php";
$username = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM users WHERE userName = '". $username ."'";
$result = mysqli_query($con,$sql);
$dados = mysqli_fetch_row($result);
$pwHash = $dados['2'];

if($dados[3] !=  1){
    header("location:login.php?err");
}

if(password_verify($pass, $pwHash)){
    session_start();
    $_SESSION['userId'] = $dados[0];
    header("location:index.php");
}
else{
    header("location:login.php?err");
}


/*
if(!$sim){
    header("location:login.php?err");
}
else{
    header("location:index.php");
}*/


?>