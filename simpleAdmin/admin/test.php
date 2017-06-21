<?php
include_once "includes/body.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT pessoaId, pessoaNome, pessoaMorada, pessoaTelefone, pessoaImagePath FROM  pessoas WHERE pessoaId = ". $_GET['id'];
$query = mysqli_query($con,$sql);
$pessoa = mysqli_fetch_assoc($query);


$sqlCartao = "SELECT * FROM cartoes WHERE cartaoPessoaId = ".$_GET['id'];
$queryC = mysqli_query($con,$sqlCartao);
$cartao = mysqli_fetch_assoc($queryC);
?>
<div style="width: 585px; max-height: 250px;">
    <div id="textContainer">
        <p class="infoText">Nome</p>
        <p class="infoText">Morada</p>
        <p class="infoText">Telefone</p>
        <p class="infoText">Cartão</p>
    </div>
    <form action="testAJAX.php" method="post">
        <div id="infoTextContainer">

                <input type="text" class="infoTextInput" name="nomePessoa" value="<?php echo $pessoa['pessoaNome']?>"></input>
                <input type="text" class="infoTextInput" name="moradaPessoa" value="<?php echo $pessoa['pessoaMorada']?>"></input>
                <input type="text" class="infoTextInput" name="telefonePessoa" value="<?php echo $pessoa['pessoaTelefone']?>"></input>
                <input type="text" class="infoTextInput" name="saldoCartaoPessoa" value="<?php
                if(!(isset($cartao))){
                    echo "Esta pessoa não tem cartão associado";
                }else {
                    echo $cartao['cartaoSaldo'] ?> &euro; (ID: <?php echo $cartao['cartaoId'] ?> ) <?php
                }
                ?>">
                </input>

        </div>
            <div id="photoContainer" style="margin-top: 30px;">
                <img src="../<?php
                                if(file_exists("../".$pessoa['pessoaImagePath'])){
                                    echo $pessoa['pessoaImagePath'];
                                }else{
                                    echo 'images/default_user.png';
                                }
                                ?>" alt="">
                <input type="submit" value="Confirmar edição">
            </div>
    </form>
</div>

