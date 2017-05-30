<?php
include_once "functions.php";
$lines = file("produtos.txt", FILE_IGNORE_NEW_LINES);
session_start();

/*************************/
/*************************/
/*************************/
if(isset($_SESSION['ticketNumber']))
    $_SESSION['ticketNumber']++;
else
    $_SESSION['ticketNumber']=1;

echo $num = getTicketNo($_SESSION['ticketNumber']);
?>
<script type="text/javascript" src="../assets/js/jquery-1.10.2.js" >
    function setOrder() {
        $.ajax({url: "pushOrder.php", success: function(result){
            ;
        }});
    }
</script>
<script type="text/javascript" src="custom.js" ></script>

<style>
    a:hover{
        background-color: #BFBFBF;
        cursor: pointer;
    }

    #faturaContainer{
        width: 350px;
        height:350px;
    }

    #mainContainer{
        display: inline-block;
        float: right;
        margin-right: 50%;
    }



    .modal{
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }


    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #demo{
        display: inline-block;
    }
</style>
<h2>Ticket</h2>
<div id="mainContainer">

    <div id="faturaContainer">

    </div>

</div>

<div id="demo">
    <button type="button" onclick="loadCategs()">Passa cartao</button>
</div>

<script src="jquery-3.2.0.min.js"></script>
<script>
    function setOrder() {
        $.ajax({url: "pushOrder.php", success: function(result){
            ;
        }});
    }

    if (performance.navigation.type == 1) { //* SE HOUVER REFRESH NA PAGINA DE QUALQUER MANEIRA LIMPA FATURA
        clearFatura();
    }

    function reloadPage(){
        window.location.reload(false);
    }
    setInterval(loadFatura, 500);

    window.onload = loadFatura();
</script>