<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM pessoas WHERE pessoaId = ".$_GET['id'];
$query = mysqli_query($con,$sql);
$pessoa = mysqli_fetch_assoc($query);

$sqlCartao = "SELECT * FROM cartoes WHERE cartaoPessoaId = ".$_GET['id'];
$queryC = mysqli_query($con,$sqlCartao);
$cartao = mysqli_fetch_assoc($queryC);

?>
<style>


</style>

<div id="infoContainer">
    <div id="textContainer">
        <p class="infoText">Nome</p>
        <p class="infoText">Morada</p>
        <p class="infoText">Telefone</p>
        <p class="infoText">Cartão</p>
    </div>
    <div id="infoTextContainer">
        <p class="infoText"><?php echo $pessoa['pessoaNome']?></p>
        <p class="infoText"><?php echo $pessoa['pessoaMorada']?></p>
        <p class="infoText"><?php echo $pessoa['pessoaTelefone']?></p>
        <p class="infoText">
            <?php
            if(!(isset($cartao))){
                echo "Esta pessoa não tem cartão associado";
            }else {
                echo $cartao['cartaoSaldo'] ?> &euro; (ID: <?php echo $cartao['cartaoId'] ?> ) <?php
            }
            ?>
        </p>
    </div>
    <div id="photoContainer">
        <img src="../<?php echo $pessoa['pessoaImagePath']?>" alt="">
    </div>

    <div id="closeContainer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
</div>


