<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);

if ($state == false){
    header("location: login.php?err");
}else {
    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $categNome = $_POST['nameCategoria'];
    $extensionRaw = $_FILES['imageCategoria']['name']; //get extension from file sent
    $file_extension = pathinfo($extensionRaw, PATHINFO_EXTENSION); //get extensions from file sent
    $file_path = CIMAGEFOLDERPATH . $categNome . "." . $file_extension; //create new file_path
    print_r($_FILES);
    if (move_uploaded_file($_FILES["imageCategoria"]["tmp_name"], "../" . $file_path)) { //if file is uploaded successfully
        $sql = "INSERT INTO categorias VALUES (0, '" . $categNome . "', '" . $file_path . "')";
        mysqli_query($con, $sql);
        $_SESSION ['categUploadOK'] = 1;
        header("location: categorias.php");
    }
}
?>