<pre>
<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT pessoaId, pessoaNome, pessoaMorada, pessoaTelefone, pessoaImagePath FROM pessoas WHERE pessoaId =". $_GET['id'];
$query = mysqli_query($con,$sql);
$pessoa = mysqli_fetch_assoc($query);
print_r($pessoa);
?>
    </pre>


