<?php include_once "includes/body.inc.php"?>
<?php session_start(); ?>
<?php validateSession($_SESSION['userId']) ?>
<?php validatePermission($_SESSION['permission']) ?>

<style>
    #ticketViewer{
        border: 1px solid maroon;
        height: 200px;
        width: 100%;
    }
</style>
<body>
    <?php drawSideBar(CMENUDASHBOARD); ?>

    <div id="wrapper">
        <?php drawTop(1);?>
    </div>


    <div id="adminContainer">
        <div class="chartContainer">
            <?php print_r($_SESSION);?>
            <div id="ticketViewer">


            </div>
        </div>
    <div>


    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>

