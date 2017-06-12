<?php include_once "includes/body.inc.php"?>
<script>
    function loadNames(string){
        console.log(string);
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("selectHolder").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "testAJAX.php?srch=" + string, true);
        xhttp.send();
    }

    function getValue(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("asd123").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "testAJAX2.php?id=" + id, true);
        xhttp.send();
    }

</script>
<style>
    #namePicker{
        width: 350px;
        height: 160px;
        border: 2px solid red;

    }

    #namePicker .inputHolder{
        display:inline-block;
    }
    #asd123{
        border: 2px solid seagreen;
        display:inline-flex;
        float: left;
        min-width: 200px;
        min-height: 100px;
    }
    #selectHolder{
        width: 170px;
        height: 156px;
        border: 2px solid deepskyblue;
        float: right;
        display: inline-block;
    }

    #selectHolder select{
        position: relative;
        width: 100%;
        height: 100%;
    }
</style>
<div id="namePicker" >

    <div class="inputHolder">search... <input type="text" onkeyup="loadNames(this.value)" style="width: 100px;"></div>

    <div id="selectHolder">

    </div>
</div>
<div id="asd123">

</div>
