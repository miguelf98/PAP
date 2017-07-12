 ,
<?php

/* demorou tempo, não perguntar como funciona*/

include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);

if ($state == false){
    header("location: login.php?err");
}else {
    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    $pessoaNome = $_POST['nomePessoa'];
    $pessoaMorada = $_POST['moradaPessoa'];
    $pessoaTelefone = $_POST['telefonePessoa'];
    $pessoaId = $_POST['idPessoa'];

    /******************/
    $sql0 = "SELECT pessoaImagePath FROM pessoas WHERE pessoaId = " . $pessoaId; /*                               */
    $query = mysqli_query($con, $sql0);                                                  /*    GET EXISTING FILE PATH     */
    $imgPathQuery = mysqli_fetch_assoc($query);
    /*                               */
    /******************/
    if(isset($_POST['modalCheck'])){ //verifica se o form vem do modal (pessoaModalInfo.php) ou pela página de edição da pessoa (pessoaEdit.php)
        $saldo = preg_replace('/\D/', '', $_POST['saldoCartaoPessoa']); //devolve os nºs na string mandada por $_POST
        $sqlC = "UPDATE cartoes SET cartaoSaldo = ". $saldo ." WHERE cartaoPessoaId = ".$pessoaId;
        $query = mysqli_query($con,$sqlC);
    }

    if (isset($_FILES["imagePessoa"])) { //ATUALIZA A IMAGEM E O PATH DA IMAGEM

        $fImagePath = "../" . $imgPathQuery['pessoaImagePath'];                              /*                              */
        if(file_exists($fImagePath)){
            unlink($fImagePath);
        }                                                            /*     DELETE EXISTING IMAGE    */
        $extensionRaw = $_FILES['imagePessoa']['name'];                              /*                                 */
        $file_extension = pathinfo($extensionRaw, PATHINFO_EXTENSION);          /*      GET NEW FILE EXTENSION     */
        $file_path = CIMAGEPATHPESSOAS . $pessoaNome . "." . $file_extension;             /*      $file_path is new file path*/
        move_uploaded_file($_FILES["imagePessoa"]["tmp_name"], "../" . $file_path); /*      uploads new file                    */
        $sql1 = "UPDATE pessoas SET pessoaNome = '" . $pessoaNome . "', pessoaMorada = '" . $pessoaMorada . "', pessoaTelefone = '" . $pessoaTelefone . "', pessoaImagePath = '" . $file_path . "' WHERE pessoaId = " . $pessoaId;
        mysqli_query($con, $sql1);
    } else {  //NAO ATUALIZA IMAGEM, SÓ O PATH DA IMAGEM/NOME DA IMAGEM PARA O NOME ATUALIZADO
        /***********GET IMAGE EXISTING EXTENSION**********/
        $imgPathOriginal = "../" . $imgPathQuery['pessoaImagePath'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE); //opens file info
        $imgPathDB = finfo_file($finfo, $imgPathOriginal); //gets file path
        $file_extension = pathinfo($imgPathDB); //output is final extension
        $file_path = CIMAGEPATHPESSOAS . $pessoaNome . "." . $file_extension['filename']; //creates new file path from name
        /****************************************/
        rename($imgPathOriginal, "../" . $file_path); //renames original file in folder
        $sql2 = "UPDATE pessoas";
        $sql2 .= " SET pessoaNome = '" . $pessoaNome . "', pessoaMorada = '" . $pessoaMorada . "', pessoaTelefone = '" . $pessoaTelefone . "', pessoaImagePath = '" . $file_path . "' ";
        $sql2 .= " WHERE pessoaId = " . $pessoaId;
        mysqli_query($con, $sql2);
    }

    header("location: pessoas.php");
}
?>