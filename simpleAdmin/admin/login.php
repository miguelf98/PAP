<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Administration</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <?php include_once "includes/body.inc.php"?>
</head>

<body>
    <div id="wrapper">
        <?php drawTop(1); ?>
        <div id="loginFormContainer">
            <form action="confirmLogin.php" method="post">
                <div class="loginmodal-container" style="margin-top: 20%">
                    <h1>Login to Your Account</h1><br>
                    <form>
                        <input type="text" name="user" placeholder="Username">
                        <input type="password" name="pass" placeholder="Password">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    </form>
                    <?php if($_SERVER['QUERY_STRING'] == 'err'){
                        echo '<p class="errorText">Erro de Autenicação</p>';
                    } ?>
                </div>

            </form>
        </div>
    </div>
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>
</html>
