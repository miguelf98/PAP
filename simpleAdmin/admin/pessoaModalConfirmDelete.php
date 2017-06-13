<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM pessoas WHERE pessoaId = ".$_GET['id'];
$query = mysqli_query($con,$sql);
$pessoa = mysqli_fetch_assoc($query);

?>
<style>
    #spanContainer{
        width: 100%;
        margin-left: 10px;
        display:block;
    }
</style>
<div id="infoContainer">
    <div id="textContainer">
        <p class="infoText">ID</p>
        <p class="infoText">Nome</p>
    </div>
    <div id="infoTextContainer">
        <p class="infoText"><?php echo $pessoa['pessoaId']?></p>
        <p class="infoText"><?php echo $pessoa['pessoaNome']?></p>
    </div>
    <div id="spanContainer">
        <span>Podem haver registos associados com esta pessoa, tem a certeza que quer apagar ao risco de apagar todos os registos associados?</span>
    </div>
    <div id="closeContainer" style="float: right;">
        <a type="button" class="btn btn-danger" href="pessoaDelete.php?id=<?php echo $_GET['id']?>">Apagar Registo</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>
</div>