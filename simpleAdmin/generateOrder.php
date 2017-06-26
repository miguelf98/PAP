
<?php
include_once "includes/body.inc.php";
session_start();
include_once "includes/config.inc.php";
include_once "includes/functions.inc.php";

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$orderNum = $_SESSION['ticket_number'];
$lines = file("orderProdutos.txt", FILE_IGNORE_NEW_LINES);
$contents = file_get_contents(  "orderProdutos.txt",FILE_USE_INCLUDE_PATH);
$array_list = (explode("\r\n",$contents));
$values = array_count_values($array_list);

$j = 1;
$count = array();
$orderPreco = 0;
$tempArr = "";
$orderProd = array();

foreach($lines as $line){
    $sql = "SELECT * FROM produtos WHERE produtoId = ". $line;
    $query = mysqli_query($con,$sql);
    $prod = mysqli_fetch_assoc($query);
    if (isset($values[$line])) { //passa valores para um array com key e valor [produtoId][produtoQntd]
        $count[$line] = $values[$line];
    }
}
$cnt = count($count);
foreach($count as $id => $row){
    $sql = "SELECT * FROM produtos WHERE produtoId = ". $id;
    $query = mysqli_query($con,$sql);
    $prod = mysqli_fetch_assoc($query);
    $tempArr = $id.", ".$row;
    $orderPreco += $prod['produtoPreco'] * $count[$id];
    for($i = 1; $i <= $cnt; $i++){
        $orderProd[$j] = $tempArr;
    }
    $j += 1;
}

$orderCount = count($orderProd);


for($i = 1; $i <= 5; $i++){
    if(!(isset($orderProd[$i]))){
        $orderProd[$i] = "0";
    }
}

$sql = "INSERT INTO orders ";
$sql .= "VALUES (0, '".$orderNum."', '".$orderPreco."', '".$orderProd[1]."', '".$orderProd[2]."', '".$orderProd[3]."', '".$orderProd[4]."', '".$orderProd[5]."', '".date("Y-m-d h:i:s")."', 0, ";
$sql .= "(SELECT cartaoId FROM pessoas INNER JOIN cartoes ON pessoaId = cartaoPessoaId WHERE pessoaId =  ".$_SESSION['pId']."))";

//clearFatura();
?>
<?php
drawHeader();
?>
    <body>
    <!-- /. NAV TOP  -->
        <?php drawTopBar(); ?>
        <div id="page-wrapper" style="margin-left: 0; margin-top: 100px;" >
            <div id="page-inner">
                <?php
                    var_dump($orderProd);
                    print_r($orderPreco);
                    print_r($_SESSION);
                    echo $sql;
                ?>
            </div>
        </div>
    <?php ?>





    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
