<?php
function shortenPassword ($pw){
    $pwReturn = substr($pw, 0, -30);

    return $pwReturn;
}


?>