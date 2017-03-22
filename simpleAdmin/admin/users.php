<?php include_once "includes/body.inc.php"?>

<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>

<!-- ************* SQL ************** -->
<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM users";
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);

$sql2 = "SELECT * FROM permissions WHERE "


?>

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
<body>
    <?php drawSideBar(CMENUUSERS); ?>

    <div id="wrapper">
        <?php drawTop(1);?>
    </div>


    <div id="adminContainer" style="border: 1px solid black; float: left;">
        <div class="tableContainer">
            <a href="newUser.php" class="button"> + Utilizador</a>

            <table class="adminTable">
                <tr>
                    <th style="width: 100px;"></th>
                    <th>userID</th>
                    <th>user Name</th>
                    <th>user PW</th>
                    <th>user Permission</th>
                </tr>

                <?php

                if ($count > 0){
                    while($user = mysqli_fetch_assoc($query)){
                        $sql2 = "SELECT * FROM permissions WHERE permissionId = ". $user['userPermissionId'];
                        $query2 = mysqli_query($con,$sql2);
                        $permission = mysqli_fetch_array($query2);
                        echo '<tr>';
                        echo '<td> <a class="editLink" href="userEdit?id=' .$user['userId']. '">E</a> </td>';
                        echo '<td><span>' .$user['userId']. '</span></td>';
                        echo '<td>' .$user['userName']. '</td>';
                        echo '<td>' .shortenPassword($user['userPW']). '...</td>';
                        echo '<td>' .$permission['permissionName']. ' (' .$permission['permissionLevel']. ')</td>';
                        echo '</tr>';

                    }
                }else{
                    echo '<tr>';
                    echo '<td colspan="5" style="text-align: center;">Não existem registos</td>';
                    echo '</tr>';
                }
                ?>
            </table>
            <span><?php echo $count;?> registo<?php if($count > 1){echo 's';}?></span>
        </div>
    <div>


    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>
</html>
