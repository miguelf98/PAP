<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);

if ($state == false){
    header("location: login.php?err");
}else {
    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $sqlPerm = "SELECT permissionId FROM permissions WHERE permissionId = " . $_POST['permission'];
    $username = $_POST['user'];
    $sql = "UPDATE users SET userName = '" . $username . "', userPermissionId = (" . $sqlPerm;
    $sql .= ") WHERE userId = " . $_POST['idUser'];

    mysqli_query($con, $sql);
    header("location: users.php");
}
?>