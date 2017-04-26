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

//actualizar o array dos pedidos
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
    // entrega ao cliente
    array_pop($arrD); // retira o elemento da lista



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

