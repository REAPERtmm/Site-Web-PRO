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
    require("../php/forceconnect.php");


    $q_panier = $db->prepare('SELECT * FROM Paniers WHERE IDUser=:ID');
    $q_panier->execute([
        "ID" => $_SESSION['user']['IDUser']
    ]);
    $result = $q_panier->fetchAll(PDO::FETCH_ASSOC);


    $output = array();
    $IDPanier = array();
    $i = 0;
    foreach ($result as $row) {
        if ($row["IsBought"] == 0) {
            if ($row["IsCustom"] == 1) {
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
            } else {
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
            <div class="header_top">
                <div class="logo">
                    <img src="../Assets/logo-removebg-preview.png" alt="Logo" class="logo-img">
                    <p class="logo-name">SNOWSTORM.GG</p>
                </div>
                <div class="logo">
                    <a href="./panier.php"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                    <a href="./login.php"><i class="fa-solid fa-user fa-beat"></i></a>
                    <img src="../Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                </div>
            </div>

            <div class="header_bot">
                <div class="navbar_link">
                    <a href="./Search.php">NOS PRODUITS</a>
                    <a href="./personnaliser.php">PERSONNALISER</a>
                    <a href="./SearchCustom.php">GALERIE</a>
                    <a href="./support.php">SUPPORT/SAV</a>
                    <a href="#">FAQ</a>
                    <a href="./page-contact.html">CONTACT</a>
                </div>
                <div class="navbar_search">
                    <form action="" class="search">
                        <input type="text" placeholder="Rechercher un produit">
                        <?php if (isset($_GET['research'])) {
                            header("Location: ./Search.php?research=" . $_GET['research']);
                        } ?>
                    </form>
                </div>
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
        <h1 class="prix" id="">Prix</h1>
        <h1 class="quant" id="">Quantité</h1>
        <h1></h1>

        <?php
        $i = 0;
        foreach ($output as $row) {
            echo '<img class="img_pr" src="../Assets/' . $row["ImgPath"] . '" alt="image du produit"  id="i-' . $i . '">';
            echo '<h1 class="nom_pr" id="n-' . $i . '">' . $row["Nom"] . ($row["IsCustom"] == 1 ? "(Custom)" : "") . '</h1>';
            echo '<p class="prix_pr" id="p-' . $i . '">' . $row["Prix"] . '€</p>';
            echo '<input type="number" class="quant_pr" id="q-' . $i . '" value="' . $row["Amount"] . '" readonly>';
            echo '  <div class="btn-div"  id="d-' . $i . '">
                            <button class="bouton_modifier" onclick="ModifyRow(' . $i . ')"><img class="modifier" src="https://icones.pro/wp-content/uploads/2022/07/icone-crayon-bleu.png" height="100%"></button>
                            <button class="delet" onclick="DeleteRow(' . $i . ')">suprimer</button>
                        </div>';
            $i++;
        }

        ?>
    </div>
    <div class="div3" id="">
        <div class="sd3-1" id="">

        </div>
        <div class="sd3-2" id="">
            <h1 class="text_2" id="">Sous-total :</h1>
            <h1 class="" id="Total">
                <?php $total = 0;
                foreach ($output as $row) {
                    $total += floatval($row["Prix"]) * intval($row["Amount"]);
                }
                echo $total;
                echo '€'; ?>
            </h1>
        </div>
    </div>
    <div class="div4" id="">
        <div class="sd4-1" id="">
            <h1 class="text_1" id="">Utiliser un code de réduction :</h1>
            <input type="text" name="" id="" placeholder="XXXX-XXXX-XXXX">
        </div>

        <form action="panier2.php" method="post" class="sd4-2" id="form-next">
            <input class="bouton_continuer" type="submit" value="Confirmer le panier et poursuivre"
                onclick="BeforeNextPage()">
            <input type="hidden" name="Data" value="" id="Data">
            <input type="hidden" name="ArticlesAmount" id="Panier" value="<?php echo count($output); ?>">
            <input type="hidden" name="DataPanier" id="DataPanier" value="<?php print_r($IDPanier); ?>">
            <?php
            for ($i = 0; $i < count($output); $i++) {
                echo '<input type="hidden" name="article-' . $i . '" value="' . $IDPanier[$i] . '-' . $output[$i]["Amount"] . '" id="' . $i . '">';
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