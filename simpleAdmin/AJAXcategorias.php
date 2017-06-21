<?php
include_once "includes/functions.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM categorias";
$query = mysqli_query($con,$sql);
?>
<div class="row">
    <div class="col-lg-12" style="margin-left:5px;">
        <h2>Categorias</h2>
    </div>
</div>
<hr/>
<div id="squareContainer">
    <div class="productRow" >
        <?php while($categ = (mysqli_fetch_assoc($query))){ ?>
        <div class="div-square" onclick="loadProdutos(<?php echo $categ['categoriaId'] ?>)">
            <img src="<?php echo $categ['categoriaImagePath'] ?>" alt="">
            <h4><?php echo $categ['categoriaName'] ?></h4>
        </div>
        <?php }?>
    </div>
</div>
