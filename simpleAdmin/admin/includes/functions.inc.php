
<?php
include_once "config.inc.php";
$con = mysqli_connect(DBCON,DBUSER,DBPW,DBNAME);
function shortenPassword ($pw){
    return $pwReturn = substr($pw, 0, -30);
}

function validateSessions($userId){ //TODO: substituir esta merda por algo mais complicado
    $state = false;
    if (!isset($userId)){
        $state = true;

    }else{
        $state = true;
    }

    return $state;
}

function pagination($dbTable){ //A B S T R A C T
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

function debugToConsole($data){
    $output = $data;
    if(is_array($output) )
    $output = implode( ',',$output);
    echo "<script>console.log( '" . $output . "' );</script>";
}


?>


