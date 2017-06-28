<pre>
<?php
include_once "includes/functions.inc.php";
session_start();
print_r($_SESSION);

$sql = "SELECT * FROM produtos WHERE produtoId = ".$_GET['pr'];
$query = mysqli_query ($con,$sql);
$result = mysqli_fetch_assoc($query);

$precoT = $result['produtoPreco'] + $_SESSION['total'];


if($_SESSION['pSaldo'] > $precoT){
    echo 'tens saldo';
    $lines = file("produtos.txt", FILE_IGNORE_NEW_LINES);
    $countLine = count($lines);
    if($countLine < 8){
        $f=fopen("produtos.txt","a");
        fwrite($f,$_GET['pr']);
        fwrite($f,"\r\n");
        fclose($f);
    }
    $_SESSION['total'] =  $_SESSION['total'] + $result['produtoPreco'];
}else{
    echo 'tas fdd';
}









?>
</pre>
