<?php
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
        if (trim($line) == "[done]")
            $yes = false;
        else
        {
            array_push($arrP,$line);
        }

    }


    while($line=trim(fgets($f))){
        array_push($arrD,$line);
    }
    fclose($f);
    array_push($arrP,'Z98');
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

/*
 print_r($arrP);
 print_r($arrD);
*/
?>

