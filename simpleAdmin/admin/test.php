<?php
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
$sql = "SELECT * FROM users WHERE userId = ".$_SESSION['userId'];
$result = mysqli_query($con,$sql);
print_r($sql);
$adminUserName = mysqli_fetch_row($result);
?>
<span class="logout-spn" style="position: absolute; right: 0;">
                      <div id="accountInfoContainer" >
                          <img id="accountImage" src="../images/user.png">
                          <div id="accountNome"><?php echo $adminUserName['userName'];?></div>
                          <a style="float: right; position: relative; top: 50px; right: 30px;" href="logout.php">Logout</a>
                      </div>
                    </span>