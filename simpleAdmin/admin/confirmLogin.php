<?php
include_once "includes/body.inc.php";
$username = $_POST['user'];
$pass = $_POST['pass'];

$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM users WHERE userName = '". $username ."'";
$result = mysqli_query($con,$sql);
$dados = mysqli_fetch_assoc($result);
$pwHash = $dados['userPw'];
print_r($dados);
if(password_verify($pass, $pwHash)){
    session_start();
    $_SESSION['userId'] = $dados['userId'];
    $_SESSION['permission'] = $dados['userPermissionId'];
    header("location:index.php");
}
else{
    header("location:login.php?err");
}

?>