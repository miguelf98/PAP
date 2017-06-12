<?php include_once "includes/body.inc.php"?>

<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>

<!-- ************* SQL ************** -->
<?php

$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM pessoas LIMIT ".CNUMROWS." OFFSET ".$offset; //LIMIT E OFFSET AJUDAM NA PAGINAÇÃO
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);



?>
<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    function hoverD(element){
        element.setAttribute('src', 'images/remove-button-hover.png')
    }

    function unhoverD(element){
        element.setAttribute('src', 'images/remove-button.png')
    }


</script>
<?php drawSideBar(CMENUPESSOAS); ?>

<div id="wrapper">
    <?php drawTop(1);?>
</div>
<script>
    function loadPessoaInfo(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("modal-body").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "pessoaModalInfo.php?id=" + id, true);
        xhttp.send();
    }

    function loadConfirmDelete(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("modal-body").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "pessoaModalConfirmDelete.php?id=" + id, true); //wow comprido
        xhttp.send();
    }

   function loadPessoas(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("adminTable").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "pessoaAJAX.php", true);
        xhttp.send();
    }

    window.onload = loadPessoas();
</script>
<div id="adminContainer" style="float: left;">
    <div class="tableContainer">
        <div id="tableTituloContainer"><span id="tabelaTitulo">Pessoas</span></div>
        <a href="pessoaNew.php" class="button green"> + Pessoa</a>


        <?php
        $sqlS = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'pessoas'";
        $queryS = mysqli_query($con,$sqlS);
        ?>
        <div id="searchContainer">
            <input type="text" onkeyup="search(this.value)" id="searchBox" onblur="checkWidth(this.value)">
            <div id="searchOptions" onload="test()">
                <span class="text" style="color: #a8a8a8;">Procurar por...</span>
                <select name="searchby" id="searchBy" class="select-style" onchange="selectSearch()"><?php
                    while($columnName = mysqli_fetch_assoc($queryS)){
                        if (strpos($columnName['COLUMN_NAME'], 'Id') !== false) {
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        echo '<option value="'.$columnName['COLUMN_NAME'].'" '.$selected.'> '.$columnName['COLUMN_NAME'].'</option>';
                    }
                    ?></select>
            </div>
        </div>


        <table id="adminTable">

        </table>
        <?php pagination("pessoas"); //NOME DA TAB DE DADOS PRINCIPAL DA PÁGINA?>


    </div>

    <div id="modalInfo" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="modal-body">

                </div>
            </div>
        </div>
    </div>
    <div>





