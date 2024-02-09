<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/PnlAdmin.css">
    <?php
        include '../php/database.php';

        if(isset($_POST["Update-Produit"])){
            unset($_POST["Update-Produit"]);
            $q = $db->prepare("UPDATE Produit SET Nom=:Nom, Prix=:Prix, ImgPath=:ImgPath, Path1=:Path1, Description1=:Description1, Path2=:Path2, Description2=:Description2    WHERE IDProduit=:ID");
            $q->execute([
                "ID"=>$_POST["IDProduit"],
                "Nom"=>$_POST["Nom"],
                "Prix"=>$_POST["Prix"],
                "ImgPath"=>$_POST["ImgPath"],
                "Path1"=>$_POST["path1"],
                "Description1"=>$_POST["Description1"],
                "Path2"=>$_POST["path2"],
                "Description2"=>$_POST["Description2"]
            ]);
        }else if(isset($_POST["Insert-Produit"])) {
            unset($_POST["Insert-Produit"]);
            $q = $db->prepare("INSERT INTO Produit(Nom, Prix, ImgPath, Path1, Description1, Path2, Description2) VALUES (:Nom, :Prix, :ImgPath, :Path1, :Description1, :Path2, :Description2)");
            $q->execute([
                "Nom"=>$_POST["Nom"],
                "Prix"=>$_POST["Prix"],
                "ImgPath"=>$_POST["ImgPath"],
                "Path1"=>$_POST["path1"],
                "Description1"=>$_POST["Description1"],
                "Path2"=>$_POST["path2"],
                "Description2"=>$_POST["Description2"]
            ]);
        } ;
    ?>
</head>
<body>
    <h1 class="titre">PANNEL ADMIN</h1>   
    <div>
        <?php 
        $q = $db->prepare("SELECT * FROM Produit");
        $q->execute();
        $ProduitData = $q->fetchAll();

        foreach($ProduitData as $key=>$row){
            echo '
                <form class="div-Produits" method="post">
                <fieldset class="Row">
                    <input type="hidden" name="IDProduit" value="'.$row["IDProduit"].'">
                    <div class="set">
                        <label for="Nom-'.$key.'"">Nom</label>
                        <input type="text"name="Nom" value="'.$row["Nom"].'" id="Nom-'.$key.'">
                    </div>
                    <div class="set">
                        <label for="Prix-'.$key.'">Prix(€)</label>
                        <input type="number" min="0" step=".01" name="Prix" id="Prix-'.$key.'" value="'.$row["Prix"].'">
                    </div>
                    <div class="set">
                        <label for="ImgPath-'.$key.'">Img Presentation</label>
                        <input type="text" name="ImgPath" value="'.$row["ImgPath"].'" id="ImgPath-'.$key.'">
                    </div>
                    <div class="set">
                        <label for="path1-'.$key.'">Img Presentation2</label>
                        <input type="text" name="path1" value="'.$row["Path1"].'" id="path1-'.$key.'">
                    </div>
                    <div class="set">
                        <label for="path2-'.$key.'">Img Presentation3</label>
                        <input type="text" name="path2" value="'.$row["Path2"].'" id="path2-'.$key.'">
                    </div>
                    <div class="set">
                        <label for="desc1-'.$key.'">Description1</label>
                        <textarea name="Description1" id="desc1-'.$key.'" cols="30" rows="10">'.$row["Description1"].'</textarea>
                    </div>
                    <div class="set">
                        <label for="desc2-'.$key.'">Description2</label>
                        <textarea name="Description2" id="desc2-'.$key.'" cols="30" rows="10">'.$row["Description2"].'</textarea>
                    </div>
                    <input type="submit" name="Update-Produit">
                </fieldset>
            </form>
            ';
        }
        ?>
    <form class="div-Produits" method="post">
                <fieldset class="Row">
                    <input type="hidden" name="IDProduit" value="">
                    <div class="set">
                        <label for="Nom">Nom</label>
                        <input type="text" name="Nom" value="" id="Nom">
                    </div>
                    <div class="set">
                        <label for="Prix">Prix(€)</label>
                        <input type="number" min="0" step=".01" name="Prix" id="Prix" value="">
                    </div>
                    <div class="set">
                        <label for="ImgPath">Img Presentation</label>
                        <input type="text" name="ImgPath" value="" id="ImgPath">
                    </div>
                    <div class="set">
                        <label for="path1">Img Presentation2</label>
                        <input type="text" name="path1" value="" id="path1">
                    </div>
                    <div class="set">
                        <label for="path2">Img Presentation3</label>
                        <input type="text" name="path2" value="" id="path">
                    </div>
                    <div class="set">
                        <label for="desc1">Description1</label>
                        <textarea name="Description1" id="desc1" cols="30" rows="10"></textarea>
                    </div>
                    <div class="set">
                        <label for="desc2">Description2</label>
                        <textarea name="Description2" id="desc2" cols="30" rows="10"></textarea>
                    </div>
                    <input type="submit" name="Insert-Produit">
                </fieldset>
            </form>
    </div> 
    
</body>
</html>