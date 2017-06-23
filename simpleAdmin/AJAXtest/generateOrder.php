<pre>

<?php
session_start();
include_once "../admin/includes/config.inc.php";
include_once "functions.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$orderNum = getTicketNo($_SESSION['ticketNumber']);
$lines = file("produtos.txt", FILE_IGNORE_NEW_LINES);
$contents = file_get_contents(  "produtos.txt",FILE_USE_INCLUDE_PATH);
$array_list = (explode("\r\n",$contents));
$values = array_count_values($array_list);

$j = 1;
$count = array();
$orderPreco = 0;
$tempArr = "";
$orderProd = array();

foreach($lines as $line){
    $sql = "SELECT * FROM produtos WHERE produtoId = ". $line;
    $query = mysqli_query($con,$sql);
    $prod = mysqli_fetch_assoc($query);
    if (isset($values[$line])) { //passa valores para um array com key e valor [produtoId][produtoQntd]
        $count[$line] = $values[$line];
    }
}
$cnt = count($count);
foreach($count as $id => $row){
    $sql = "SELECT * FROM produtos WHERE produtoId = ". $id;
    $query = mysqli_query($con,$sql);
    $prod = mysqli_fetch_assoc($query);
    $tempArr = $id.", ".$row;
    $orderPreco += $prod['produtoPreco'] * $count[$id];
    for($i = 1; $i <= $cnt; $i++){
        $orderProd[$j] = $tempArr;
    }
    $j += 1;
}

$orderCount = count($orderProd);
var_dump($orderProd);

for($i = 1; $i <= 5; $i++){
    if(!(isset($orderProd[$i]))){
        $orderProd[$i] = "0";
    }
}

$sql = "INSERT INTO orders ";
$sql .= "VALUES (0, '".$orderNum."', '".$orderProd[1]."', '".$orderProd[2]."', '".$orderProd[3]."', '".$orderProd[4]."', '".$orderProd[5]."', '".date("Y-m-d h:i:s")."',)";







//clearFatura();
?>