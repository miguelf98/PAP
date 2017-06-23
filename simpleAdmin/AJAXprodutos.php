<script>
    function test(){
        alert (1);
    }
</script>
<?php
session_start();
include_once "includes/functions.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$lines = file("orderProdutos.txt", FILE_IGNORE_NEW_LINES);
$countLine = count($lines);

print_r($_SESSION);
if(isset($_GET['id'])){
    $sql = "SELECT * FROM produtos WHERE produtoCategoriaId = ". $_GET['id'];
    $query = mysqli_query($con,$sql);
    ?>
    <div class="row" onclick="loadCategs()" onload="loadFatura();">
        <div class="col-lg-12" style="margin-left:5px;">
            <h2>Produtos</h2>
        </div>
    </div>
    <hr/>
    <div id="squareContainer">
        <div class="productRow" >
            <?php while($prod = (mysqli_fetch_assoc($query))){ ?>
                <div class="div-square" onclick="addProduto(<?php echo $prod['produtoId'] ?>)">
                    <img src="<?php echo $prod['produtoImagePath'] ?>" alt="">
                    <h4><?php echo $prod['produtoName'] ?></h4>
                </div>
            <?php }?>
        </div>
    </div>

<?php
}elseif(isset($_GET['pr'])){
    if($countLine < 8){
        $f=fopen("orderProdutos.txt","a");
        fwrite($f,$_GET['pr']);
        fwrite($f,"\r\n");
        fclose($f);
    }
    $sql = "SELECT * FROM produtos WHERE produtoId = ".$_GET['pr'];
    $query = mysqli_query ($con,$sql);
    $result = mysqli_fetch_assoc($query);
    echo '<script>window.onload = test();</script>';
    header("location: AJAXprodutos.php?id=".$result['produtoCategoriaId']);
}?>




