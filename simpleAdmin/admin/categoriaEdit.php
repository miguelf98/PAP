<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>

>
<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM categorias WHERE categoriaId =". $_GET['id'];
$query = mysqli_query($con,$sql);
$categ = mysqli_fetch_assoc($query);


?>
<body>
<?php drawSideBar(CMENUCATEGORIAS); ?>

<div id="wrapper">
    <?php drawTop(1);?>
</div>

<div id="adminContainer">
    <div>
        <div class="cardDiv">
            <div class="cardTitle"><span class="cardTitleSpan">Atualizar categoria (ID: <?php echo $categ['categoriaId']?>)</span></div>
            <div class="cardContent">
                <div class="loginmodal-container" style="background-color: inherit; box-shadow: none;">
                    <form action="categoriaConfirmEdit.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="nameCategoria" value="<?php echo $categ['categoriaName']?>" required>
                        <input type="file" name="imageCategoria">
                        <img style="margin-top: 15px;" src="../<?php echo $categ['categoriaImagePath']?>" alt="" height="90" width="160">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Atualizar categoria" style="height: 50px; line-height: 1px; margin-top: 20px;">
                        <input type="hidden" value="<?php echo $categ['categoriaId']?>" name="idCategoria">
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/custom.js"></script>

</body>
