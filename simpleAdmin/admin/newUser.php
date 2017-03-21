<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Administration</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/adminStylesheet.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>

</head>
<?php
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
                        <form action="confirmNewUser.php" method="post">
                            <input type="text" name="user" placeholder="Username">
                            <input type="password" name="pass" placeholder="Password">
                            <select name="permission" id="permissions"><?php
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
</html>
