<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d3255ff586.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/penguin" rel="stylesheet">
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/search.css">
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

    <?php
    include '../php/database.php';
    require("../php/config.php");
    require("../php/forceconnect.php");
    if (!isset($_GET["ASC"])) {
        $_GET["ASC"] = "off";
    }
    ;
    if (!isset($_GET["research"])) {
        $_GET["research"] = "";
    }
    ;
    if (!isset($_GET["loadedAmount"])) {
        $_GET["loadedAmount"] = "4";
    }
    ;
    ?>

    <form action="SearchCustom.php" method="get" class="form-galerie" id="form-reload">
        <div class="IsAsc">
            <input type="checkbox" name="ASC" id="Checkbox-Asc" <?php if ($_GET["ASC"] == "on") {
                echo "checked";
            } ?>>
            <div class="Title-Checkbox">Prix croissant</div>
            <input type="hidden" name="loadedAmount" value="<?php echo $_GET["loadedAmount"]; ?>" id="loadedAmount">
            <input type="submit" value="Submit">
        </div>
    </form>
    <div class="catalogue" id="catalogue">
        <?php
        $_SQL_Search = "%" . $_GET["research"] . "%";

        if ($_GET["ASC"] == "on") {
            $q = $db->prepare("SELECT Produit.ImgPath, Customs.Nom, Produit.Prix, Customs.IDCustom, Customs.BackplateColor, Customs.KeycapColor, Customs.AvisCreator FROM Customs INNER JOIN Produit ON Produit.IDProduit=Customs.IDProduit WHERE Customs.Nom like :search ORDER BY Prix ASC LIMIT " . $_GET["loadedAmount"]);
        } else {
            $q = $db->prepare("SELECT Produit.ImgPath, Customs.Nom, Produit.Prix, Customs.IDCustom, Customs.BackplateColor, Customs.KeycapColor, Customs.AvisCreator FROM Customs INNER JOIN Produit ON Produit.IDProduit=Customs.IDProduit WHERE Customs.Nom like :search ORDER BY Prix DESC LIMIT " . $_GET["loadedAmount"]);
        }
        $q->execute([
            "search" => $_SQL_Search,
        ]);
        $q = $q->fetchAll();

        foreach ($q as $key => $value) {
            $prix = floatval($value["Prix"]);
            switch ($value["BackplateColor"]) {
                case "#ffffff": {
                    $prix += 5;
                    break;
                }
                case "#cd853f": {
                    $prix += 5;
                    break;
                }
            }
            switch ($value["KeycapColor"]) {
                case "#0000ff": {
                    $prix += 91;
                    break;
                }
                case "#ff0000": {
                    $prix += 31;
                    break;
                }
                case "#582900": {
                    $prix += 122;
                    break;
                }
            }

            echo '<form action="custom.php" method="post" class="product">';
            echo '<button class="img-product">';
            echo '<img src="../Assets/' . $value["ImgPath"] . '" alt="image" width="100%" height="100%">';
            echo '</button>';

            echo '
                        <input type="hidden" name="IDCustom" value="' . $value["IDCustom"] . '">
                        <input type="hidden" name="keycaps-color" value="' . $value["KeycapColor"] . '">
                        <input type="hidden" name="backplate-color" value="' . $value["BackplateColor"] . '">
                    ';

            echo '<h1 class="title-product">' . $value["Nom"] . '</h1>';
            echo '<i class="price-product">' . $prix . '€</i>';
            echo '<p class="Avis">' . $value["AvisCreator"] . '</p>';
            echo "</form>";
        }
        ?>
    </div>

    <input type="button" value="Charger Plus ..." id="btn-load-more" onclick="load_12new()">

    <script src="../script/ScrollHereOnLoad.js"></script>

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

    <script src="../script/search.js"></script>
</body>

</html>