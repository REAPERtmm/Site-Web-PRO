
const PannierSize = parseInt(document.getElementById("Panier").value);
const total = document.getElementById("Total");
const FORM = document.getElementById("form-next");
let prec = -1;

for(var i = 0 ; i < PannierSize ; i++){
    document.getElementById("q-"+i).addEventListener("keydown", function (e) {  
        if(["e", "+", "E", "-"].includes(e.key)){
            e.preventDefault();
        }
    })
    document.getElementById("q-"+i).addEventListener("invalid", function () {  
        this.value = 1;
    })
}

function DeleteRow(index) {  
    document.getElementById("i-"+index).remove();
    document.getElementById("n-"+index).remove();
    document.getElementById("p-"+index).remove();
    document.getElementById("q-"+index).remove();
    document.getElementById("d-"+index).remove();
    updatePrix();
}

setInterval(updatePrix, 10)

function ModifyRow(index) {  
    document.getElementById("q-"+index).readOnly = false;
    if(prec != -1 && prec != index){
        document.getElementById("q-"+prec).readOnly = true;
    }
    prec = index
}

function updatePrix(){
    console.log("update")
    var s = 0;
    for(var i = 0 ; i < PannierSize ; i++){
        var amount = document.getElementById("q-"+i);
        var prix = document.getElementById("p-"+i);
        const inp = document.getElementById(i.toString());

        inp.value = inp.value.split("-")[0] + "-" + amount.value;
        if(amount && prix){
            s += parseInt(amount.value) * parseFloat(prix.textContent);
        }
    }
    s = Math.floor(s*100)/100;

    total.innerHTML = s + "€";
}

function extractData(){

}


function BeforeNextPage(){
    // Done Before Next Page
    document.getElementById("Data").value = total.innerHTML;

    // Update the database
    FORM.action = "../php/updateAmountPanier.php";
    FORM.target = "_blank";
    FORM.submit();

    // go on next page
    FORM.action = "panier2.php";
    FORM.target = "";
    FORM.submit();
}