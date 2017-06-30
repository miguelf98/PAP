<?php
include_once "config.inc.php";
include_once "functions.inc.php";
/****PAGINATION OFFSET****/
if(!(isset($_GET['p']))){
    $currPage = 1;
}else{
    $currPage = $_GET['p'];
}
$offset = $currPage * CNUMROWS;
$offset -= CNUMROWS;
$searchQuery = "";
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Administration</title>
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/custom.css" rel="stylesheet" />
        <link href="assets/css/adminStylesheet.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>

    </head>
<?php


function drawUserDiv(){
    if(isset($_SESSION['userId'])){

        $con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
        $sql = "SELECT * FROM users WHERE userId = ". $_SESSION['userId'];
        $query = mysqli_query($con,$sql);
        $result = mysqli_fetch_array ($query);
        ?>
        <span class="logout-spn" style="position: absolute; right: 0;">
            <div id="accountInfoContainer">
                 <img id="accountImage" src="../assets/img/user.png">
                <span id="accountNome"><?php echo $result['userName'];?></span>
                <a style="float: right; position: relative; top: 50px; right: 30px;" href="logout.php">Logout</a>
            </div>
        </span>
    <?php
    }
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
                        <img src="../assets/img/store.png" />
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
}

function validatePermission($permission){
    if ($permission > CMODERATOR){
        header('location: login.php?err');
    }
    elseif ($permission == CMODERATOR) {
        header('location: ticketManager.php');
    }
}




function drawSideBar($pageId){?>
    <nav class="navbar-default navbar-side" role="navigation" style="width: 200px; height: 88.5%;">
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
                    <!-- SIDEBAR LINK 4 -->
                    <li <?php if($pageId == CMENUPRODUTOS){echo 'class="active-link"';}?>>
                        <a href="produtos.php"><i class="fa fa-edit "></i>Produtos</a>
                    </li>

                    <!-- SIDEBAR LINK 5 -->
                    <li <?php if($pageId == CMENUTICKETMANAGER){echo 'class="active-link"';}?>>
                        <a href="ticketManager.php"><i class="fa fa-money "></i>Ticket Manager</a>
                    </li>

                    <!-- SIDEBAR LINK 6 -->
                    <li <?php if($pageId == CMENUPESSOAS){echo 'class="active-link"';}?>>
                        <a href="pessoas.php"><i class="fa fa-money "></i>Pessoas</a>
                    </li>

                    <!-- SIDEBAR LINK 7 -->
                    <li <?php if($pageId == CMENUCARTOES){echo 'class="active-link"';}?>>
                        <a href="cartoes.php"><i class="fa fa-money "></i>Cartoes</a>
                    </li>


                </ul>
            </div>
        </nav>
<?php
}

function getTicketNo(){
    $textFile = fopen("ticket.txt", "r");
    $ticketNo = fread($textFile,filesize("ticket.txt"));
    fclose($textFile);
    return $ticketNo;
}

function updateTicketNo(){
    $textFile = fopen("ticket.txt", "w");

}

function generateTicketNumber()
{
    session_start();
    if (isset($_SESSION['ticketNumber'])) {
        $_SESSION['ticketNumber']++;

    }
    else
        $_SESSION['ticketNumber'] = 1;

    return $ticket=chr(65+($_SESSION['ticketNumber']/100)).($_SESSION['ticketNumber']%100<10?'0':'').($_SESSION['ticketNumber']%100);
}