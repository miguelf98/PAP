<?php

?>

<script src="jquery-3.2.0.min.js"></script>
<script>
function setOrder() {
    $.ajax({url: "pushOrder.php", success: function(result){
        ;
    }});
}
function doneOrder() {
    $.ajax({url: "popPrepare.php", success: function(result){
        ;
    }});
}
function deliverOrder() {
    $.ajax({url: "popOrder.php", success: function(result){
        ;
    }});
}


</script>

<style>
    .button{
        background: red;
        width:200px;
        margin: 100px;
        height: 80px;
        font-size: 24px;
        color: wheat;
    }
    .button:hover{
        opacity: 0.3;
        border: solid yellow 3px;
    }

    .left{
        float: left;
    }



</style>
<div class=" left"></div>
<div class=" left">A07</div>
<div class=" left"></div>

<button id="order" onclick="setOrder()"  class="button">Novo Pedido</button>
<button id="done" onclick="doneOrder()" class="button">Concluir Pedido</button>
<button id="delivered" onclick="deliverOrder()"  class="button">Entregar Pedido</button>

