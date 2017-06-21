<?php
include_once "includes/body.inc.php";
session_start();

$valid = validateSession($_SESSION);
if($valid != 0){
    header("location: index.php");
}


drawHeader();
?>
<script>
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

    window.onload = loadCategs();
</script>
<body>
        <?php drawTopBar(); ?>
        <!-- /. NAV TOP  -->
        <?php drawSideBar(); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="margin-top: 100px;">
            <div id="page-inner">



            </div>
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                     Yeezy 4 Prez 2020 <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div>



    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
