<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food 4 All</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>

    <?php include_once "food.svg";?>
    <?php include_once "includes/body.inc.php";?>

    <div id="wrapper">
         <?php drawTopBar(); ?>
        <!-- /. NAV TOP  -->
        <?php drawSideBar(); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="margin-top: 100px;">
            <div id="page-inner">
                <!-- TITULO DA P?GINA A SER USADA (categorias, bebidas, comida quente) -->
                <div class="row">
                    <div class="col-lg-12" style="margin-left:5px;">
                     <h2>Categorias</h2>
                    </div>
                </div>
                <hr/>
                <!-- TITULO END -->

                <!-- CATEGORIAS DE PRODUTOS -->
                <?php drawProducts(); ?>
                <!-- ICON END -->
            </div>
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                     Yeezy 4 Prez 2020 <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div>



    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
