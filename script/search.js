
const InputLoadAmount = document.getElementById("loadedAmount");
const FormToSubmit = document.getElementById("form-reload");
const value = parseInt(InputLoadAmount.value);

function load_12new(){
    InputLoadAmount.value = (value + 2).toString();
    FormToSubmit.submit();
}
