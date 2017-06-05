<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>

<?php

$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM categorias";
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
    <?php drawSideBar(CMENUCATEGORIAS); ?>

    <div id="wrapper">
        <?php drawTop(1);?>
    </div>

    <div id="adminContainer">
        <div class="tableContainer">
            <div id="tableTituloContainer"><span id="tabelaTitulo">Categorias</span></div>
            <a href="categoriaNew.php" class="button"> + Categoria</a>
            <table id="adminTable">
                <tr>
                    <th style="width: 76px;"></th>
                    <th style="width: 120px;">ID</th>
                    <th>Nome</th>
                    <th>Image Path</th>
                </tr>
                <?php
                if ($count > 0){
                    while($categ = mysqli_fetch_assoc($query)) {
                        $sql2 = "SELECT * FROM categorias WHERE categoriaId = " . $categ['categoriaId'];
                        $query2 = mysqli_query($con, $sql2);
                        ?>
                        <tr>
                            <?php
                            echo '<td> <a href="categoriaEdit.php?id=' .$categ['categoriaId']. '"><img src="images/edit-button.png" height="32" width="32"></a>'; //EDIT BUTTON
                            echo '<a href="categoriaDelete.php?id=' .$categ['categoriaId']. '"><img onmouseover="hoverD(this)" onmouseout="unhoverD(this)" src="images/remove-button.png" height="32" width="32"></td>'; //REMOVE BUTTON

                            ?>
                            <td><?php echo $categ['categoriaId']; ?></td>
                            <td><?php echo $categ['categoriaName']; ?></td>
                            <td><?php echo $categ['categoriaImagePath']; ?></td>
                        </tr>
                        <?php
                    }}else{
                        echo '<tr>';
                        echo '<td colspan="5" style="text-align: center; font-size: 18px;">Não existem registos</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            <?php pagination("categorias"); //NOME DA TAB DE DADOS PRINCIPAL DA PÁGINA?>
            <span class="countRegisto"><?php echo $count;?> registo<?php if($count > 1){echo 's';}?></span>
        </div>
    </div>


    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>

