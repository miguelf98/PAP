<?php
session_start();
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$lines = file("orderProdutos.txt", FILE_IGNORE_NEW_LINES);
$lines = array_map('trim',$lines);
$countLine = count($lines);

$contents = file_get_contents(  "orderProdutos.txt",FILE_USE_INCLUDE_PATH);
$array_list = (explode("\r\n",$contents));
$values = array_count_values($array_list);

$count = array();
$preco = 0;

foreach($lines as $line){
    $sql = "SELECT * FROM produtos WHERE produtoId = ". $line;
    $query = mysqli_query($con,$sql);
    $prod = mysqli_fetch_assoc($query);
    if (isset($values[$line])) { //passa valores para um array com key e valor [produtoId][produtoQntd]
        $count[$line] = $values[$line];
        $preco = $preco + $prod['produtoPreco'];
    }
}
$_SESSION['total'] = $preco;
print_r($count);
print_r($_SESSION['total']);
?>

<table class="table-fill">
    <thead>
        <tr>
            <th class="text-left">Nome</th>
            <th class="text-center">Qntd</th>
            <th class="text-center">Preço</th>
        </tr>
    </thead>
    <tbody class="table-hover">
    <?php foreach($count as $key => $value){
        $sql = "SELECT * FROM produtos WHERE produtoId = ". $key;
        $query = mysqli_query($con,$sql);
        $prod = mysqli_fetch_assoc($query);
        $id = $prod['produtoId'] . " ";
       ?>
        <tr onclick="removeProd(<?php echo $prod['produtoId'] ?>)">
            <td class="text-left"><?php echo $prod['produtoName']?></td>
            <td class="text-center"><?php echo $value;?></td>
            <td class="text-center">
                <span style="position: relative; float: left; padding-left: 35px;"><?php echo $prod['produtoPreco']?></span>
                <div class="deleteProd"><img src="images/delete.png" alt=""></div>
            </td>
        </tr>

        <?php

    }
    ?>


    <tr class="faturaFooter">
        <td colspan="2" ><?php echo $num = (count($array_list)) - 1;?> produtos</td>
        <td class="text-center"><?php echo $preco;?>&euro;</td>
    </tr>
    </tbody>
</table>

<a onclick="clearFatura()">Limpar Fatura</a>