<?php
include_once "config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
function randStr($length = 24) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function validateSession($data){
    if(empty($data)){
        header("location: index.php");
    }
 /*$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
    $sql = "SELECT sessionData FROM sessions WHERE sessionId = ". $data['session_id'];
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($query);
    $token = $data['token'];
    $compare = substr($result['sessionData'], strpos($result['sessionData'], "/") + 2);
    return strcmp($compare,$token);*/
}

function getTicketNo($num){
    return chr(65+($num/100)).($num%100<10?'0':'').($num%100);
}

function checkBalance($pr){
    global $con;
    $sql = "SELECT produtoPreco FROM produtos WHERE produtoId = ".$_GET['pr'];
    $query = mysqli_query ($con,$sql);
    $result = mysqli_fetch_assoc($query);

    $precoT = $result['produtoPreco'] + $_SESSION['total'];


    if($_SESSION['pSaldo'] > $precoT){
        return true;
    }else{
        return false;
    }
}