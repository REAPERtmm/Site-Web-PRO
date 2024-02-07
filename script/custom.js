const choiceuser = document.getElementById("choice-keycaps-user");
const BackplateColor = document.getElementById("backplate-color");
const KeycapsColor = document.getElementById("keycaps-color");
const FormAction = document.getElementById("form-action");
const DataForm = document.getElementById("data");
let BtnList;



function Dropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}



function SetKeycaps(clicked_id, texte) {
  choiceuser.innerHTML = texte;
  choiceuser.classList.remove("choiceuser");
  KeycapsColor.value = clicked_id;
  //console.log(KeycapsColor.value);
}

function SetBackplate(clicked_id_backplate) {
  BackplateColor.value = clicked_id_backplate;
  //console.log(BackplateColor.value);

  if (BtnList && clicked_id_backplate != BtnList) {
    document.getElementById(BtnList).classList.remove("clicked-btn");
    document.getElementById(clicked_id_backplate).classList.add("clicked-btn");
  }else {
    document.getElementById(clicked_id_backplate).classList.add("clicked-btn");
  }
  BtnList = clicked_id_backplate;
}


function SaveConfig() {
  FormAction.action = "custom.php";
  FormAction.submit();
}

function NextPage() {
  var data = {
    "Backplate": BackplateColor.value,
    "Keycaps": KeycapsColor.value
  }
  DataForm.value = btoa(btoa(JSON.stringify(data)));
  FormAction.action = "builder2.php";
  FormAction.submit();
}


// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}