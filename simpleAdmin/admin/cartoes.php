<?php include_once "includes/body.inc.php"?>

<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>

<!-- ************* SQL ************** -->
<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
if(!(isset($_GET['p']))){
    $pageNum = 1;
}else{
    $pageNum = $_GET['p'];
}
$offset = $pageNum['p'] * CNUMROWS;
$sql = "SELECT * FROM cartoes LIMIT ".CNUMROWS." OFFSET ". $offset; //LIMIT E OFFSET AJUDAM NA PAGINAÇÃO";
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);


?>

<script>
    function hoverD(element){
        element.setAttribute('src', 'images/remove-button-hover.png')
    }

    function unhoverD(element){
        element.setAttribute('src', 'images/remove-button.png')
    }

</script>
<?php drawSideBar(CMENUCARTOES); ?>

<div id="wrapper">
    <?php drawTop(1);?>
</div>

<div id="adminContainer" style="float: left;">
    <div class="tableContainer">
        <div id="tableTituloContainer"><span id="tabelaTitulo">Cartões</span></div>
        <a href="cartaoNew.php" class="button green"> + Cartão</a>

        <table id="adminTable">
            <tr>
                <th style="width: 5%;"></th>
                <th style="width: 50px;">ID</th>
                <th style="width: 150px;">Saldo</th>
                <th>Pessoa Associada</th>
            </tr>

            <?php

            if ($count > 0){ //SE HOUVER REGISTOS
                while($cartao = mysqli_fetch_assoc($query)){
                    $sql2 = "SELECT pessoaNome FROM pessoas WHERE pessoaId = ".$cartao['cartaoPessoaId'];
                    $query2 = mysqli_query($con,$sql2);
                    $pessoa = mysqli_fetch_assoc($query2);
                    echo '<tr data-toggle="modal" data-target="#myModal" onclick="loadPessoaInfo('.$cartao["cartaoId"].')">';
                    echo '<td> <a href="userEdit.php?id=' .$cartao['cartaoId']. '"><img src="images/edit-button.png" height="32" width="32"></a>'; //EDIT BUTTON
                    echo '<a href="userDelete.php?id=' .$cartao['cartaoId']. '"><img onmouseover="hoverD(this)" onmouseout="unhoverD(this)" src="images/remove-button.png" height="32" width="32"></td>'; //REMOVE BUTTON
                    echo '<td><span>' .$cartao['cartaoId']. '</span></td>';
                    echo '<td>' .$cartao['cartaoSaldo']. ' &euro;</td>';
                    echo '<td>'.$pessoa['pessoaNome'].' ('.$cartao['cartaoPessoaId'].')</td>';
                    echo '</tr>';

                }
            }else{
                echo '<tr>';
                echo '<td colspan="5" style="text-align: center;">Não existem registos</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <span class="countRegisto"><?php echo $count;?> registo<?php if($count > 1){echo 's';}?></span>
        <?php pagination("cartoes");?>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="modal-body">

                </div>
            </div>

        </div>
    </div>
    <div>


        <script src="../assets/js/jquery-1.10.2.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/custom.js"></script>


