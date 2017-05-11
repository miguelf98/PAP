<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>

<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM produtos";
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


<body>
<?php drawSideBar(CMENUPRODUTOS); ?>

<div id="wrapper">
    <?php drawTop(1);?>
</div>

<div id="adminContainer">
    <div class="tableContainer">
        <div id="tableTituloContainer"><span id="tabelaTitulo">Produtos</span></div>
        <a href="produtoNew.php" class="button"> + Produto</a>

        <table class="adminTable">
            <tr>
                <th style="width: 76px;"></th>
                <th style="width: 120px;">ID</th>
                <th>Nome</th>
                <th style="width: 125px;">Preco</th>
                <th>Image Path</th>
                <th>Categoria</th>
            </tr>
            <?php
            if ($count > 0){
                while($prod = mysqli_fetch_assoc($query)) {
                    $sql2 = "SELECT * FROM categorias WHERE categoriaId = " . $prod['produtoCategoriaId'];
                    $query2 = mysqli_query($con, $sql2);
                    $prodCateg = mysqli_fetch_assoc($query2);
                    ?>
                    <tr>
                        <?php
                        echo '<td> <a href="produtoEdit.php?id=' .$prod['produtoId']. '"><img src="images/edit-button.png" height="32" width="32"></a>'; //EDIT BUTTON
                        echo '<a href="produtoDelete.php?id=' .$prod['produtoId']. '"><img onmouseover="hoverD(this)" onmouseout="unhoverD(this)" src="images/remove-button.png" height="32" width="32"></td>'; //REMOVE BUTTON

                        ?>
                        <td><?php echo $prod['produtoId']; ?></td>
                        <td><?php echo $prod['produtoName']; ?></td>
                        <td><?php echo $prod['produtoPreco']; ?> &euro;</td>
                        <td><?php echo $prod['produtoImagePath']; ?></td>
                        <td><?php echo $prodCateg['categoriaName'].' ('.$prod['produtoCategoriaId'].')' ?></td>
                    </tr>
                    <?php
                }}else{
                echo '<tr>';
                echo '<td colspan="5" style="text-align: center; font-size: 18px;">Não existem registos</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <span><?php echo $count;?> registo<?php if($count > 1){echo 's';}?></span>
    </div>
</div>


<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/custom.js"></script>

</body>

