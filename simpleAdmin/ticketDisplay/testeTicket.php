<?php

echo $ticket=chr(65+($_SESSION['ticketNumber']/100)).($_SESSION['ticketNumber']%100<10?'0':'').($_SESSION['ticketNumber']%100);

?>