<?php

$sessionCount = file_get_contents("sessionCount.txt");
$sessionCount--;
$f=fopen("sessionCount.txt","w");
fwrite($f,$sessionCount);
fclose($f);
session_start();
session_destroy();
header("location: index.php");
?>