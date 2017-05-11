

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

    #buttonContainer{
            border: 1px solid black;
            height: 250px;
            width: 100px;
            display: inline-block;
            float: right;
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

<?php $preco = 0;?>





<h2>Ticket AJAX</h2>
<div id="mainContainer">
    <div id="buttonContainer">
        <button style="width: 100%; height: 45px;" onclick="clearFatura()">clear</button>
        <button style="width: 100%; height: 45px;" id="openModal">Fechar</button>

    </div>
    <div id="faturaContainer">

    </div>

</div>

<div id="demo">
    <button type="button" onclick="loadCategs()">Passa cartao</button>
</div>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn     = document.getElementById("openModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });

/********************************************************/
/********************************************************/
/********************************************************/
    function loadFatura(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("faturaContainer").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AJAXfatura.php", true);
        xhttp.send();
    }

    function clearFatura(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("faturaContainer").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "clearFatura.php", true);
        xhttp.send();
    }

/********************************************************/
/********************************************************/
/********************************************************/
    function loadCategs() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "test1.php", true);
        xhttp.send();
    }

    function loadProdutos(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "addProd.php?id=" + id, true);
        xhttp.send();
    }

    function addProduto(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "addProd.php?pr=" + id, true);
        xhttp.send();
    }
/********************************************************/
/********************************************************/
/********************************************************/

    function reloadPage(){
        window.location.reload(false);
    }
    setInterval(loadFatura, 150);

    window.onload = loadFatura();
</script>