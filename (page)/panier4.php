<?php
require("../php/database.php");
require("../php/config.php");
require("../php/forceconnect.php");
$prix = $_POST['Data'];
$IDPanier = $_POST["DataPanier"];

$IDLivraison = $_POST["DataLivraison"];
$PointRelais = $_POST["data2"]; //soit 0 soit 1
echo $PointRelais;


//ALTER TABLE LIVRAISON SET POINRELAIS
if ($PointRelais == 'SWpFaQ==') {
    $q = $db->prepare("UPDATE Livraison SET PointRelais = 1 WHERE IDLivraison = :IDLivraison");
    $q->execute([
        "IDLivraison" => $IDLivraison,
    ]);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNOWSTORM.GG</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Favicon -->
    <script src="https://kit.fontawesome.com/d3255ff586.js" crossorigin="anonymous"></script>
    <!-- Fonts API -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/penguin" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/panier4.css">
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

    <!-- _____________________________________________________________________________________________ -->

    <div class="div1" id="">
        <h1 class="étape" id="">1</h1>
        <h1 class="étape" id="">2</h1>
        <h1 class="étape" id="">3</h1>
        <h1 class="text_3" id="">Étape 4 : panier</h1>
        <h1 class="étape" id="">5</h1>
    </div>
    <div class="div2">
        <div class="sd2-3">
            <form action="../php/checkout.php" method="post">
                <p>Produits</p>
                <h1 class="text_3" id="">total :
                    <?php print_r($prix) ?> €
                </h1>
                <input type="hidden" name="DataPanier" id="DataPanier" value="<?php print_r($IDPanier); ?>">
                <input class="bouton_continuer" type="submit" value="Payer" onclick="BeforeNextPage()">
                <input type="hidden" name="Data" value="<?php print_r($_POST["Data"]); ?>" id="Data">
            </form>
        </div>
        <div class="sd2-3">
            <img src="../Assets/information_livraison.png" class="information" id="" title="image informative">
            <img src="../Assets/logo-bancaire.jpg" class="logo-panier" id="" title="logo bancaire">
        </div>
    </div>

    <!-- _____________________________________________________________________________________________ -->
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
    <script src="../script/app.js"></script>

</body>

</html>