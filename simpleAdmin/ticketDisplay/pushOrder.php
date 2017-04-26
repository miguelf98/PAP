<?php
session_start();
if(isset($_SESSION['ticketNumber']))
    $_SESSION['ticketNumber']++;
else
    $_SESSION['ticketNumber']=1;

$ticket=chr(65+($_SESSION['ticketNumber']/100)).($_SESSION['ticketNumber']%100<10?'0':'').($_SESSION['ticketNumber']%100);


    $f=fopen("pedidos.txt","r");
    $arrP=array();
    $arrD=array();
    array_push($arrP,$ticket); // RECEBE por GET o nº do pedido

    //ignorar linhas em branco
    $yes=true;
    while($yes) {
        $line = fgets($f);
        if (trim($line) == "[prepare]") $yes = false;
    }
    $yes=true;
    while($yes){
        $line = trim(fgets($f));
        if (trim($line) == "[done]")
            $yes = false;
        else
        {
            array_push($arrP,$line);
        }

    }


//actualizar o array das entregas
    while($line=trim(fgets($f))){
        array_push($arrD,$line);
    }
    fclose($f);
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

