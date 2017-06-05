<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>


<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM categorias";
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);


?>
<body>
<?php
if ($_SESSION['permission'] < CMODERATOR){
    drawSideBar(CMENUTICKETMANAGER);
}

?>

<div id="wrapper">
    <?php drawTop(1);?>
</div>
<style>

</style>

<div id="adminContainer">
    <div class="tableContainer">
        <table id="adminTable">
            <tr>
                <th style="width: 100px;"></th>
                <th>categoriaId</th>
                <th>categoria Nome</th>
                <th>categoria Image Path</th>
            </tr>
            <?php
            if ($count > 0){
                while($categ = mysqli_fetch_assoc($query)){
                    $sql2 = "SELECT * FROM categorias WHERE categoriaId = ". $categ['categoriaId'];
                    $query2 = mysqli_query($con,$sql2);
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo $categ['categoriaId'];?></td>
                        <td><?php echo $categ['categoriaNome'];?></td>
                        <td><?php echo $categ['categoriaImagePath'];?></td>
                    </tr>
                    <?php
                }
            }

            ?>
        </table>
    </div>
</div>


<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/custom.js"></script>

</body>
</html>
