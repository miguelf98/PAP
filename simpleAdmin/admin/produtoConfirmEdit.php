<pre>
<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);
if ($state == false){
    header("location: login.php?err");
}else {
    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $prodNome = $_POST['nameProduto'];
    $prodId = $_POST['idProduto'];
    $prodPreco = $_POST['precoProduto'];
    /******************/
    $sqlCat = "(SELECT categoriaId FROM categorias WHERE categoriaId = ". $_POST['categoria'] .")";

    /******************/
    $sql0 = "SELECT produtoImagePath FROM produtos WHERE produtoId = " . $prodId; /*                               */
    $query = mysqli_query($con, $sql0);                                                  /*    GET EXISTING FILE PATH     */
    $imgPathQuery = mysqli_fetch_assoc($query);
    print_r($imgPathQuery);
    /*                               */
    /******************/
    if ($_FILES["imageProduto"]["error"] == 0) { //ATUALIZA A IMAGEM E O PATH DA IMAGEM
        $fImagePath = "../" . $imgPathQuery['produtoImagePath'];                              /*                              */
        unlink($fImagePath);                                                            /*     DELETE EXISTING IMAGE    */
        echo '<br><br>';
        $extensionRaw = $_FILES['imageProduto']['name'];                              /*                                 */
        $file_extension = pathinfo($extensionRaw, PATHINFO_EXTENSION);          /*      GET NEW FILE EXTENSION     */
        $file_path = CIMAGEFOLDERPATHPROD . $prodNome . "." . $file_extension;             /*      $file_path is new file path*/
        move_uploaded_file($_FILES["imageProduto"]["tmp_name"], "../" . $file_path); /*      uploads new file                    */
        $sql1 = "UPDATE produtos SET produtoName = '" . $prodNome . "', produtoPreco = '".$prodPreco."', produtoImagePath = '" . $file_path . "', produtoCategoriaId = ".$sqlCat." WHERE produtoId = " . $prodId;
        print_r($sql1);
        mysqli_query($con, $sql1);
    } else {  //NAO ATUALIZA IMAGE, SÓ O PATH DA IMAGEM/NOME DA IMAGEM PARA O NOME ATUALIZADO
        /***********GET IMAGE EXISTING EXTENSION**********/
        $imgPathOriginal = "../" . $imgPathQuery['produtoImagePath'];
        $path_parts = pathinfo($imgPathOriginal);
        $file_path = CIMAGEFOLDERPATHPROD . $prodNome . "." . $path_parts['extension']; //creates new file path from name
        /****************************************/
        rename($imgPathOriginal, "../" . $file_path); //renames original file in folder
        $sql2 = "UPDATE produtos SET produtoName = '" . $prodNome . "', produtoPreco = '".$prodPreco."', produtoImagePath = '" . $file_path . "', produtoCategoriaId = ".$sqlCat." WHERE produtoId = " . $prodId;
        print_r($sql2);
        mysqli_query($con, $sql2);
    }
    header("location: produtos.php");
}
?>