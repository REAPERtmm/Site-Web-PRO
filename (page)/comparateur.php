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
    <link rel="stylesheet" href="../styles/comparateur.css">
</head>
<?php
include '../php/database.php';
require("../php/config.php");
require("../php/forceconnect.php");
$ListCompare = $_POST["IDClicked"];

$Compare1 = explode(",", $ListCompare)[0];
$IDProduit1 = (explode("-", $Compare1)[1]);

$Compare2 = explode(",", $ListCompare)[1];
$IDProduit2 = (explode("-", $Compare2)[1]);

$Compare3 = explode(",", $ListCompare)[2];
$IDProduit3 = (explode("-", $Compare3)[1]);



$qp1 = $db->prepare("SELECT * FROM Produit WHERE IDProduit = :IDProduit");
$qp1->execute(
    [
        'IDProduit' => $IDProduit1,
    ]
);

$qp1 = $qp1->fetch();

$qp2 = $db->prepare("SELECT * FROM Produit WHERE IDProduit = :IDProduit");
$qp2->execute(
    [
        'IDProduit' => $IDProduit2,
    ]
);

$qp2 = $qp2->fetch();

$qp3 = $db->prepare("SELECT * FROM Produit WHERE IDProduit = :IDProduit");
$qp3->execute(
    [
        'IDProduit' => $IDProduit3,
    ]
);

$qp3 = $qp3->fetch();

$ImgPath1 = $qp1["ImgPath"];
$Nom1 = $qp1["Nom"];
$Prix1 = $qp1["Prix"];

$ImgPath2 = $qp2["ImgPath"];
$Nom2 = $qp2["Nom"];
$Prix2 = $qp2["Prix"];

$ImgPath3 = $qp3["ImgPath"];
$Nom3 = $qp3["Nom"];
$Prix3 = $qp3["Prix"];


?>

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
    <div class="top-line">
        <p class="big-title"> COMPARATEUR </p>
    </div>

    <div class="grid-compa">
        <img class="imga" src="../Assets/<?php echo $ImgPath1 ?>" alt="Image du clavier best seller">
        <img class="imga" src="../Assets/<?php echo $ImgPath2 ?>" alt="Image du clavier best seller">
        <img class="imga" src="../Assets/<?php echo $ImgPath3 ?>" alt="Image du clavier best seller">

        <div class="ref">
            <?php echo $Nom1 ?>
        </div>
        <div class="ref">
            <?php echo $Nom2 ?>
        </div>
        <div class="ref">
            <?php echo $Nom3 ?>
        </div>

        <div class="price">
            <?php echo $Prix1 . "€" ?>
        </div>
        <div class="price">
            <?php echo $Prix2 . "€" ?>
        </div>
        <div class="price">
            <?php echo $Prix3 . "€" ?>
        </div>

        <div>
            <div class="product-info">


                <?php
                $q = $db->prepare("SELECT * FROM Attribut WHERE IDProduit = :IDProduit");
                $q->execute(
                    [
                        'IDProduit' => $IDProduit1,
                    ]
                );
                $q = $q->fetch();

                $Reference = $q["Modele"];

                $dic = [
                    "Informations générales" => [
                        "Désignation" => $q["Designation"],
                        "Marque" => $q["Marque"],
                        "Modèle" => $q["Modele"],
                    ],
                    "Format du clavier" => [
                        "Format" => $q["Format"],
                        "Compact" => $q["Compact"],
                        "TKL" => $q["TKL"],
                        "Norme du clavier" => $q["Norme"],
                        "Localisation" => $q["Localisation"],
                    ],
                    "Interface" => [
                        "Sans-fil" => $q["SansFil"],
                        "Interface avec l'ordinateur" => $q["InterfaceAvecOrdinateur"],
                        "Technologie de connexion du clavier" => $q["TechnologieDeConnexionDuClavier"],
                    ],
                    "Ergonomie" => [
                        "Type de touches" => $q["TypeDeTouches"],
                        "Type de switch" => $q["TypeDeSwitch"],
                        "Clavier Rétroéclairé" => $q["ClavierRetroeclaire"],
                        "Rétroéclairage RGB" => $q["RetroeclairageRGB"],
                        "Touches macro" => $q["TouchesMacro"],
                        "Touches Multimédia" => $q["TouchesMultimedia"],
                        "Pavé numérique" => $q["PaveNumerique"],
                    ],
                    "Caractéristiques Physiques" => [
                        "Couleur" => $q["Couleur"],
                        "Largeur" => $q["Largeur"],
                        "Hauteur" => $q["Hauteur"],
                        "Profondeur" => $q["Profondeur"],
                        "Poids" => $q["Poids"],
                    ],
                    "Alimentation" => [
                        "Type d'alimentation" => $q["TypeAlimentation"],
                    ],
                    "Compatibilité" => [
                        "OS supportés" => $q["OSSupportes"],
                        "Utilisation" => $q["Utilisation"],
                    ],
                    "Garanties" => [
                        "Garantie commerciale" => $q["GarantieCommerciale"],
                        "Garantie légale" => $q["GarantieLegale"],
                    ],

                ];


                echo '<div class="product-sheet">';
                foreach ($dic as $title => $v) {
                    echo
                        '<div class="row"> 
                    <div class="blue-tilte"> 
                        ' . $title . '
                    </div>
                    <div class="info">';
                    foreach ($v as $smalltitle => $content) {
                        echo '<p class="left-info">' . $smalltitle . '</p>';
                        if ($smalltitle == "OS supportés" || $smalltitle == "Utilisation") {
                            $contentspecial = explode(";", $content);
                            echo '<div class="right-info">';

                            foreach ($contentspecial as $k3 => $v3) {
                                echo '<p class="right-info">' . $v3 . '</p>';
                            }
                            echo '</div>';

                        } else {
                            echo
                                '<p class="right-info">' . $content . '</p>';
                        }
                    }
                    ;
                    echo
                        '</div>
                    </div>';
                }
                ;

                echo '</div>';

                ?>
            </div>

        </div>
        <div>
            <div class="product-info">


                <?php
                $q = $db->prepare("SELECT * FROM Attribut WHERE IDProduit = :IDProduit");
                $q->execute(
                    [
                        'IDProduit' => $IDProduit2,
                    ]
                );
                $q = $q->fetch();

                $Reference = $q["Modele"];

                $dic = [
                    "Informations générales" => [
                        "Désignation" => $q["Designation"],
                        "Marque" => $q["Marque"],
                        "Modèle" => $q["Modele"],
                    ],
                    "Format du clavier" => [
                        "Format" => $q["Format"],
                        "Compact" => $q["Compact"],
                        "TKL" => $q["TKL"],
                        "Norme du clavier" => $q["Norme"],
                        "Localisation" => $q["Localisation"],
                    ],
                    "Interface" => [
                        "Sans-fil" => $q["SansFil"],
                        "Interface avec l'ordinateur" => $q["InterfaceAvecOrdinateur"],
                        "Technologie de connexion du clavier" => $q["TechnologieDeConnexionDuClavier"],
                    ],
                    "Ergonomie" => [
                        "Type de touches" => $q["TypeDeTouches"],
                        "Type de switch" => $q["TypeDeSwitch"],
                        "Clavier Rétroéclairé" => $q["ClavierRetroeclaire"],
                        "Rétroéclairage RGB" => $q["RetroeclairageRGB"],
                        "Touches macro" => $q["TouchesMacro"],
                        "Touches Multimédia" => $q["TouchesMultimedia"],
                        "Pavé numérique" => $q["PaveNumerique"],
                    ],
                    "Caractéristiques Physiques" => [
                        "Couleur" => $q["Couleur"],
                        "Largeur" => $q["Largeur"],
                        "Hauteur" => $q["Hauteur"],
                        "Profondeur" => $q["Profondeur"],
                        "Poids" => $q["Poids"],
                    ],
                    "Alimentation" => [
                        "Type d'alimentation" => $q["TypeAlimentation"],
                    ],
                    "Compatibilité" => [
                        "OS supportés" => $q["OSSupportes"],
                        "Utilisation" => $q["Utilisation"],
                    ],
                    "Garanties" => [
                        "Garantie commerciale" => $q["GarantieCommerciale"],
                        "Garantie légale" => $q["GarantieLegale"],
                    ],

                ];


                echo '<div class="product-sheet">';
                foreach ($dic as $title => $v) {
                    echo
                        '<div class="row"> 
                    <div class="blue-tilte"> 
                        ' . $title . '
                    </div>
                    <div class="info">';
                    foreach ($v as $smalltitle => $content) {
                        echo '<p class="left-info">' . $smalltitle . '</p>';
                        if ($smalltitle == "OS supportés" || $smalltitle == "Utilisation") {
                            $contentspecial = explode(";", $content);
                            echo '<div class="right-info">';

                            foreach ($contentspecial as $k3 => $v3) {
                                echo '<p class="right-info">' . $v3 . '</p>';
                            }
                            echo '</div>';

                        } else {
                            echo
                                '<p class="right-info">' . $content . '</p>';
                        }
                    }
                    ;
                    echo
                        '</div>
                    </div>';
                }
                ;

                echo '</div>';

                ?>
            </div>

        </div>
        <div>
            <div class="product-info">


                <?php
                $q = $db->prepare("SELECT * FROM Attribut WHERE IDProduit = :IDProduit");
                $q->execute(
                    [
                        'IDProduit' => $IDProduit3,
                    ]
                );
                $q = $q->fetch();

                $Reference = $q["Modele"];

                $dic = [
                    "Informations générales" => [
                        "Désignation" => $q["Designation"],
                        "Marque" => $q["Marque"],
                        "Modèle" => $q["Modele"],
                    ],
                    "Format du clavier" => [
                        "Format" => $q["Format"],
                        "Compact" => $q["Compact"],
                        "TKL" => $q["TKL"],
                        "Norme du clavier" => $q["Norme"],
                        "Localisation" => $q["Localisation"],
                    ],
                    "Interface" => [
                        "Sans-fil" => $q["SansFil"],
                        "Interface avec l'ordinateur" => $q["InterfaceAvecOrdinateur"],
                        "Technologie de connexion du clavier" => $q["TechnologieDeConnexionDuClavier"],
                    ],
                    "Ergonomie" => [
                        "Type de touches" => $q["TypeDeTouches"],
                        "Type de switch" => $q["TypeDeSwitch"],
                        "Clavier Rétroéclairé" => $q["ClavierRetroeclaire"],
                        "Rétroéclairage RGB" => $q["RetroeclairageRGB"],
                        "Touches macro" => $q["TouchesMacro"],
                        "Touches Multimédia" => $q["TouchesMultimedia"],
                        "Pavé numérique" => $q["PaveNumerique"],
                    ],
                    "Caractéristiques Physiques" => [
                        "Couleur" => $q["Couleur"],
                        "Largeur" => $q["Largeur"],
                        "Hauteur" => $q["Hauteur"],
                        "Profondeur" => $q["Profondeur"],
                        "Poids" => $q["Poids"],
                    ],
                    "Alimentation" => [
                        "Type d'alimentation" => $q["TypeAlimentation"],
                    ],
                    "Compatibilité" => [
                        "OS supportés" => $q["OSSupportes"],
                        "Utilisation" => $q["Utilisation"],
                    ],
                    "Garanties" => [
                        "Garantie commerciale" => $q["GarantieCommerciale"],
                        "Garantie légale" => $q["GarantieLegale"],
                    ],

                ];


                echo '<div class="product-sheet">';
                foreach ($dic as $title => $v) {
                    echo
                        '<div class="row"> 
                    <div class="blue-tilte"> 
                        ' . $title . '
                    </div>
                    <div class="info">';
                    foreach ($v as $smalltitle => $content) {
                        echo '<p class="left-info">' . $smalltitle . '</p>';
                        if ($smalltitle == "OS supportés" || $smalltitle == "Utilisation") {
                            $contentspecial = explode(";", $content);
                            echo '<div class="right-info">';

                            foreach ($contentspecial as $k3 => $v3) {
                                echo '<p class="right-info">' . $v3 . '</p>';
                            }
                            echo '</div>';

                        } else {
                            echo
                                '<p class="right-info">' . $content . '</p>';
                        }
                    }
                    ;
                    echo
                        '</div>
                    </div>';
                }
                ;

                echo '</div>';

                ?>
            </div>

        </div>


    </div>
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

    <script src="../script/index.js"></script>
</body>

</html>