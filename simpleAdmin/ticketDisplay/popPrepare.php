<?php
include_once "../admin/includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT orderNumber FROM orders WHERE orderId = ".$_GET['id'];
$query = mysqli_query($con,$sql);
$orderNum = mysqli_fetch_assoc($query);

$sql2 = "UPDATE orders SET orderStatus = 1 WHERE orderId = ".$_GET['id'];
mysqli_query($con,$sql2);

    $f=fopen("pedidos.txt","r");
    $arrP=array();
    $arrD=array();



    //ignorar linhas em branco
    $yes=true;
    while($yes) {
        $line = fgets($f);

        if (trim($line) == "[prepare]") $yes = false;

    }

    $yes=true;
    while($yes){
        $line = trim(fgets($f));
        if (trim($line) == "[done]"){


            $yes = false;
        }
        else
        {
            array_push($arrP,$line);
        }

    }
    foreach($arrP as $id => $num){
        if($num == $orderNum['orderNumber']){
            array_push($arrD,$arrP[$id]);
            unset($arrP[$id]);
        }
    }
    while($line=trim(fgets($f))){
        array_push($arrD,$line);
    }
    //actualizar o array das entregas


// volta a escrever no ficheiro de texto *******************************
$f2=fopen("pedidos.txt","w+");
fwrite($f2,"[prepare]".PHP_EOL);



foreach ($arrP as &$value) {
    fputs($f2,$value.PHP_EOL);
}

fputs($f2,"[done]".PHP_EOL);

foreach ($arrD as &$value) {
    fputs($f2,$value.PHP_EOL);
}

fclose($f2);


//*******************************************************************************
?>

