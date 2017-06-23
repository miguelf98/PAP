<?php
include_once "../admin/includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
session_start();

$lines = file("produtos.txt", FILE_IGNORE_NEW_LINES);
$countLine = count($lines);

    if(isset($_GET['id'])){
        $categ = $_GET['id'];
        $sql1 = "SELECT * FROM produtos WHERE produtoCategoriaId = ".$_GET['id'];
        $query = mysqli_query($con,$sql1);
        echo '<h3 onclick="loadCategs()">Produtos</h3>';
        while($prod = mysqli_fetch_assoc($query)){
            ?>
            <a onclick="addProduto(<?php echo $prod['produtoId']?>)" onmouseenter="loadFatura()" class="button"><?php echo $prod['produtoName']?></a><span style="margin-left: 10px; padding: 4px; border:1px solid red;"><?php echo $prod['produtoPreco']?>&euro;</span><br>
            <?php
        }
    }elseif(isset($_GET['pr'])){
        if($countLine < 5){
            $f=fopen("produtos.txt","a");
            fwrite($f,$_GET['pr']);
            fwrite($f,"\r\n");
            fclose($f);
        }
        $sql = "SELECT * FROM produtos WHERE produtoId = ".$_GET['pr'];
        $query = mysqli_query ($con,$sql);
        $result = mysqli_fetch_assoc($query);

        header("location: addProd.php?id=".$result['produtoCategoriaId']);
    }

?>




