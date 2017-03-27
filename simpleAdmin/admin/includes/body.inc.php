<?php
include_once "config.inc.php";
include_once "functions.inc.php";



function drawUserDiv(){
    $con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
    $sql = "SELECT * FROM users WHERE userId = ". $_SESSION['userId'];
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_array ($query);
    ?>
    <span class="logout-spn" style="position: absolute; right: 0;">
        <div id="accountInfoContainer">
             <img id="accountImage" src="../images/user.png">
            <span id="accountNome"><?php echo $result['userName'];?></span>
            <a style="float: right; position: relative; top: 50px; right: 30px;" href="logout.php">Logout</a>
        </div>
    </span>
    <?php
}


function drawTop($pageId){
    ?>
    <div class="navbar navbar-inverse navbar-fixed-top" style="<?php if($pageId == 1){echo "background-color:  #4caf50;";}?>">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="../images/store.png" />
                    </a>
                </div>
                 <span class="logout-spn" >
                </span>
                <?php drawUserDiv(); ?>
            </div>
        </div>
<?php
}


function validateSession($userId){
    if (!isset($userId)){
        header('location: login.php');
    }
    else{

    }
}


function drawSideBar($pageId){?>
    <nav class="navbar-default navbar-side" role="navigation" style="width: 200px;">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <!-- SIDEBAR LINK 1 -->
                    <li <?php if($pageId == CMENUDASHBOARD){echo 'class="active-link"';}?> >
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>

                    <!-- SIDEBAR LINK 2 -->
                    <li <?php if($pageId == CMENUUSERS){echo 'class="active-link"';}?>>
                        <a href="users.php"><i class="fa fa-table "></i>Users</a>
                    </li>

                    <!-- SIDEBAR LINK 3 -->
                    <li <?php if($pageId == CMENUCATEGORIAS){echo 'class="active-link"';}?>>
                        <a href="categorias.php"><i class="fa fa-table "></i>Categorias</a>
                    </li>
                    <li class="active-link"></li>
                </ul>
            </div>
        </nav>
<?php
}
