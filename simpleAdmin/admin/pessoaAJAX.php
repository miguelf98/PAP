<?php
include_once "includes/config.inc.php";
include_once "includes/body.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$searchState = false;

foreach($_POST as $key=>$value)
{
    $searchState = true;
    $searchQuery = $key;
}

if($searchState == true){
    $sql = "SELECT * FROM pessoas WHERE pessoaNome LIKE '%".$searchQuery."%'";
}else{
    $sql = "SELECT * FROM pessoas LIMIT ".CNUMROWS." OFFSET ".$offset; //LIMIT E OFFSET AJUDAM NA PAGINAÇÃO
}

$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);
?>

<tr>
    <th style="width: 76px;"></th>
    <th style="width: 100px;">ID</th>
    <th>Pessoa Nome</th>
    <th>Pessoa Rua</th>
    <th>Pessoa Telefone</th>
    <th>Pessoa Image Path</th>
</tr>
<?php
if ($count > 0){ //SE HOUVER REGISTOS
    while($pessoa = mysqli_fetch_assoc($query)){
        echo '<tr data-toggle="modal" data-target="#myModal" onclick="loadPessoaInfo('.$pessoa["pessoaId"].')">';
        echo '<td> <a href="userEdit.php?id=' .$pessoa['pessoaId']. '"><img src="images/edit-button.png" height="32" width="32"></a>'; //EDIT BUTTON
        echo '<a href="userDelete.php?id=' .$pessoa['pessoaId']. '"><img onmouseover="hoverD(this)" onmouseout="unhoverD(this)" src="images/remove-button.png" height="32" width="32"></td>'; //REMOVE BUTTON
        echo '<td><span>' .$pessoa['pessoaId']. '</span></td>';
        echo '<td>' .$pessoa['pessoaNome']. '</td>';
        echo '<td>' .$pessoa['pessoaMorada']. '</td>';
        echo '<td>' .$pessoa['pessoaTelefone']. '</td>';
        echo '<td>' .$pessoa['pessoaImagePath']. '</td>';
        echo '</tr>';

    }
}else{
    echo '<tr>';
    echo '<td colspan="5" style="text-align: center;">Não existem registos</td>';
    echo '</tr>';
}

?>
<span class="countRegisto"><?php echo $count;?> registo<?php if($count > 1){echo 's';}?></span>
