<?php
function drawTop($pageId){
    session_start();

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
                <?php if (isset($_SESSION['userId'])){ ?>
                    <span class="logout-spn" style="position: absolute; right: 0;">
                      <div id="accountInfoContainer" >
                          <img id="accountImage" src="../images/user.png">
                          <div id="accountNome">João Sousa</div>
                          <a href="logout.php">Logout</a>
                      </div>
                    </span>
                <?php }?>
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
    <nav class="navbar-default navbar-side" role="navigation" >
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <!-- SIDEBAR LINK 1 -->
                    <li class="active-link">
                        <a href="index.html" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>

                    <!-- SIDEBAR LINK 2 -->
                    <li>
                        <a href="ui.html"><i class="fa fa-table "></i>Produtos</a>
                    </li>

                    <!-- SIDEBAR LINK 3 -->
                    <li>
                        <a href="blank.html"><i class="fa fa-edit "></i>Blank Page</a>
                    </li>

                    <!-- SIDEBAR LINK 4 -->
                    <li>
                        <a href="#"><i class="fa fa-qrcode "></i>My Link One</a>
                    </li>

                    <!-- SIDEBAR LINK 5 -->
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i>My Link Two</a>
                    </li>

                    <!-- SIDEBAR LINK 6 -->
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Three </a>
                    </li>

                    <!-- SIDEBAR LINK 7 -->
                    <li>
                        <a href="#"><i class="fa fa-table "></i>My Link Four</a>
                    </li>

                    <!-- SIDEBAR LINK 8 -->
                     <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Five </a>
                    </li>
                </ul>
            </div>
        </nav>
<?php
}
