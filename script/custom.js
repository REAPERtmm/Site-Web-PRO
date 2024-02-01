const choiceuser = document.getElementById("choice-keycaps-user");


function Dropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}


function SetKeycaps(clicked_id) {
    choiceuser.innerHTML = clicked_id;
    choiceuser.classList.remove("choiceuser");
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