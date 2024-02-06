let anc_couleur = "C-"+0
let cible = 0
let touche_choisi = -1

let coulor_table = {"C-0":"black","C-1":"red","C-2":"brown","C-3":"green","C-4":"cyan","C-5":"cornflowerblue","C-6":"royalblue","C-7":"yellow","C-8":"burlywood","C-9":"white","C-10":"purple","C-11":"chartreuse","C-12":"coral","C-13":"crimson","C-14":"fuchia","C-15":"greenyellow","C-16":"hotpink","C-17":"orangered","C-18":"gray","C-19":"lightgray"};


let table_touche =[];
for (let n_touche=0; n_touche<=60; n_touche++){
    table_touche.push(document.getElementById(n_touche))
}

for(let i = 0 ; i < 20 ; i++){
    document.getElementById("C-"+i).addEventListener("click", function(){
        $("#"+anc_couleur).toggle("couleur2")
        anc_couleur = this.id;

        $("#"+this.id).toggle("couleur2");
        
    });
}


// function change_anc(){
//     let couleur = document.getElementById(anc_couleur)
//         console.log(couleur)
//         couleur.style.width= "20px"
//         couleur.style.height= "20px"
//         couleur.style.border= "1px solid"
//         couleur.style.borderRadius= "0"
//         couleur.style.transform= "rotateZ(0deg)"
// }
// faire paraille que couleur mais rajouter un variable de couleur avec une fonction  pareille pour le fond ou la letre 
document.getElementById("cible_1").addEventListener("click", function(){cible = 1})
document.getElementById("cible_2").addEventListener("click", function(){cible = 0})

for(let i = 0 ; i <= 60 ; i++){
    document.getElementById(i).addEventListener("click", function(){
        touche_choisi = this.id
        change_color(this.id);
        console.log("1")
    });
}

function change_color(id){
    if (cible==1){
        document.getElementById(id).style.backgroundColor = (coulor_table[anc_couleur])
        console.log(document.getElementById(id))

    } else{
        document.getElementById(id).style.color = (coulor_table[anc_couleur])
        console.log(document.getElementById(id))
    }
}