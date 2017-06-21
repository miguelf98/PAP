<?php
include_once "includes/functions.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM produtos WHERE produtoCategoriaId = ". $_GET['id'];
$query = mysqli_query($con,$sql);
?>
<div class="row">
    <div class="col-lg-12" style="margin-left:5px;">
        <h2>Produtos</h2>
    </div>
</div>
<hr/>
<div id="squareContainer">
    <div class="productRow" >
        <?php while($prod = (mysqli_fetch_assoc($query))){ ?>
            <div class="div-square" onclick="loadProdutos(<?php echo $prod['produtoId'] ?>)">
                <img src="<?php echo $prod['produtoImagePath'] ?>" alt="">
                <h4><?php echo $prod['produtoName'] ?></h4>
            </div>
        <?php }?>
    </div>
</div>


