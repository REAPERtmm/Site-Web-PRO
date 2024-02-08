
let current_on = 0;
let direction = 1;
let id_interval;
const CARROUSEL_SIZE = 4;
let ClickedCompare = [];
const CompareButtons = document.querySelectorAll(".offers-compare");
const HiddenFormValue = document.getElementById("IDClicked");
const HiddenForm = document.getElementById("form");


function forced_set(index) {  
    if(current_on > index){
        direction = -1;
    } else{
        direction = 1;
    }
    clearInterval(id_interval);
    set_Carrousel(index);
    id_interval = setInterval(next_Carrousel, 3000);
}

function set_Carrousel(index){
    for(let i = 0 ; i < CARROUSEL_SIZE ; i++){
        var id = '#Clavier' + (i + 1);
        var id_btn = '#btn-' + (i+1);
        if(index == i){
            $(id).removeClass("image-carrousel-off");
            $(id).addClass("image-carrousel-on");
            
            $(id_btn).removeClass("carrousel-btn-off");
            $(id_btn).addClass("carrousel-btn-on");

        } else {
            $(id).removeClass("image-carrousel-on");
            $(id).addClass("image-carrousel-off");

            $(id_btn).removeClass("carrousel-btn-on");
            $(id_btn).addClass("carrousel-btn-off");
        }
    }
    current_on = index;
}

function next_Carrousel(){
    if(current_on == CARROUSEL_SIZE-1){
        direction = -1;
    } else if(current_on == 0){
        direction = 1;
    }
    set_Carrousel(current_on + direction);
}

set_Carrousel(0);
id_interval = setInterval(next_Carrousel, 3000);






// loop through each button and add a click event listener
CompareButtons.forEach(function(button) {
  button.addEventListener("click", function(e) {

    if(!ClickedCompare.includes(e.target.id)) {
        document.getElementById(e.target.id).classList.add("selec");
        ClickedCompare.push(e.target.id);
        HiddenFormValue.value = ClickedCompare;
    }
    console.log(ClickedCompare);
    if(ClickedCompare.length == 3) {
        HiddenForm.submit();
    }
  });
});
