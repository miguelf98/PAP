<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId'])?>


<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM permissions";
$query = mysqli_query($con,$sql);
?>
<body>
    <?php drawSideBar(CMENUUSERS); ?>

    <div id="wrapper">
        <?php drawTop(1);?>
    </div>


    <div id="adminContainer">
        <div>
            <div class="cardDiv">
                <div class="cardTitle"><span class="cardTitleSpan">Adicionar um novo utilizador</span></div>
                <div class="cardContent">
                    <div class="loginmodal-container" style="background-color: inherit; box-shadow: none;">
                        <form action="userConfirmNew.php" method="post">
                            <input type="text" name="user" placeholder="Username" required>
                            <input type="password" name="pass" placeholder="Password" required>
                            <select name="permission" id="permissions" required><?php
                                while($permission = mysqli_fetch_assoc($query)){
                                echo '<option value="'.$permission['permissionId'].'">'.$permission['permissionName'].'</option>';
                                }

                            ?></select>
                            <input type="submit" name="login" class="login loginmodal-submit" value="Registar" style="height: 25px; line-height: 1px; margin-top: 25px;">
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
