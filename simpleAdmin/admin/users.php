<?php include_once "includes/body.inc.php"?>

<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>

<!-- ************* SQL ************** -->
<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
if(!(isset($_GET['p']))){
    $pageNum = 1;
}else{
    $pageNum = $_GET['p'];
}
$offset = $pageNum['p'] * CNUMROWS;
$sql = "SELECT * FROM users LIMIT ".CNUMROWS." OFFSET ". $offset; //LIMIT E OFFSET AJUDAM NA PAGINAÇÃO";
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);



?>

<script>
    function hoverD(element){
        element.setAttribute('src', 'images/remove-button-hover.png')
    }

    function unhoverD(element){
        element.setAttribute('src', 'images/remove-button.png')
    }

</script>
    <?php drawSideBar(CMENUUSERS); ?>

    <div id="wrapper">
        <?php drawTop(1);?>
    </div>


    <div id="adminContainer" style="float: left;">
        <div class="tableContainer">
            <div id="tableTituloContainer"><span id="tabelaTitulo">Utilizadores</span></div>
            <a href="userNew.php" class="button green"> + Utilizador</a>

            <table id="adminTable">
                <tr>
                    <th style="width: 76px;"></th>
                    <th style="width: 100px;">ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Permission</th>
                </tr>

                <?php

                if ($count > 0){ //SE HOUVER REGISTOS
                    while($user = mysqli_fetch_assoc($query)){
                        $sql2 = "SELECT * FROM permissions WHERE permissionId = ". $user['userPermissionId']; //VAI BUSCAR PERMISSÕES DE CADA UTILIZADOR
                        $query2 = mysqli_query($con,$sql2);
                        $permission = mysqli_fetch_array($query2);
                        echo '<tr>';
                        echo '<td> <a href="userEdit.php?id=' .$user['userId']. '"><img src="images/edit-button.png" height="32" width="32"></a>'; //EDIT BUTTON
                        echo '<a href="userDelete.php?id=' .$user['userId']. '"><img onmouseover="hoverD(this)" onmouseout="unhoverD(this)" src="images/remove-button.png" height="32" width="32"></td>'; //REMOVE BUTTON
                        echo '<td><span>' .$user['userId']. '</span></td>'; //DISPLAY USER ID
                        echo '<td>' .$user['userName']. '</td>'; // DISPLAY USER NAME
                        echo '<td>' .shortenPassword($user['userPw']). '...</td>'; //DISPLAY PASSWORD (HASHED, SHORTENED)
                        echo '<td>' .$permission['permissionName']. ' (' .$permission['permissionLevel']. ')</td>'; //DISPLAY PERMISSION(PERMISSION LEVEL)
                        echo '</tr>';

                    }
                }else{
                    echo '<tr>';
                    echo '<td colspan="5" style="text-align: center;">Não existem registos</td>';
                    echo '</tr>';
                }
                ?>
            </table>
            <span class="countRegisto"><?php echo $count;?> registo<?php if($count > 1){echo 's';}?></span>
            <?php pagination("users");?>
        </div>
    <div>

    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>


