<?php include_once "includes/body.inc.php"?>

<body>
    <div id="wrapper">
        <?php drawTop(1); ?>
        <div id="loginFormContainer">
            <form action="confirmLogin.php" method="post">
                <div class="loginmodal-container" style="margin-top: 10%">
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

