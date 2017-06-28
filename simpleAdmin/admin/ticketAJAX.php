<?php
include_once "includes/config.inc.php";
include_once "includes/functions.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM  orders";
$query = mysqli_query($con,$sql);
?>


<style>



    .red{
        border:2px solid #ce0000;
        color: #ce0000;
    }

    .green{
        border:2px solid #4caf50;
        color: #2ba117;
    }

    td{
        font-size: 17px;
    }

    .ticketProdutosContainer{
        height: 85px;
        width: 100%;
        border-left: 1px solid #c9c9c9;
        border-bottom: 1px solid #c9c9c9;
    }

    .ticketProdutosContainer .produto{
        height: 98%;
        max-width: 17.5%;
        border-right: 1px solid #c9c9c9;

    }

    .produto img{
        max-height: 82px;
        display: inline-flex;
    }


    .produto span{
        display: inline-flex;
        padding-left: 15px;
        width: 35%;
        font-size: 1vw;
    }
</style>
<script>

</script>
<tr >
    <th style="width: 15%;"></th>
    <th style="width: 7.5%;">ID</th>
    <th style="width: 7.5%;">Número</th>
    <th>Produtos</th>
</tr>
<?php
while($order = mysqli_fetch_assoc($query)) {?>
<tr style="height: 90px;">
    <td>
        <div class="pedidoButton red" onclick="">Concluir</div>
        <div class="pedidoButton green">Entregar</div>
    </td>
    <td><?php echo $order['orderId'];?></td>
    <td><?php echo $order['orderNumber'];?></td>
    <td>
        <div class="ticketProdutosContainer">
            <div class="produto">
                <img src="../images/produtos/ucal.jpg" alt="">
                <span>Tosta Mista</span>
            </div>
        </div>
    </td>
</tr>
<?php
}
?>
