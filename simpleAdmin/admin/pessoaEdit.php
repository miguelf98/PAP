<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>


<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM pessoas WHERE pessoaId =". $_GET['id'];
$query = mysqli_query($con,$sql);
$pessoa = mysqli_fetch_assoc($query);


?>
<body>
<?php drawSideBar(CMENUPESSOAS); ?>

<div id="wrapper">
    <?php drawTop(1);?>
</div>
<link rel="stylesheet" href="assets/css/component.css">
<script src="assets/js/jquery.custom-file-input.js"></script>
<div id="adminContainer">
    <div>
        <div class="cardDiv">
            <div class="cardTitle"><span class="cardTitleSpan">Atualizar pessoa (ID: <?php echo $pessoa['pessoaId']?>)</span></div>
            <div class="cardContent">
                <div class="loginmodal-container" style="background-color: inherit; box-shadow: none;">
                    <form action="pessoaConfirmEdit.php" method="post" enctype="multipart/form-data">
                        <span>Nome</span><input type="text" name="nomePessoa" value="<?php echo $pessoa['pessoaNome']?>" required>
                        <span>Morada</span><input type="text" name="moradaPessoa" value="<?php echo $pessoa['pessoaMorada']?>" required>
                        <span>Telefone</span><input type="text" name="telefonePessoa" value="<?php echo $pessoa['pessoaTelefone']?>" required>
                        <div class="inputBox">
                            <input type="file" name="imagePessoa" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple/>
                            <label for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Escolher ficheiro&hellip;</span></label>
                        </div>
                        <img style="margin-top: 15px;" src="../<?php echo $pessoa['pessoaImagePath']?>" alt="" height="90" width="160">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Atualizar pessoa" style="height: 50px; line-height: 1px; margin-top: 20px;">
                        <input type="hidden" value="<?php echo $pessoa['pessoaId']?>" name="idPessoa">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>
