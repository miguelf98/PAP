<!--
como estamos a trabalhar com arrays e para retirar elementos dos arrays usamos o POP, logo tiramos o �ltimo,
MAS mostramos no monitor ao CONTR�rio (ou seja, o 1� pedido � o �ltimo do array) logo usamos RECURSIVIDADE
-->


<?php
    $f=fopen("pedidos.txt","r"); //abre ficheiro de texto

    function mostraPrepare()
    {
        global $f;
        $line = trim(fgets($f));

        if (trim($line) == "[done]")
            ;
        else
            mostraPrepare();
        if (trim($line) == "[done]")
            ;
        else
            echo '<div class="ticketNumberContainer">'.$line.'</div>';

    }
    function mostraDone()
    {
        global $f;
        $line = trim(fgets($f));

        if ($line ==false)
            ;
        else
            mostraDone();
        if ($line==false)
            ;
        else
            echo '<div class="ticketNumberContainer">'.$line.'</div>';

    }



    //ignorar linhas em branco
    $yes=true;
    while($yes) {
        $line = fgets($f);
        if (trim($line) == "[prepare]") $yes = false;
    }
?>

<div id="prepararTicketContainer">
<?php
    mostraPrepare();
?>
</div>

<div class="divider"></div>

<div id="entregarTicketContainer">
<?php
    mostraDone();
?>
</div>



