
const FORM = document.getElementById("form");
data = JSON.parse(atob(atob(document.getElementById("data").value)));
console.log(data);  


for(var i = 0 ; i < 61 ; i++){
    FORM.innerHTML = FORM.innerHTML + 
    '<input type="hidden" name="fg-'+i+'" value="'+data[i.toString()]['fg']+'">' +
    '<input type="hidden" name="bg-'+i+'" value="'+data[i.toString()]['bg']+'">'
}


FORM.submit();
