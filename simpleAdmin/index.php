<?php
session_start();
if(isset($_SESSION)){
    session_abort();
}else{
    session_abort();
}
include_once "food.svg";?>
<?php include_once "includes/body.inc.php";?>

<?php drawHeader();
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);




?>
<body>
<script>
    function selectPerson(id){
        document.getElementById('form-1').submit();
    }
</script>
<div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <!-- PHP ICON <svg class="icon" id="logo">
                        <use xlink:href="#sandwich"/>
                    </svg> -->
                    <img src="images/store.png" style="width: 80px;">
                </a>
            </div>
        </div>
    </div>
    <form action="startLojaSession.php" method="post" id="form-1">
        <div style="margin-top: 125px; height: 80%;">
            <?php $con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
            $sql = "SELECT pessoaId, pessoaNome FROM pessoas";
            $query = mysqli_query($con,$sql);
            echo '<select size="8" name="id_pessoa" id="id_pessoa">';
            while($pessoa = mysqli_fetch_assoc($query)){

                echo '<option value="'.$pessoa['pessoaId'].'" onclick="selectPerson(this.value)">'.$pessoa['pessoaNome'].'</option>';

            }
            echo '</select>';?>

        </div>
        <input type="hidden" id="session_token" name="session_token" value="<?php echo randStr(); ?>"> <!-- ESTA FUNÇÃO É SUBSTITUIDA PELO NUMERO DE RFID DO CARTÃO
                                                                                                        PORTANTO QUANDO LER O CARTÃO VAI INICIAR A SESSÃO -->
    </form>
    <div class="footer">
        Yeezy 4 Prez 2020 <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
    </div>



    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
