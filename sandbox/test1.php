<?php
include_once "../simpleAdmin/admin/includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);


if (!(isset($_GET['id']))){
    $sql = "SELECT * FROM categorias";
    $query = mysqli_query($con,$sql);
    echo '<h3>Categorias</h3>';
    while($categ = mysqli_fetch_assoc($query)){
    ?>
        <a onclick="loadProdutos(<?php echo $categ['categoriaId']?>)" class="button"><?php echo $categ['categoriaName']?></a><br>
    <?php
    }
}else{
    $sql1 = "SELECT * FROM produtos WHERE produtoCategoriaId = ".$_GET['id'];
    $query = mysqli_query($con,$sql1);
    echo '<h3 onclick="reloadPage()">Produtos</h3>';
    while($prod = mysqli_fetch_assoc($query)){
        ?>
        <a onclick="reloadPage()" class="button"><?php echo $prod['produtoName']?></a><br>
        <?php
    }
}
?>