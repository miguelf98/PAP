<?php
session_start();
include_once "includes/functions.inc.php";
echo $valid = validateSession($_SESSION);
if($valid != 0){
    header("location: index.php");
}
?>