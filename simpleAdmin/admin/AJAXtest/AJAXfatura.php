<?php
include_once "../includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);

$lines = file("produtos.txt", FILE_IGNORE_NEW_LINES);

$preco = 0;

$contents = file_get_contents(  "produtos.txt",FILE_USE_INCLUDE_PATH);

$array_list = (explode("\r\n",$contents));

$values = array_count_values($array_list);

$count = array();




foreach($lines as $line){
    $sql = "SELECT * FROM produtos WHERE produtoId = ". $line;
    $query = mysqli_query($con,$sql);
    $prod = mysqli_fetch_assoc($query);
    if (isset($values[$line])) { //passa valores para um array com qntd
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
    <td colspan="4" style="border: none; text-align: right; font-weight: bolder;">total = <?php echo $preco;?></td>
</tr>
</table>
<style>

    th{
        border: 1px solid black;
    }
    td{
        border: 1px solid black;
    }

</style>




