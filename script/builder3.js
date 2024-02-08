const FORM = document.getElementById("form");

function SaveConfig(){
    FORM.action = "../php/SaveBuild3.php";
    FORM.target = "_blank";
    FORM.submit();

    FORM.action = "builder4.php";
    FORM.target = "";
}

function NextPage() {  
    SaveConfig();
    FORM.submit();
}