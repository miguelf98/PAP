<?php
    $f=fopen("pedidos.txt","r");

    //ignorar linhas em branco
    $yes=true;
    while($yes) {
        $line = fgets($f);
        if (trim($line) == "[prepare]") $yes = false;
    }
?>

<div id="prepararTicketContainer">
<?php
    $yes=true;
    while($yes){
        $line = fgets($f);
        if (trim($line) == "[done]")
            $yes = false;
        else
            echo '<div class="ticketNumberContainer">'.$line.'</div>';
    }
?>
</div>

<div class="divider"></div>

<div id="entregarTicketContainer">
<?php
    while($line=fgets($f)){
       echo '<div class="ticketNumberContainer">'.$line.'</div>';

    }
?>
</div>



