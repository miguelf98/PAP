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

    $sql0 = "SELECT categoriaImagePath FROM categorias WHERE categoriaId = " . $categId;
    $query = mysqli_query($con, $sql0);
    $result = mysqli_fetch_assoc($query);
    $fImagePath = "../" . $result['categoriaImagePath'];
    unlink($fImagePath);

    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $sql = "DELETE FROM categorias WHERE categoriaId = " . $categId;
    mysqli_query($con, $sql);

}

print_r(mysqli_error($con));
?>