

<?php
include_once "../admin/includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);

$lines = file("produtos.txt", FILE_IGNORE_NEW_LINES);
$countLine = count($lines);

$contents = file_get_contents(  "produtos.txt",FILE_USE_INCLUDE_PATH);


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
echo '<table>';
echo '<tr>';
echo '<th>prod id</th>';
echo '<th>prod nome</th>';
echo '<th>prod preco</th>';
echo '<th>prod qnt</th>';
echo '<tr>';
foreach($count as $key => $value){
    $sql = "SELECT * FROM produtos WHERE produtoId = ". $key;
    $query = mysqli_query($con,$sql);
    $prod = mysqli_fetch_assoc($query);


    $id = $prod['produtoId'] . " ";
    echo '<tr>';
    echo '<td>'.$prod['produtoId'].'</td>';
    echo '<td>'.$prod['produtoName'].'</td>';
    echo '<td>'.$prod['produtoPreco'].'</td>';
    echo '<td>'.$value.'</td>';
    echo '</tr>';

   }
?>

<tr>
    <td colspan="2" style="border: none; text-align: left; font-weight: bolder;"><?php echo $num = (count($array_list)) - 1;?> prod</td>
    <td colspan="2" style="border: none; text-align: right; font-weight: bolder;">total = <?php echo $preco;?></td>
</tr>
</table>
<div id="buttonContainer">
    <button style="width: 100%; height: 45px;" onclick="clearFatura()">clear</button>
    <a href="generateOrder.php" class="button2 <?php if(empty($lines)){ echo 'not-active';}?>">push order</a>

</div>

<style>
    #buttonContainer{
        border: 1px solid black;
        height: 250px;
        width: 100px;
        float: right;
        position: relative;
        left: 45%;

    }
    th{
        border: 1px solid black;
    }
    td{
        border: 1px solid black;
    }

    a.button2 {
        -webkit-appearance: button;
        -moz-appearance: button;
        width: 100%;
        height: 45px;
        text-decoration: none;
        color: initial;
    }
    .not-active {
        pointer-events: none;
        cursor: default;
    }
</style>




