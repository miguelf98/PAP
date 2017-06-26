<?php
include_once "config.inc.php";

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
    $lines = file("orderProdutos.txt", FILE_IGNORE_NEW_LINES);
    $countLine = count($lines);

    $contents = file_get_contents(  "orderProdutos.txt",FILE_USE_INCLUDE_PATH);
    $array_list = (explode("\r\n",$contents));
    $values = array_count_values($array_list);

    $count = array();
    $preco = 0;

    foreach($lines as $line){
        $sql = "SELECT * FROM produtos WHERE produtoId = ". $line;
        $query = mysqli_query($con,$sql);
        $prod = mysqli_fetch_assoc($query);
        if (isset($values[$line])) { //passa valores para um array com key e valor [produtoId][produtoQntd]
            $count[$line] = $values[$line];
            $preco = $preco + $prod['produtoPreco'];
        }
    }
    return true;
}