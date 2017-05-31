<link href="../assets/css/adminStylesheet.css" rel="stylesheet" />
<?php
include_once "config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
function shortenPassword ($pw){
    return $pwReturn = substr($pw, 0, -30);
}

function validateSessions($userId){
    $state = false;
    if (!isset($userId)){
        $state = false;

    }else{
        $state = true;
    }

    return $state;
}

function pagination($dbTable){
    global $con;
    $query = $_SERVER['PHP_SELF'];
    $path = pathinfo($query);
    $url = $path['basename'];

    if(isset($_GET['p'])){
        $thisPage = $_GET['p'];
    }else{
        $thisPage = 1;
    }

    $result = mysqli_query($con,"SELECT * FROM ". $dbTable);
    $num_rows = mysqli_num_rows($result);
    $pageCnt = $num_rows / CNUMROWS;
    ?>
    <div id="pagination">
        <a href="#">&laquo;</a>
        <?php for($i = 1; $i <= ceil($pageCnt); $i++){?>
            <a href="<?php echo $url; ?>?p=<?php echo $i;?>" <?php if($i == $thisPage) {echo 'class="active"';} ?>><?php echo $i; ?></a>
        <?php }?>
        <a href="#">&raquo;</a>
    </div>
<?php
}

function search($dbTable){?>
    <div id="searchContainer">
        <a href="#" class="button search">Procura</a>
        <input type="text" onkeyup="search(this.value)" id="searchBox" onblur="checkWidth(this.value)">
        <div id="searchOptions">
            <span class="text" style="color: #a8a8a8;">Procurar por...</span>
            <span class="Chevron" ></span>
            <select name="" id="" class="select-style">
                <option value="">option 1</option>
                <option value="">option 2</option>
                <option value="">option 32</option>
            </select>
        </div>
    </div>
<?php
}



?>


