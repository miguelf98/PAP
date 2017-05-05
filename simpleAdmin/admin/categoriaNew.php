<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>

>
<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM categorias";
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);



?>
<body>
    <?php drawSideBar(CMENUCATEGORIAS); ?>

    <div id="wrapper">
        <?php drawTop(1);?>
    </div>

    <div id="adminContainer">
        <div >
            <div class="cardDiv">
                <div class="cardTitle"><span class="cardTitleSpan">Inserir nova categoria</span></div>

                <div class="cardContent">
                    <div class="loginmodal-container" style="background-color: inherit; box-shadow: none;">
                        <form action="categoriaConfirmNew.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="nameCategoria" placeholder="Nome da Categoria" required>
                            <input type="file" name="imageCategoria">
                            <input type="submit" name="login" class="login loginmodal-submit" value="Inserir" style="height: 50px; line-height: 1px; margin-top: 50px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($_SESSION['categUploadOK'])){?>
            <input type="hidden" class="uploadOK" value="<?php echo $_SESSION['categUploadOK']?>">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>Some text in the Modal..</p>
                </div>
            </div>
        <?php }
        print_r($_SESSION);
        ?>
    </div>

    <script>
        if (document.getElementsByClassName("uploadOK").length) {
            var modal = document.getElementById('myModal');


            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];


            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
        }</script>
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>
</html>
