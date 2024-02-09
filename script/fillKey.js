const data = document.getElementById("data");


jsondata = JSON.parse(atob(atob(data.value)))

for(var i=0 ; i < 61 ; i++){
    var elt = document.getElementById(i.toString());
    elt.style.backgroundColor = jsondata[i.toString()]["bg"];
    elt.style.color = jsondata[i.toString()]["fg"];
}



