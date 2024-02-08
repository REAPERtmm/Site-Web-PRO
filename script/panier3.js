const CheckBox1 = document.getElementById("check-box1");
const CheckBox2 = document.getElementById("check-box2");
const FormData2 = document.getElementById("data2");


function SetClickedBox(IDClicked, PointRelais) {
    var data2 = [];
    if (IDClicked != data2[0]) {
        data2[0] = IDClicked;
        CheckBox1.classList.remove("clicked");
        CheckBox2.classList.remove("clicked");
        document.getElementById(IDClicked).classList.add("clicked");


        FormData2.value = PointRelais;
        FormData2.value = btoa(btoa(JSON.stringify(FormData2.value)));
        console.log(FormData2.value);
    }
}

function BeforeNextPage(){
    // Done Before Next Page
    document.getElementById("Data").value = total.innerHTML;

}