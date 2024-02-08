const FORM = document.getElementById("form");
const ARROW = document.getElementById("arrow");
const Amount = document.getElementById("amount");
const PRIX = document.getElementById("prix");
const PRIXUNIT = parseFloat(document.getElementById("prixUnit").value);

function toggleOption(){
    var divs = document.getElementsByClassName("choice");
    for(var i=0 ; i < divs.length ; i++){
        divs[i].classList.toggle("hide");
    }
    
    if(ARROW.textContent == "_"){
        ARROW.textContent = ">";
    }else{
        ARROW.textContent = "_";
    }
}

Amount.addEventListener("click", updatePrix);
window.addEventListener("click", updatePrix);

function updatePrix(){
    if(parseInt(Amount.value) <= 0){
        Amount.value = "1";
    }
    var val = PRIXUNIT * parseInt(Amount.value);
    PRIX.value = Math.floor(100*val) / 100;
}

function SaveConfig(){
    FORM.action = "../php/SaveBuild4.php";
    FORM.target = "_blank";
    FORM.submit();

    FORM.action = "builder4.php";
    FORM.target = "";
}

function NextPage() {  
    SaveConfig();
    FORM.submit();
}