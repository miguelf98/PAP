<?php
include_once "includes/body.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
foreach($_POST as $key=>$value){
    $searchQuery = $key;
}
if(isset($_GET['srch'])){ //DEFINE O TERMO DE BUSCA MANDADO POR JS
    $searchQuery = $_GET['srch'];
}else{
    $searchQuery = "";
}


parse_str(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_QUERY), $queries);
if(!(isset($queries['p']))){
    $queries['p'] = "1";
}

if($searchQuery != ""){
    $searchTable = $_GET['sb'];
    $sql = "SELECT * FROM pessoas WHERE ".$searchTable." LIKE '%".$searchQuery."%'";
}elseif($searchQuery == ""){
    $offset = $queries['p'] * CNUMROWS;
    $offset -= CNUMROWS;
    $sql = "SELECT * FROM pessoas LIMIT ".CNUMROWS." OFFSET ".$offset; //LIMIT E OFFSET AJUDAM NA PAGINAÇÃO
}
var_dump($searchQuery);
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);
?>

<tr>
    <th style="width: 76px;"></th>
    <th style="width: 100px;">ID</th>
    <th>Nome</th>
    <th>Rua</th>
    <th>Telefone</th>
    <th>Image Path</th>
</tr>
<?php
if ($count > 0){ //SE HOUVER REGISTOS
    while($pessoa = mysqli_fetch_assoc($query)){
        echo '<tr data-toggle="modal" data-target="#myModal" onclick="loadPessoaInfo('.$pessoa["pessoaId"].')">';
        echo '<td> <a href="pessoaEdit.php?id=' .$pessoa['pessoaId']. '"><img src="images/edit-button.png" height="32" width="32"></a>'; //EDIT BUTTON
        echo '<a href="pessoaDelete.php?id=' .$pessoa['pessoaId']. '""><img onmouseover="hoverD(this)" onmouseout="unhoverD(this)" src="images/remove-button.png" height="32" width="32"></td>'; //REMOVE BUTTON
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
