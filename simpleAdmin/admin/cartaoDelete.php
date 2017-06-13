<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);

if ($state == false){
    header("location: login.php?err");
}else {
    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $categId = $_GET['id'];

    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $sql = "DELETE FROM cartoes WHERE cartaoId = " . $categId;
    mysqli_query($con, $sql);

}

header("location: cartoes.php")
?>