<pre>
<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT orderNumber FROM orders WHERE orderId = ".$_GET['id'];
$query = mysqli_query($con,$sql);
$orderNum = mysqli_fetch_assoc($query);
print_r($orderNum);
?>
    </pre>
