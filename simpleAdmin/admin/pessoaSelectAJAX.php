<?php
include_once "includes/config.inc.php";
include_once "includes/functions.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT pessoaId, pessoaNome, pessoaMorada, pessoaTelefone, pessoaImagePath FROM  pessoas WHERE pessoaId = ". $_GET['id'];
$query = mysqli_query($con,$sql);
$pessoa = mysqli_fetch_assoc($query);


$sqlCartao = "SELECT * FROM cartoes WHERE cartaoPessoaId = ".$_GET['id'];
$queryC = mysqli_query($con,$sqlCartao);
$cartao = mysqli_fetch_assoc($queryC);
?>
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
<div id="photoContainer" style="margin-top: 30px;">
    <img src="../<?php
    if(file_exists("../".$pessoa['pessoaImagePath'])){
        echo $pessoa['pessoaImagePath'];
    }else{
        echo 'images/default_user.png';
    }

    ?>" alt="">
</div>





