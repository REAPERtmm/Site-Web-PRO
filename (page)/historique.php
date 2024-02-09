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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/penguin" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/historique.css">
</head>
<body>

<header class="unselectable">
        <div class="header">
            <div class="header-grp">
                <div class="header_top">
                    <div class="logo">
                        <img src="../Assets/logo-removebg-preview.png" alt="Logo" class="logo-img">
                        <p class="logo-name">SNOWSTORM.GG</p>
                    </div>
                    <div class="logo">
                        <a href="../(page)/Search.html"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                        <a href="../(page)/login.php"><i class="fa-solid fa-user fa-beat"></i></a>
                        <img src="../Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                    </div>
                </div>

                <div class="header_bot">
                    <div class="navbar_link">
                        <a href="../index.html">ACCUEIL </a>
                        <a href="./(page)/historique.php">HISTORIQUE</a>
                        <a href="./(page)/Search.php">FAVORIS</a>
                        <a href="index.html">SAUVEGARDES</a>
                        <a href="./account.html">COMPTE</a>
                    </div>
                    <div class="navbar_search">
                        <form action="" class="search">
                            <input type="search" placeholder="Rechercher un produit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>


    <?php 
    require("../php/database.php");
    require("../php/config.php");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    $IDUser = $_SESSION["user"]["IDUser"];

    $q = $db->prepare("SELECT * FROM Paniers WHERE IDUser =:IDUser AND IsBought=:IsBought");
    $q->execute([
        "IDUser"=> $IDUser,
        "IsBought"=> 1,
    ]);

    $qf = $q->fetchAll();

    $equivalent = array(
        "#bbbbbb" => 0,
        "#ffffff" => 5,
        "#000000" => 0,
        "#cd856f" => 5,
        "#0000ff" => 91,
        "#ff0000" => 31,
        "#582900" => 122,
    );







    echo ' <div class="titre"> Historique des achats </div>
    <div class="grid-his">
            <p class="subtitlehis">Nom du produit</p>       
            <p class="subtitlehis">Prix Unitaire</p>
            <p class="subtitlehis"> Quantité</p>
            <p class="subtitlehis"> Prix totale</p>';
            foreach ($qf as $row) {
                $price = 0;
                if ($row["IsCustom"] == 1) {
                    $qcustom = $db->prepare("SELECT * FROM Customs WHERE IDCustom =:IDCustom");
                    $qcustom->execute([
                        "IDCustom" => $row["IDCustom"],
                    ]);
                    $qcustomf = $qcustom->fetch();


                    if($qcustomf["KeycapColor"] == "#0000ff") {
                        $price += 91;
                    } elseif($qcustomf["KeycapColor"] == "#ff0000") {
                        $price += 31;
                    } elseif ($qcustomf["KeycapColor"] == "#582900") {
                        $price += 122;
                    }


                    if($qcustomf["BackplateColor"] == "#ffffff") {
                        $price += 5;
                    } elseif ($qcustomf["BackplateColor"] == "#cd853f") {
                        $price += 5;
                    }


                    $IDProduit = $qcustomf["IDProduit"];
                } else {
                    $IDProduit = $row["IDProduit"];
                }
                $qprice = $db->prepare("SELECT Prix, Nom FROM Produit WHERE IDProduit =:IDProduit");
                $qprice->execute([
                    "IDProduit" => $IDProduit,
                ]);
                $qpricef = $qprice->fetch();
                $price += $qpricef["Prix"];
                $Nom = $qpricef["Nom"];

                $Quantity = $row["Amount"];

                $PrixTotale = $Quantity * $price;

                echo '<p> '.$Nom.' </p>';
                echo '<p> '.$price.' </p>';
                echo '<p> '.$Quantity.' </p>';
                echo '<p> '.$PrixTotale.' </p>';
            }


        echo '</div>';


?> 





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
    <script src="../script/index.js"></script>
</body>
</html>
