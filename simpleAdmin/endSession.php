<?php
file_put_contents("orderProdutos.txt", "");
session_start();

session_destroy();
header("location: index.php");
?>