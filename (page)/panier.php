<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNOWSTORM.GG</title>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  
    <!-- Favicon -->
    <script src="https://kit.fontawesome.com/d3255ff586.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/panier.css">
    <?php 
        include '../php/database.php'; 
        require("../php/config.php");
        if(!isset($_SESSION['user']['IDUser'])){$_SESSION['user']['IDUser'] = 1;}

        $q_panier = $db->prepare('SELECT * FROM Paniers WHERE IDUser=:ID');
        $q_panier->execute([
            "ID" => $_SESSION['user']['IDUser']
        ]);
        $result = $q_panier->fetchAll(PDO::FETCH_ASSOC);
        

        $output = array();
        $IDPanier = array();
        $i = 0;
        foreach($result as $row){
            if($row["IsBought"] == 0){
                if($row["IsCustom"] == 1){
                    $q_Custom = $db->prepare("
                    SELECT Produit.ImgPath, Produit.Nom, Produit.Prix
                    FROM Customs 
                    JOIN Produit 
                    ON Produit.IDProduit = Customs.IDProduit 
                    WHERE Customs.IDCustom = :ID;
                    ");
                    $q_Custom->execute(
                        ["ID" => $row["IDCustom"]]
                    );
                    $data = $q_Custom->fetch(PDO::FETCH_ASSOC);
                    $data["Amount"] = $row["Amount"];
                    $data["IsCustom"] = $row["IsCustom"];
                    
                    // AJOUTER LE PRIX DES SWITCH, BACKPLATE etc...

                    $output[$i] = $data;
                    $i++;
                } else{
                    $q_Produit = $db->prepare("
                    SELECT ImgPath, Nom, Prix
                    FROM Produit 
                    WHERE IDProduit = :ID;
                    ");
                    $q_Produit->execute(
                        ["ID" => $row["IDProduit"]]
                    );
                    $data = $q_Produit->fetch(PDO::FETCH_ASSOC);
                    $data["Amount"] = $row["Amount"];
                    $data["IsCustom"] = $row["IsCustom"];

                    $output[$i] = $data;
                    $i++;
                }
                array_push($IDPanier, $row["IDPanier"]);
            }
        }

    ?>
</head>
<body>
    
    <header class="unselectable">
        <div class="header">
            <div class="header-grp">
                <div class="header_top">
                    <div class="logo">
                        <img src="../Assets/logo-removebg-preview.png" alt="Logo" class="logo-img">
                        <a href="../index.php"><p class="logo-name">SNOWSTORM.GG</p></a>
                    </div>
                    <div class="logo">
                        <a href="./panier.php"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                        <a href="./login.php"><i class="fa-solid fa-user fa-beat"></i></a>
                        <img src="../Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                    </div>
                </div>
                
                <div class="header_bot">
                    <div class="navbar_link">
                        <a href="./Product-1.html">NOS PRODUITS</a>
                        <a href="./personnaliser.php">PERSONNALISER</a>
                        <a href="./Search.php">GALERIE</a>
                        <a href="#">SUPPORT/SAV</a>
                        <a href="#">FAQ</a>
                        <a href="#">CONTACT</a>
                    </div>
                    <div class="navbar_search">
                        <form action="" method="GET" class="search">
                            <input type="search" placeholder="Rechercher un produit" id="search" name="research">
                            <?php if(isset($_GET['research'])){header("Location: ../Search.php?research=".$_GET['research']);}?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>

    <div class="div1" id="">
        <h1 class="text_3" id="">Étape 1 : panier</h1>
        <h1 class="étape" id="">2</h1>
        <h1 class="étape" id="">3</h1>
        <h1 class="étape" id="">4</h1>
        <h1 class="étape" id="">5</h1>
    </div>
    <div class="div2" id="">
        <h1 class="produit" id="">produit</h1>
        <h1></h1>
        <h1 class="prix" id="">prix</h1>
        <h1 class="quant" id="">Quantiter</h1>
        <h1></h1>
        
        <?php 
            $i = 0;
            foreach($output as $row){
                echo '<img class="img_pr" src="../Assets/'. $row["ImgPath"] .'" alt="image du produit"  id="i-'.$i.'">';
                echo '<h1 class="nom_pr" id="n-'.$i.'">' . $row["Nom"] . ($row["IsCustom"] == 1 ? "(Custom)" : "") . '</h1>';
                echo '<p class="prix_pr" id="p-'.$i.'">' . $row["Prix"] . '€</p>';
                echo '<input type="number" class="quant_pr" id="q-'.$i.'" value="'.$row["Amount"].'" readonly>';
                echo '  <div class="btn-div"  id="d-'.$i.'">
                            <button class="bouton_modifier" onclick="ModifyRow('.$i.')"><img class="modifier" src="https://icones.pro/wp-content/uploads/2022/07/icone-crayon-bleu.png" height="100%"></button>
                            <button class="delet" onclick="DeleteRow('.$i.')">suprimer</button>
                        </div>';
                    $i++;
                    }
        
        ?>
    </div>
    <div class="div3" id="">
        <div class="sd3-1" id="">
            <button class="bouton_coeur" id=""><img class="coeur" id="" src="data:image/png;base64,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"></button>
            <h1 class="text_1" id="">favoris</h1>
        </div>
        <div class="sd3-2" id="">
            <h1 class="text_2" id="">Sous-total :</h1>
            <h1 class="" id="Total"><?php $total = 0; foreach($output as $row){$total += floatval($row["Prix"]) * intval($row["Amount"]);} echo $total; echo '€'; ?></h1>
        </div>
    </div>
    <div class="div4" id="">
        <div class="sd4-1" id="">
            <h1 class="text_1" id="">Utiliser un code de réduction :</h1>
            <input type="text" name="" id="" placeholder="XXXX-XXXX-XXXX">
        </div>

        <form action="panier2.php" method="post" class="sd4-2" id="form-next">
            <input class="bouton_continuer" type="submit" value="Confirmer le panier et poursuivre" onclick="BeforeNextPage()">
            <input type="hidden" name="Data" value="" id="Data">
            <input type="hidden" name="ArticlesAmount" id="Panier" value="<?php echo count($output); ?>">
            <input type="hidden" name="DataPanier" id="DataPanier" value="<?php print_r($IDPanier); ?>">
            <?php 
            for($i = 0 ; $i < count($output) ; $i++){
                echo '<input type="hidden" name="article-'.$i.'" value="' . $IDPanier[$i]. '-' .$output[$i]["Amount"].'" id="'.$i.'">';
            }
            ?>
        </form>
    </div>
    
    <footer class="footer">
        <div class="footer-container unselectable">
            <img src="../Assets/logo-removebg-preview.png" alt="Logo de Snowstorm" id="footer-img">
            <p class="logo-name">Snowstorm.GG</p>
        </div>
        <div class="footer-container">
            <p class="title"> Catégories</p>
            <p class="subtitle"> Nouveautés </p>
            <p class="subtitle"> Meilleures ventes </p>
            <p class="subtitle"> Classiques </p>
            <p class="subtitle"> Préfaits </p>
            <p class="subtitle"> Personnaliser </p>
        </div>
        <div class="footer-container">
            <p class="title"> Informations </p>
            <p class="subtitle"> Nous contacter </p>
            <p class="subtitle"> Livraison </p>
            <p class="subtitle"> Mentions légales </p>
            <p class="subtitle"> Confidentialité </p>
            <p class="subtitle"> Conditions d'utilisation </p>
        </div>
        <div class="footer-container">
            <p class="title"> Mon compte </p>
            <p class="subtitle"> Mes commandes </p>
            <p class="subtitle"> Mes customs </p>
            <p class="subtitle"> Mes informations </p>
        </div>
        <div class="footer-container">
            <p class="title"> Nos réseaux </p>
            <div class="footer-img">
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-x-twitter"></i>
                <i class="fa-brands fa-square-facebook"></i>
            </div>
        </div>
    </footer>
    
    <script src="../script/panier.js"></script>
    <script src="../script/index.js"></script>
</body>
</html>