const CurrentColor = document.getElementById("gab");
const DataInput = document.getElementById("data");
const FORM = document.getElementById("form");
let anc_couleur = "C-"+-1
let cible = 1
let touche_choisi = -1

let coulor_table = {
    "C-0":"#000000",
    "C-1":"#ff0000",
    "C-2":"#a52a2a",
    "C-3":"#008000",
    "C-4":"#00ffff",
    "C-5":"#6495ed",
    "C-6":"#4169e1",
    "C-7":"#ffff00",
    "C-8":"#deb887",
    "C-9":"#ffffff",
    "C-10":"#800080",
    "C-11":"#7fff00",
    "C-12":"#ff7f50",
    "C-13":"#dc143c",
    "C-14":"#ff00ff",
    "C-15":"#adff2f",
    "C-16":"#ff69b4",
    "C-17":"#ff4500",
    "C-18":"#808080",
    "C-19":"#d3d3d3"
};


let groups = {
    "Keys": [ 
        "1", "2", "3", "4", "5", "6", "7", "8", "9", 
        "10", "11", "12", "15", "16", "17", "18", 
        "19", "20", "21", "22", "23", "24", "25",
        "26", "29", "30", "31", "32", "33", "34",
        "35", "36", "37", "38", "39", "42", "43",
        "44", "45", "46", "47", "48", "49", "50", 
        "51", "56"
    ],
    "Modifier": [
        "0", "55", "59", "60", "13", "57", "14",
         "27", "28", "40", "41", "52", "53"
    ],
    "OS": ["54", "58"]
};


keys = {}
for(var i = 0 ; i < 61 ; i++){
    keys[i.toString()] = {
        bg:"#000000",
        fg:"#ffffff"
    }
}


let table_touche =[];
for (let n_touche=0; n_touche<=60; n_touche++){
    table_touche.push(document.getElementById(n_touche))
}

for(let i = 0 ; i < 20 ; i++){
    document.getElementById("C-"+i).addEventListener("click", function(){
        $("#"+anc_couleur).toggle("couleur2")
        anc_couleur = this.id;
        $("#"+this.id).toggle("couleur2");
        CurrentColor.style.backgroundColor = coulor_table[anc_couleur];
    });
}

document.getElementById("cible_1").addEventListener("click", function(){cible = 1})
document.getElementById("cible_2").addEventListener("click", function(){cible = 0})

for(let i = 0 ; i <= 60 ; i++){
    document.getElementById(i).addEventListener("click", function(){
        touche_choisi = this.id
        change_color(this.id);
        console.log("1")
    });
}

function repaint(area){
    groups[area].forEach(element => {
        change_color(element);
    });
}

function change_color(id){
    if (cible==1){
        document.getElementById(id).style.backgroundColor = (coulor_table[anc_couleur])
        keys[id].bg = coulor_table[anc_couleur];

    } else{
        document.getElementById(id).style.color = (coulor_table[anc_couleur])
        keys[id].fg = coulor_table[anc_couleur];
    }
}

function extract(){
    datas = {...JSON.parse(atob(atob(document.getElementById("data").value))), ...keys};
    DataInput.value = btoa(btoa(JSON.stringify(datas)));
}

function BeforeNextPage(){
    extract();
    FORM.action = "builder3.php";
    FORM.target = "";
    FORM.method = "post";
    FORM.submit();
}