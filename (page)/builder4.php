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
    <link href="https://fonts.cdnfonts.com/css/penguin" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/builder4.css">
</head>
<body>
    <?php  
    require("../php/database.php");
    require("../php/config.php");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    $IDUser = $_SESSION["user"]["IDUser"];
    
    
    if (isset($_POST['IDProduct']))
        {
            $IDProduit = $_POST['IDProduct'];
        }
    else
        {
            $IDProduit = 1;
        }

    if (!isset($_POST["IDCustom"])){
        $IDCustom = -1;
    } else {
        $IDCustom = $_POST["IDCustom"];
    }


    $q = $db->prepare("SELECT * FROM Attribut WHERE IDProduit = :IDProduit");
    $q->execute([
        'IDProduit' => $IDProduit,
    ]
    );
    $q = $q->fetch();

    $Reference = $q["Modele"];

    $qp = $db->prepare("SELECT * FROM Produit WHERE IDProduit = :IDProduit");
    $qp->execute([
        'IDProduit' => $IDProduit,
    ]
    );

    $qp = $qp->fetch();

    $keyboard_name = $qp["Nom"];
    $path1 = $qp["Path1"];
    $path2 = $qp["Path2"];
    $desc1 = $qp["Description1"];
    $desc2 = $qp["Description2"];
    $ImgPath = $qp["ImgPath"];

    $q_avis = $db->prepare("SELECT * FROM Avis INNER JOIN Users ON Avis.IDUser = Users.IDUser WHERE IDProduit = :IDProduit ORDER BY RAND () LIMIT 4;");
    $q_avis->execute([
        'IDProduit' => $IDProduit,
    ]
    );
    $q_avis = $q_avis->fetchAll();

    ?>
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
                            <?php if(isset($_GET['research'])){header("Location: ../search.php?research=".$_GET['research']);}?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>


    <div class="custom-top">
        <div class="ligne1">
            <p class="reference"> <?php echo $Reference ?> </p>
        </div>
        <div class="ligne2">
            <div class="left">
                <p class="box-choice"> 1 </p>
                <div class="box-choice"> 2 </div>
                <div class="box-choice"> 3 </div>
                <div class="choice-text"> Etape 4: options </div>
            </div>
            <div class="right"> 
                    <div class="save-box" id="save-config-btn" onclick="SaveConfig()"> Sauvegarder ma configuration</div>
            </div>
        </div>
    </div>

    <div class="custom-mid">
        <div class="img-line">
            <?php echo '<img src="../Assets/'.$ImgPath.'" alt="image du clavier" width="100%">' ?>
        </div>
        <div class="line2">
            <div class="line2-left">
                <div class="dropdown">
                    <button class="keycaps-choice-box dropbtn" onclick="Dropdown()"> Bandeau déroulant pour les options <i class="fa-solid fa-caret-down"></i> </button>
                    <div id="myDropdown" class="dropdown-content">
                        <button id="#0000ff"  onclick="SetKeycaps(this.id, 'Switch Bleu')" class="dropdown-button"> Switch Bleu (total: 91$)</button>
                        <button id="#ff0000" onclick="SetKeycaps(this.id, 'Switch Rouge')" class="dropdown-button"> Switch Rouge (total: 31$) </button>
                        <button id="#582900" onclick="SetKeycaps(this.id, 'Switch Marron')" class="dropdown-button"> Switch Marron (total: 122$) </button>
                    </div>
                </div>
            </div>
            <div class="line2-right">

            </div>
        </div>
    </div>





    <div class="custom-bot">
        <hr class="black-line">
        <div class="product-info">
            <p class="custom-title"> Présentation du produit</p>


    <?php 

      echo      '<div class="product-presentation">
                <div class="product-presentation-line1">
                    <div class="product-presentation-line1-left">
                        <img class="bot-img" src="../Assets/'.$path1.'" alt="Image du clavier : '.$keyboard_name.'">
                    </div>
                    <div class="product-presentation-line1-right">
                        <p class="product-presentation-text">'.$desc1.'  </p>
                    </div>
                </div>
                <div class="product-presentation-line2">
                    <div class="product-presentation-line2-left">
                        <p class="product-presentation-text"> '.$desc2.' </p>
                    </div>
                    <div class="product-presentation-line2-right">
                        <img class="bot-img" src="../Assets/'.$path2.'" alt="Image du clavier : '.$keyboard_name.'">
                    </div>
                </div>
            </div>
            <p class="custom-title"> Fiche produit</p>


        </div>
    </div>'

    ?>
    

    <?php 


    $dic = [
        "Informations générales"=> [
            "Désignation"=> $q["Designation"],
            "Marque"=> $q["Marque"],
            "Modèle"=> $q["Modele"],
        ],
        "Format du clavier"=> [
            "Format"=> $q["Format"],
            "Compact"=> $q["Compact"],
            "TKL"=> $q["TKL"],
            "Norme du clavier"=> $q["Norme"],
            "Localisation"=> $q["Localisation"],
        ],
        "Interface"=> [
            "Sans-fil"=> $q["SansFil"],
            "Interface avec l'ordinateur"=> $q["InterfaceAvecOrdinateur"],
            "Technologie de connexion du clavier"=> $q["TechnologieDeConnexionDuClavier"],
        ],
        "Ergonomie"=> [
            "Type de touches"=> $q["TypeDeTouches"],
            "Type de switch"=> $q["TypeDeSwitch"],
            "Clavier Rétroéclairé"=> $q["ClavierRetroeclaire"],
            "Rétroéclairage RGB"=> $q["RetroeclairageRGB"],
            "Touches macro"=> $q["TouchesMacro"],
            "Touches Multimédia"=> $q["TouchesMultimedia"],
            "Pavé numérique"=> $q["PaveNumerique"],
        ],
        "Caractéristiques Physiques"=> [
            "Couleur"=> $q["Couleur"],
            "Largeur"=> $q["Largeur"],
            "Hauteur"=> $q["Hauteur"],
            "Profondeur"=> $q["Profondeur"],
            "Poids"=> $q["Poids"],
        ],
        "Alimentation"=> [
            "Type d'alimentation"=> $q["TypeAlimentation"],
        ],
        "Compatibilité"=> [
            "OS supportés"=> $q["OSSupportes"],
            "Utilisation"=> $q["Utilisation"],
        ],
        "Garanties"=>  [
            "Garantie commerciale"=> $q["GarantieCommerciale"],
            "Garantie légale"=> $q["GarantieLegale"],
        ],

    ];


    echo '<div class="product-sheet">';
    foreach( $dic as $title => $v ) {
        echo                
        '<div class="row"> 
        <div class="blue-tilte"> 
            '. $title .'
        </div>
        <div class="info">';
        foreach( $v as $smalltitle => $content ) {
            echo '<p class="left-info">'.$smalltitle.'</p>';
            if( $smalltitle == "OS supportés" || $smalltitle == "Utilisation") {
                $contentspecial = explode(";", $content);
                echo '<div class="right-info">';

                foreach( $contentspecial as $k3 => $v3 ) {
                    echo '<p class="right-info">'.$v3.'</p>' ;
                }
                echo '</div>';

            }
            else{
                echo 
                '<p class="right-info">'.$content.'</p>';
            }
        };
        echo 
        '</div>
        </div>';
    };

    echo '</div>';

    ?>

    <p class="rate-title"> Avis</p>
    <div class="rate-box">

        <?php

            foreach ($q_avis as $key => $value) {


                $Note = $value["NoteAvis"];
                $Texte = $value["TexteAvis"];
                $Nom = $value["Nom"];
                $Prenom = $value["Prenom"];

                echo '
                    <div class="rate">
                        <div class="rate-pseudo">
                            <p class="pseudo"> <i class="fa-solid fa-user"></i> '.$Prenom.' '.$Nom.' </p>
                        </div>
                        <div class="rate-text">
                            <p class="text">'.$Texte.'</p>
                        </div>
                        <div class="star-box">';

                        for ( $i = 0; $i < 5; $i++){
                            if ($i < $Note) {
                                echo '<i class="fa-solid fa-star filled"></i>';
                            } else {
                                echo '<i class="fa-regular fa-star unfilled"></i>';
                            }
                        };


                echo '
                        </div>
                    </div>';

            };
        ?>

  

    </div>

    <form action="" id="form-action" method="POST">
        <input type="hidden" id="backplate-color" name="backplate-color" value="bbbbbb">
        <input type="hidden" id="keycaps-color" name="keycaps-color" value="#0000ff">
        <input type="hidden" id="data" value="">
    </form>

    <?php
    
    if (isset($_POST['backplate-color']) && isset($_POST['keycaps-color'])) {
        $BackplateColor = $_POST["backplate-color"];
        $KeycapsColor = $_POST["keycaps-color"];
    

        $q_check = $db->prepare("SELECT COUNT(*) FROM Customs WHERE IDCustom=:IDCustom");
        $q_check->execute([
            "IDCustom"=> $IDCustom,
        ]);
        $check = $q_check->fetch();

        if($check[0] > 0){
            $qc = $db->prepare("UPDATE Customs SET BackplateColor=:BackplateColor, KeycapColor=:KeycapColor WHERE IDCustom=:IDCustom");
            $qc ->execute([
                "IDCustom"=> $IDCustom,
                "BackplateColor"=> $BackplateColor,
                "KeycapColor"=> $KeycapsColor
            ]);
        } else {
            $qc = $db->prepare("INSERT INTO Customs(IDCustom,IDUser,IDProduit,BackplateColor,KeycapColor) VALUES (NULL, :IDUser, :IDProduit, :BackplateColor,:KeycapColor)");
            $qc ->execute([
                "IDUser" => $IDUser,
                "IDProduit"=> $IDProduit,
                "BackplateColor"=> $BackplateColor,
                "KeycapColor"=> $KeycapsColor
            ]);
        }
    }



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
    
    <script src="../script/custom.js"></script>
</body>