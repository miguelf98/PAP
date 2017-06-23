<?php
include_once "includes/config.inc.php";
include_once "includes/functions.inc.php";
/* STARTING SESSION */
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);

$sql1 = "SELECT pessoaId FROM pessoas WHERE pessoaId = ". $_POST['id_pessoa'];
$query1 = mysqli_query($con,$sql1);
$pessoa = mysqli_fetch_assoc($query1);

$dateTime = $currentDateTime = date('Y-m-d H:i:s');

$sessionCount = file_get_contents("sessionCount.txt");
if(isset($sessionCount)){
    $sessionCount++;
    $f=fopen("sessionCount.txt","w");
    fwrite($f,$sessionCount);
    fclose($f);
}else{
    $sessionCount=0;
    $f=fopen("sessionCount.txt","w");
    fwrite($f,$sessionCount);
    fclose($f);
}
$ticketNo = getTicketNo($sessionCount);
$session_data = $_POST['id_pessoa'] . " / ". $ticketNo ." - " . $_POST['session_token'];
if(isset($pessoa)){
    session_start();

    $sql2 = "INSERT INTO sessions VALUES (0, '". $session_data ."','". $dateTime ."')";
    mysqli_query($con,$sql2);
    $sql3 = "SELECT sessionId FROM sessions WHERE sessionDateCreated = '". $dateTime ."'";
    $query2 = mysqli_query($con,$sql3);
    $id_session = mysqli_fetch_assoc($query2);
    $_SESSION['session_id'] =  $id_session['sessionId'];
    $_SESSION['pId'] =  $pessoa['pessoaId'];
    $_SESSION['token'] =  $_POST['session_token'];
    $_SESSION['ticket_number'] =  $ticketNo;
    header("location: loja.php");


}else{
    header("location: index.php");
}