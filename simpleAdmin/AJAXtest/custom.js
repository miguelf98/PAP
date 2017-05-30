

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

function generateOrder() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "generateOrder.php", true);
    xhttp.send();
}


function setOrder() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "pushOrder.php", true);
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
/**
 * Created by FOX2 on 12/05/2017.
 */
