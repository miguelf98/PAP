<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);

if ($state == false){
    header("location: login.php?err");
}else {
    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $pessoaId = $_GET['id'];

    $sql0 = "SELECT pessoaImagePath FROM pessoas WHERE pessoaId = " . $pessoaId;
    $query = mysqli_query($con, $sql0);
    $result = mysqli_fetch_assoc($query);
    $fImagePath = "../" . $result['pessoaImagePath'];
    if(file_exists($fImagePath)){
        unlink($fImagePath);
    }
    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $sql = "DELETE FROM pessoas WHERE pessoaId = " . $pessoaId;
    mysqli_query($con, $sql);

}

header("location: pessoas.php")
?>