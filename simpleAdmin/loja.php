<?php
include_once "includes/body.inc.php";
session_start();

$valid = validateSession($_SESSION);
if($valid != 0){
    header("location: index.php");
}


drawHeader();
?>
<script type="text/javascript">
    function loadCategs(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("page-inner").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AJAXcategorias.php", true);
        xhttp.send();
    }

    function loadProdutos(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("page-inner").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AJAXprodutos.php?id=" + id, true);
        xhttp.send();
    }

    function addProduto(id){
        document.getElementById("finalizarContainer").style.display = 'block';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("page-inner").innerHTML = this.responseText;
            }
        };

        xhttp.open("GET", "AJAXprodutos.php?pr=" + id, true);
        xhttp.send();
    }

    function loadFatura(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("faturaContainer").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AJAXfatura.php", true);
        xhttp.send();
    }

    function clearFatura(){
        document.getElementById("finalizarContainer").style.display = 'none';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("faturaContainer").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "clearFatura.php", true);
        xhttp.send();
    }

    function loadFinalizar(){
        //document.getElementById("finalizarContainer").style.display = 'none';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("page-inner").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AJAXfinalizar.php", true);
        xhttp.send();
    }

    function removeProd(id){
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "removeProd.php?id=" + id, true);
        xhttp.send();
    }

    function removeProdFin(id){
        loadFinalizar();
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "removeProd.php?id=" + id, true);
        xhttp.send();
    }

    setInterval(loadFatura,500);
    window.onload = loadCategs();
    window.onload = loadFatura();


</script>
<body>
    <!-- /. NAV TOP  -->
    <?php drawTopBar(); ?>

    <nav class="navbar-side" role="navigation" style="background-color: #fff;" >
        <div class="sidebar-collapse">
            <div id="faturaContainer">

            </div>
        </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="margin-top: 100px;" >
            <div id="page-inner">



            </div>
        </div>
    <?php ?>

    <div id="finalizarContainer">
        <div id="button" style="margin-top: 8px; margin-left: 30px;" onclick="loadFinalizar()">
            <img src="images/checkmark.png" alt="">
            <span>Confirmar compra</span>
        </div>
    </div>

    <div id="modalInfo" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="modal-body">
                    N�o tens saldo suficiente para adicionar este produto.
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
