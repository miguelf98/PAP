<?php
include_once "includes/config.inc.php";
include_once "includes/functions.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM  orders";
$query = mysqli_query($con,$sql);
$j = 0;
?>
<tr >
    <th style="width: 15%;"></th>
    <th style="width: 7.5%;">ID</th>
    <th style="width: 7.5%;">Número</th>
    <th>Produtos</th>
</tr>

<?php
while($order = mysqli_fetch_assoc($query)) {
    if($order['orderStatus'] != 2){?>
<tr style="height: 90px;">
    <td onclick="<?php if($order['orderStatus'] == 0){echo "doneOrder(".$order['orderId'].",".$j.")";}else{echo "deliverOrder(".$order['orderId'].",".$j.")";}?>">
        <div style="<?php if($order['orderStatus'] == 0){echo "display: inline-flex;";}else{echo "display:none";}?>" class="pedidoButton red" onclick="">Concluir</div>
        <div style="<?php if($order['orderStatus'] == 1){echo "display: inline-flex;";}else{echo "display:none";}?>" class="pedidoButton green">Entregar</div>
    </td>
    <td><?php echo $order['orderId'];?></td>
    <td><?php echo $order['orderNumber'];?></td>
    <td><div class="ticketProdutosContainer">
        <?php
        $prods = $order['orderProdutosArray'];
        preg_match_all("/\[([^\]]*)\]/", $prods, $matches);
        $count2 = 0;
        preg_match_all("#\((([^()]+|(?R))*)\)#", $prods, $matchesQntd);
        $tempArr2 = array();
        $produtos = array();
        foreach($matches[1] as $id => $row){
            $tempArr2[$row] = $matchesQntd[1][$id];
        }

        foreach($tempArr2 as $id => $row){
            $sqlPr = "SELECT * FROM produtos WHERE produtoId = ". $id;
            $queryPr = mysqli_query($con,$sqlPr);
            $prod = mysqli_fetch_assoc($queryPr);
            ?>
            <div class="produto">
                <img src="../<?php echo $prod['produtoImagePath']?>" alt="">
                <div class="produtoName">
                    <span><?php echo $prod['produtoName']?> (<?php echo $row;?>)</span>
                </div>
            </div>
            <?php
        }
        ?>


        </div>
    </td>
</tr>
<?php
    $j++;
    }
}
?>
