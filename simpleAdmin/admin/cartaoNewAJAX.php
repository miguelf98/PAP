<?php
include_once "includes/config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT pessoaId, pessoaNome FROM pessoas WHERE pessoaNome LIKE '%". $_GET['srch'] ."%'";
$query = mysqli_query($con,$sql);

echo '<select size="12">';
while($pessoa = mysqli_fetch_assoc($query)){

    echo '<option value="'.$pessoa['pessoaId'].'" onclick="getValue(this.value)">'.$pessoa['pessoaNome'].'</option>';

}
echo '</select>';?>

