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
    array_push($arrD,$arrP[count($arrP)-1]);

    //actualizar o array das entregas
    while($line=trim(fgets($f))){
        array_push($arrD,$line);
    }


    array_pop($arrP);


























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

