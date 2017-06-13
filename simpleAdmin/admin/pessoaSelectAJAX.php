<pre>
<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT pessoaId, pessoaNome, pessoaMorada, pessoaTelefone, pessoaImagePath FROM pessoas WHERE pessoaId =". $_GET['id'];
$query = mysqli_query($con,$sql);
$pessoa = mysqli_fetch_assoc($query);

$sql = "SELECT cartaoId, cartaoSaldo, cartaoPessoaId FROM cartoes WHERE cartaoPessoaId = ". $_GET['id'];
print_r($pessoa);
?>
    </pre>


