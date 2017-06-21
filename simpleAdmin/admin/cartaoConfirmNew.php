<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);

if ($state == false){
    header("location: login.php?err");
}else {
    $sql = "INSERT INTO cartoes VALUES (0, '".$_POST['saldoCartao']."',(SELECT pessoaId FROM pessoas WHERE pessoaId = ".$_POST['idPessoa']."))";
    mysqli_query($con,$sql);
}
header("location: cartoes.php");


?>