<pre>
<?php
include_once "includes/config.inc.php";
include_once "includes/functions.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM  orders";
$query = mysqli_query($con,$sql);
while($order = mysqli_fetch_assoc($query)){

    for($i = 1; $i > 5; $i++){
        echo ${"order['orderProduto". $i . "']"};
    }
}
?>
    </pre>
