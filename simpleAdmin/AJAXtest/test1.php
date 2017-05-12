<?php
include_once "../admin/includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);


if ( (!(isset($_GET['id']))) && (!(isset($_GET['pr'])))){
    $sql = "SELECT * FROM categorias";
    $query = mysqli_query($con,$sql);
    echo '<h3 onclick="reloadPage()">Categorias</h3>';
    while($categ = mysqli_fetch_assoc($query)){
    ?>
        <a onclick="loadProdutos(<?php echo $categ['categoriaId']?>)" class="button"><?php echo $categ['categoriaName']?></a><br>
    <?php
    }
}
?>