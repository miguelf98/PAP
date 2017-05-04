<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId'])?>


<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);

/***************** USER QUERY ***********/
$sql = "SELECT * FROM users WHERE userId = ". $_GET['id'];
$query = mysqli_query($con,$sql);
$user = mysqli_fetch_assoc($query);

/***************** PERMISSION QUERY ***********/
$sql2 = "SELECT * FROM permissions";
$query2 = mysqli_query($con,$sql2);


?>
<body>
    <?php drawSideBar(CMENUUSERS); ?>

    <div id="wrapper">
        <?php drawTop(1);?>
    </div>


    <div id="adminContainer">
        <div>
            <div class="cardDiv">
                <div class="cardTitle"><span class="cardTitleSpan">Editar utilizador (ID: <?php echo $user['userId']; ?>)</span></div>
                <div class="cardContent">
                    <div class="loginmodal-container" style="background-color: inherit; box-shadow: none;">
                        <form action="userConfirmEdit.php" method="post">
                            <input type="text" name="user" value="<?php echo $user['userName'] ?>" required>
                            <select name="permission" id="permissions" required><?php
                                while($permission = mysqli_fetch_assoc($query2)){?>
                                    <option value="<?php echo $permission['permissionId'] ?>" <?php if($permission['permissionId'] === $user['userPermissionId']){echo 'selected';}?>><?php echo $permission['permissionName']?></option>';
                                <?php
                                }

                                ?></select>
                            <input type="submit" name="login" class="login loginmodal-submit" value="Confirmar edição" style="height: 50px; line-height: 1px; margin-top: 25px; font-size: 18px;">
                            <input type="hidden" value="<?php echo $user['userId'];?>" name="idUser">
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
