<?php
function shortenPassword ($pw){
    return $pwReturn = substr($pw, 0, -30);
}

function validateSessions($userId){
    $state = false;
    if (!isset($userId)){
        $state = false;

    }else{
        $state = true;
    }

    return $state;
}







?>


