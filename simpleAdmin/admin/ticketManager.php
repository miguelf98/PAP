<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>


<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM orders";
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);


?>
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
            display: inline-flex;
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
            display: inline-flex;
            width: 49%;
            min-height: 75px;
            background-color: inherit;
            border-radius: 5px;
            font-size: 25px;
            padding-left: 15px;
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
</script>

<div id="adminContainer" style="">
    <div class="tableContainer">
        <div id="tableTituloContainer"><span id="tabelaTitulo">Encomendas</span></div>
        <table id="adminTable">

        </table>
    </div>
</div>


<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/custom.js"></script>

</body>
</html>
