<?php include_once "includes/body.inc.php"?>
<?php include_once "includes/config.inc.php"?>
<?php include_once "includes/functions.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>

<!-- ************* SQL ************** -->
<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM users";
$query = mysqli_query($con,$sql);


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


    <div id="adminContainer">
        <div class="tableContainer">
            <table class="adminTable">
                <tr>
                    <th>userId</th>
                    <th>user Name</th>
                    <th>user PW</th>
                    <th>user Permission</th>
                </tr>

                <?php while($user = mysqli_fetch_assoc($query)){
                    echo '<tr>';
                    echo '<td>'.$user['userId'].'</td>';
                    echo '<td>'.$user['userName'].'</td>';
                    echo '<td>'.shortenPassword($user['userPassword']).'...</td>';
                    echo '<td>'.$user['userPermission'].'</td>';
                    echo '</tr>';

                }?>
            </table>
        </div>
    <div>


    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>
</html>
