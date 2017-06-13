<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>


<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
?>
<body>
<?php drawSideBar(CMENUCARTOES); ?>
<style>
    input[type=number]{
        -moz-appearance: textfield;
    }
</style>
<div id="wrapper">
    <?php drawTop(1);?>
</div>
<link rel="stylesheet" href="assets/css/component.css">
<script>
    function loadNames(string){
        console.log(string);

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("selectHolder").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "cartaoNewAJAX.php?srch=" + string, true);
        xhttp.send();
    }

    function getValue(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pessoaInfo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "pessoaSelectAJAX.php?id=" + id, true);
        xhttp.send();
    }
</script>
<div id="adminContainer">
    <div>
        <div class="cardDiv">
            <div class="cardTitle"><span class="cardTitleSpan">Adicionar um novo cartão</span></div>
            <div class="cardContent" style="">
                <div class="newFormContainer" style="background-color: inherit; box-shadow: none;">
                    <form action="cartaoConfirmNew.php" method="post" enctype="multipart/form-data">
                        <div class="cell1">
                            <div class="input-group">
                                <input type="text" placeholder="0.00" name="saldoCartao" class="inputBoxCurrency" value="0" required/>
                                <span>&euro;</span>
                            </div>
                            <div id="namePicker" >

                                <div class="inputHolder">
                                    <input  type="text" onkeyup="loadNames(this.value)" placeholder="Procurar pessoa" style="width: 215px;">
                                </div>



                            </div>
                            <div id="selectHolder">

                            </div>
                            <input type="submit" name="login" class="login loginmodal-submit" value="Adicionar Novo Cartão" style="height: 25px; line-height: 1px; margin: 0 auto; margin-top: 25px; width: 200px;">
                        </div>
                        <div class="cell2">
                            <div id="pessoaInfo" style="height: 327px;">

                            </div>
                        </div>
                        <div class="cell3">
                            <div id="pessoaInfo" style="height: 327px;">

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>


    <div>


        <script src="../assets/js/jquery-1.10.2.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/custom.js"></script>

</body>
