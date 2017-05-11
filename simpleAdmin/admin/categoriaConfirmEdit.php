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
    $categId = $_POST['idCategoria'];

    /******************/
    $sql0 = "SELECT categoriaImagePath FROM categorias WHERE categoriaId = " . $categId; /*                               */
    $query = mysqli_query($con, $sql0);                                                  /*    GET EXISTING FILE PATH     */
    $imgPathQuery = mysqli_fetch_assoc($query);                                               /*                               */
    /******************/
    if ($_FILES["imageCategoria"]["error"] == 0) { //ATUALIZA A IMAGEM E O PATH DA IMAGEM

        $fImagePath = "../" . $imgPathQuery['categoriaImagePath'];                              /*                              */
        unlink($fImagePath);                                                            /*     DELETE EXISTING IMAGE    */

        $extensionRaw = $_FILES['imageCategoria']['name'];                              /*                                 */
        $file_extension = pathinfo($extensionRaw, PATHINFO_EXTENSION);          /*      GET NEW FILE EXTENSION     */
        $file_path = CIMAGEFOLDERPATH . $categNome . "." . $file_extension;             /*      $file_path is new file path*/
        move_uploaded_file($_FILES["imageCategoria"]["tmp_name"], "../" . $file_path); /*      uploads new file                    */
        $sql1 = "UPDATE categorias SET categoriaName = '" . $categNome . "', categoriaImagePath = '" . $file_path . "' WHERE categoriaId = " . $categId;
        mysqli_query($con, $sql1);
    } else {  //NAO ATUALIZA IMAGE, SÓ O PATH DA IMAGEM/NOME DA IMAGEM PARA O NOME ATUALIZADO
        /***********GET IMAGE EXISTING EXTENSION**********/
        $imgPathOriginal = "../" . $imgPathQuery['categoriaImagePath'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE); //opens file info
        $imgPathDB = finfo_file($finfo, $imgPathOriginal); //gets file path
        $file_extension = pathinfo($imgPathDB); //output is final extension
        $file_path = CIMAGEFOLDERPATH . $categNome . "." . $file_extension['filename']; //creates new file path from name
        /****************************************/
        rename($imgPathOriginal, "../" . $file_path); //renames original file in folder
        $sql2 = "UPDATE categorias SET categoriaName = '" . $categNome . "', categoriaImagePath = '" . $file_path . "' WHERE categoriaId = " . $categId; //replaces name and image path with updated path
        mysqli_query($con, $sql2);
    }
    header("location: categorias.php");
}
?>