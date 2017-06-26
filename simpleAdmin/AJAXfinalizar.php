<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$lines = file("orderProdutos.txt", FILE_IGNORE_NEW_LINES);
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


print_r($count);
print_r($preco);

?>
<style>
    #faturaFinalizadaContainer{
        width: 50%;
        margin: 0 auto;
    }

    #faturaFinalizadaContainer #buttons{
        margin-top: 25px;
    }

    #buttonFinalizar{
        color: #1d8325;
        border: 2px solid #1d8325;
        display: inline-flex;
        float: left;
        border-radius: 8px;
        width: 200px;
        height: 75px;
        font-size: 44px;
        line-height: 68px;
        padding-left: 15px;

    }

    #buttonCancelar{
        color: #fff;
        background-color: #df0000;
        display: inline-flex;
        float: right;
        border-radius: 8px;
        width: 200px;
        height: 75px;
        font-size: 44px;
        line-height: 75px;
        padding-left: 10px;
    }
</style>
<div style="border: 1px solid black; margin-bottom: 25px;"></div>
<div id="faturaFinalizadaContainer">
    <table class="table-fill">
        <thead>
        <tr>
            <th class="text-left"></th>
            <th class="text-left"></th>
            <th class="text-center"></th>
            <th class="text-center"></th>
        </tr>
        </thead>
        <tbody class="table-hover">
        <?php foreach($count as $key => $value){
            $sql = "SELECT * FROM produtos WHERE produtoId = ". $key;
            $query = mysqli_query($con,$sql);
            $prod = mysqli_fetch_assoc($query);
            $id = $prod['produtoId'] . " ";
            ?>
            <tr>
                <td style="width: 120px;"><img style="height: 96px;" src="<?php echo $prod['produtoImagePath']?>" alt=""></td>
                <td class="text-left"><?php echo $prod['produtoName']?></td>
                <td class="text-center"><?php echo $value;?></td>
                <td class="text-center"><?php echo $prod['produtoPreco']?> <div class="deleteProd"><img  src="images/delete.png" alt=""></div> </td>
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
    <div id="buttons">
        <a href="generateOrder.php" id="buttonFinalizar">Finalizar</a>
        <div id="buttonCancelar" onclick="loadCategs()">Cancelar</div>
    </div>
</div>
