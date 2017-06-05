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

    var e = document.getElementById("searchBy");
    var strUser = e.options[e.selectedIndex].value;

    if(strUser === null){
        alert("empty");
    }

    xhttp.open("GET", "pessoaAJAX.php?srch=" + string + "&sb=" + strUser , true);
    xhttp.send();
}

function checkWidth(string){

    var width = document.getElementById("searchBox").offsetWidth;
    if ((width == 200) && (!(string == "" || string == null))){
        document.getElementById("searchBox").style.width = "200";
    }

}
function test(){
    var e = document.getElementById("searchBy");
    console.log(e);
}
function selectSearch(){

}