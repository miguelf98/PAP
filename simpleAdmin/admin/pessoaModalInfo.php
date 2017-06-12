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
    #infoContainer{
        border-left: 1px solid #e5e5e5;
        min-height: 200px;
    }

    #textContainer{
        width: 100px;
        display: inline-block;
        float: left;
        height: 150px;
        margin-left: 10px;
    }

    .infoText{
        margin-top: 16px;
        border-bottom: 1px solid #e5e5e5;
    }

    #textContainer  .infoText {
        font-size: 22px;
    }

    #infoTextContainer{
        height: 160px;
        display: inline-block;
    }

    #closeContainer{
        right: 0;
        bottom: 0;
        position: fixed;
        padding-right: 15px;
        padding-bottom: 15px;
    }
    #photoContainer{
        max-height: 160px;
        max-width: 120px;
        float: right;
        margin-right: 150px;
    }
    #photoContainer img{
        max-width: 120px;
    }


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
        <p class="infoText"><?php echo $cartao['cartaoSaldo']?> &euro; (ID: <?php echo $cartao['cartaoId']?>)</p>
    </div>
    
    <div id="photoContainer">
        <img src="../<?php echo $pessoa['pessoaImagePath']?>" alt="">
    </div>

    <div id="closeContainer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
</div>


