<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>


<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM orders";
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);


?>
<style>
    .red{
        border:2px solid #ce0000;
        color: #ce0000;
    }

    .green{
        border:2px solid #4caf50;
        color: #2ba117;
    }

    td{
        font-size: 17px;
    }

    .ticketProdutosContainer{
        height: 85px;
        width: 100%;
        border-left: 1px solid #c9c9c9;
        border-bottom: 1px solid #c9c9c9;
    }

    .ticketProdutosContainer .produto{
        height: 98%;
        max-width: 20%;
        border-right: 1px solid #c9c9c9;
        display: inline-flex;

    }

    .produto img{
        max-height: 82px;
        display: inline-flex;
    }
    .produtoName{
        display: inline-flex;
        top: 10px;
        width: 35%;
        margin-left: 5px;
    }

    .produtoName span{


        font-size: 1vw;
    }
</style>
<body>
<?php
if ($_SESSION['permission'] < CMODERATOR){
    drawSideBar(CMENUTICKETMANAGER);
    ?>
    <style>
        #adminContainer{
            width: 88%;
        }
        .pedidoButton{

            width: 48%;
            min-height: 75px;
            background-color: inherit;
            border-radius: 5px;
            font-size: 1.25vw;
            padding-left: 6px;
            line-height: 70px;
        }
    </style>

    <?php

}else{?>
    <style>
        #adminContainer{
            margin-left: 0px;
            width: 100%;
        }
        .pedidoButton{
            width: 99%;
            min-height: 75px;
            background-color: inherit;
            border-radius: 5px;
            font-size: 25px;
            padding-left: 32.5%;
            line-height: 70px;
        }
    </style>
    <?php
}

?>

<div id="wrapper">
    <?php drawTop(1);?>
</div>
<script>
    function loadOrders(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("adminTable").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "ticketAJAX.php", true);
        xhttp.send();
    }

    window.onload = loadOrders();
    setInterval(loadOrders, 450);
    function doneOrder(num, count) {
        document.querySelectorAll('.red')[count].style.display = "none";
        document.querySelectorAll('.green')[count].style.display = "inline-flex";
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../ticketDisplay/popPrepare.php?id=" + num, true);
        xhttp.send();

    }
    function deliverOrder(num, count) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../ticketDisplay/popOrder.php?id=" + num, true);
        xhttp.send();
    }


</script>


<div id="adminContainer" style="">
    <div class="tableContainer">
        <div id="tableTituloContainer"><span id="tabelaTitulo">Encomendas</span></div>
        <table id="adminTable">

        </table>
    </div>
</div>


<script src="assets/js/jquery-3.2.0.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/custom.js"></script>

</body>
</html>