const Quantity = document.getElementById("quantity");
const HiddenQuant = document.getElementById("hidden-quant");
const FORM = document.getElementById("form-panier");


function SetForm() {
        HiddenQuant.value = Quantity.value;
}