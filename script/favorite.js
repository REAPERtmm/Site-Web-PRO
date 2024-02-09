
const PannierSize = parseInt(document.getElementById("Panier").value);
const total = document.getElementById("Total");
const FORM = document.getElementById("form-next");
let prec = -1;
let LastClicked = document.getElementById("Data-0");
const Amount = document.getElementById("Amount");
const IDProduit = document.getElementById("IDProduit");

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
    FORM.action = "../php/remove_fav.php";
    FORM.submit();
    document.getElementById("i-"+index).remove();
    document.getElementById("n-"+index).remove();
    document.getElementById("p-"+index).remove();
    document.getElementById("q-"+index).remove();
    document.getElementById("d-"+index).remove();
    document.getElementById("b-"+index).remove();
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
    var s = 0;
    for(var i = 0 ; i < PannierSize ; i++){
        var amount = parseInt(document.getElementById("q-"+i).value);
        var prix = document.getElementById("p-"+i);
        const inp = document.getElementById(i.toString());

        if (amount <= 0) {
            amount = 1;
            document.getElementById("q-"+i).value = amount;
        }

        if(amount && prix){
            s += amount * parseFloat(prix.textContent);
        }
    }
    var dataa = LastClicked.id.split('-')[1];
    Amount.value = document.getElementById("q-"+dataa).value;
    s = Math.floor(s*100)/100;

    total.innerHTML = s + "€";
}

function SelecFav(index) {
    LastClicked.classList.toggle("clicked");
    LastClicked = document.getElementById("b-"+index);
    document.getElementById("b-"+index).classList.toggle("clicked");
    
    Amount.value = document.getElementById("q-"+index).value;
    IDProduit.value = document.getElementById("id-"+index).value;
}