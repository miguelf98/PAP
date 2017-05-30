<?php include_once "includes/body.inc.php"?>

<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>

<!-- ************* SQL ************** -->
<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM cartoes";
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
<script>
    function loadPessoaInfo(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("modal-body").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "pessoaModalInfo.php?id=" + id, true);
        xhttp.send();
    }
</script>
<div id="adminContainer" style="float: left;">
    <div class="tableContainer">
        <div id="tableTituloContainer"><span id="tabelaTitulo">Cartões</span></div>
        <a href="pessoaNew.php" class="button"> + Cartão</a>

        <table class="adminTable">
            <tr>
                <th style="width: 76px;"></th>
                <th style="width: 100px;">ID</th>
                <th>Pessoa Nome</th>
                <th>Pessoa Rua</th>
                <th>Pessoa Telefone</th>
            </tr>

            <?php

            if ($count > 0){ //SE HOUVER REGISTOS
                while($pessoa = mysqli_fetch_assoc($query)){
                    echo '<tr data-toggle="modal" data-target="#myModal" onclick="loadPessoaInfo('.$pessoa["pessoaId"].')">';
                    echo '<td> <a href="userEdit.php?id=' .$pessoa['pessoaId']. '"><img src="images/edit-button.png" height="32" width="32"></a>'; //EDIT BUTTON
                    echo '<a href="userDelete.php?id=' .$pessoa['pessoaId']. '"><img onmouseover="hoverD(this)" onmouseout="unhoverD(this)" src="images/remove-button.png" height="32" width="32"></td>'; //REMOVE BUTTON
                    echo '<td><span>' .$pessoa['pessoaId']. '</span></td>';
                    echo '<td>' .$pessoa['pessoaNome']. '</td>';
                    echo '<td>' .$pessoa['pessoaMorada']. '</td>';
                    echo '<td>' .$pessoa['pessoaTelefone']. '</td>';
                    echo '</tr>';

                }
            }else{
                echo '<tr>';
                echo '<td colspan="5" style="text-align: center;">Não existem registos</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <span><?php echo $count;?> registo<?php if($count > 1){echo 's';}?></span>
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


