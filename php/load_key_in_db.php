

<?php 
include 'database.php';

for ($i = 0; $i < 61; $i++) {
    $keytxt = "IDKey".$i;

    // récupère les données de la clé actuel dans la bdd
    $q_getKeyCol = $db->prepare("SELECT Keyss.IDKey, Keyss.fontColor, Keyss.bgColor FROM Customs JOIN Keyss ON Keyss.IDKey=Customs.".$keytxt." WHERE Customs.IDCustom=:ID");
    $q_getKeyCol->execute([
        "ID"=>$_GET["IDCustom"],
    ]);
    $result = $q_getKeyCol->fetch(PDO::FETCH_ASSOC);

    // si la clé dans la bdd est diférente de celle à sauvegarder
    if($_GET["bg-".$i] != $result["bgColor"] || $_GET["fg-".$i] != $result["fontColor"]){
        // récupère la clé avec le même combinaison (SI ELLE EXIST)
        $q_alreadyExist = $db->prepare('SELECT * FROM Keyss WHERE bgColor=:bg AND fontColor=:fg');
        $q_alreadyExist->execute([
            "bg" => $_GET["bg-".$i],
            "fg" => $_GET["fg-".$i]
        ]); 
        $datas = $q_alreadyExist->fetch(PDO::FETCH_ASSOC);
        

        if($q_alreadyExist->rowCount() == 0){ // Si la clé n'exist
            // Créer la key avec la combinaison de couleur
            $addKey = $db->prepare("INSERT INTO Keyss(IDKey, fontColor, bgColor) VALUES (NULL, :fg, :bg)");
            $addKey->execute([
                "bg" => $_GET["bg-".$i],
                "fg" => $_GET["fg-".$i]
            ]);
            
            // récupération de l'ID créé
            $getID = $db->prepare("SELECT IDKey FROM Keyss WHERE bgColor=:bg AND fontColor=:fg");
            $getID->execute([
                "bg" => $_GET["bg-".$i],
                "fg" => $_GET["fg-".$i]
            ]);
            $ID = $getID->fetch(PDO::FETCH_ASSOC)["IDKey"];
        } else {
            $ID = $datas["IDKey"];
        }
        
        // Mise a Jour Final (changement des IDs de la touche)
        $modifiyDB = $db->prepare("UPDATE Customs SET ".$keytxt."=:IDk WHERE IDCustom=:ID");
        $modifiyDB->execute([
            'ID'=> $_GET['IDCustom'],
            'IDk'=> $ID,
        ]);
    }   
}
echo "<script>window.close() </script>"
?>