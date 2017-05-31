function search(string){
    if(string){
        document.getElementById("searchBox").style.backgroundSize = "0 0";
    }else{
        document.getElementById("searchBox").style.backgroundSize = "21px 21px";
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("adminTable").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "pessoaAJAX.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(string);
}

function checkWidth(string){

    var width = document.getElementById("searchBox").offsetWidth;
    if ((width == 200) && (!(string == "" || string == null))){
        document.getElementById("searchBox").style.width = "200";
    }

}