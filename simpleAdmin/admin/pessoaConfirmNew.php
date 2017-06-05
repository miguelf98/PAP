<?php
include "includes/config.inc.php";
include "includes/functions.inc.php";
session_start();
$state = validateSessions($_SESSION['userId']);
print_r($_FILES);

if ($state == false){
    header("location: login.php?err");
}else {
    $con = mysqli_connect(DBCON, DBUSER, DBPW, DBNAME);
    if (!file_exists("../" . CIMAGEPATHPESSOAS)) {
        mkdir("../" . CIMAGEPATHPESSOAS, 0777, true);
    }
    $nomePessoa = $_POST['nome'];
    $moradaPessoa = $_POST['morada'];
    $telefonePessoa = $_POST['telefone'];
    $extensionRaw = $_FILES['imagePessoa']['name']; //get extension from file sent
    $file_extension = pathinfo($extensionRaw, PATHINFO_EXTENSION); //get extensions from file sent
    $file_path = CIMAGEPATHPESSOAS . $nomePessoa . "." . $file_extension; //create new file_path
    if (move_uploaded_file($_FILES["imagePessoa"]["tmp_name"], "../" . $file_path)) { //if file is uploaded successfully
        $sql = "INSERT INTO pessoas VALUES (0, '" . $nomePessoa . "','".$moradaPessoa."','".$telefonePessoa."' ,'" . $file_path . "')";
        mysqli_query($con, $sql);
        $_SESSION ['pessoaUploadOk'] = 1;
    }
}
echo '<pre>';
header("location: pessoas.php");


?>