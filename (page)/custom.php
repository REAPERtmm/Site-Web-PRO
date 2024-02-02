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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans=>ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/penguin" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/custom.css">
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
                        <a href="./(page)/Search.html"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                        <a href="./(page)/login.html"><i class="fa-solid fa-user fa-beat"></i></a>
                        <img src="./Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                    </div>
                </div>

                <div class="header_bot">
                    <div class="navbar_link">
                        <a href="index.html">NOS PRODUITS</a>
                        <a href="index.html">PERSONNALISER</a>
                        <a href="./(page)/Search.html">GALERIE</a>
                        <a href="index.html">SUPPORT/SAV</a>
                        <a href="index.html">FAQ</a>
                        <a href="index.html">CONTACT</a>
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

    <div class="custom-top">
        <div class="ligne1">
            <p class="reference"> Référence modèle </p>
        </div>
        <div class="ligne2">
            <div class="left">
                <p class="choice-text"> Etape 1=> choix du clavier</p>
                <div class="box-choice"> 2 </div>
                <div class="box-choice"> 3 </div>
                <div class="box-choice"> 4 </div>
            </div>
            <div class="right"> 
                <div class="save-box"> Sauvegarder ma configuration</div>
            </div>
        </div>
    </div>

    <div class="custom-mid">
        <div class="img-line">
            <img src="../Assets/keyboard-test.png" alt="image du clavier" width="100%">
        </div>
        <div class="other-choice">
            <div class="keycaps-line">
                <div class="dropdown">
                <p class="mid-keycaps-text"> Choix du Switch => <span id="choice-keycaps-user" class="choiceuser"> choix de l'utilisateur </span></p>
                <a class="help" href="https://www.cybertek.fr/blog/peripheriques/clavier-pc/quel-type-de-switch-choisir-pour-son-clavier" >Comment choisir son switch </a>
                <div class="dropdown">
                    <button class="keycaps-choice-box dropbtn" onclick="Dropdown()">Afficher les différents switch</button>
                    <div id="myDropdown" class="dropdown-content">
                        <button id="Switch Bleu" onclick="SetKeycaps(this.id)" class="dropdown-button"> Switch Bleu </button>
                        <button id="Switch Rouge" onclick="SetKeycaps(this.id)" class="dropdown-button"> Switch Rouge </button>
                        <button id="Switch Marron" onclick="SetKeycaps(this.id)" class="dropdown-button"> Switch Marron </button>
                    </div>
                </div>
                </div>
            </div>

            <div class="backplate-line">
                <div class="gauche">
                    <p class="backplate-color-text">Couleur de la backplate</p>
                    <div class="backplate">
                        <div class="dot grey" ></div>
                        <p class="backplate-text"> Gris</p>
                    </div>
                    <div class="backplate">
                        <div class="dot black" ></div>
                        <p class="backplate-text"> Noir </p>
                    </div>
                    <div class="backplate">
                        <div class="dot white" ></div>
                        <p class="backplate-text"> Blanc</p>
                    </div>
                    <div class="backplate">
                        <div class="dot peru" ></div>
                        <p class="backplate-text"> Peru </p>
                    </div>
                </div>

                <div class="droite">
                    <div class="next-box"> Suivant </div>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-bot">
        <hr class="black-line">
        <div class="product-info">
            <p class="custom-title"> Présentation du produit</p>
            <div class="product-presentation">
                <div class="product-presentation-line1">
                    <div class="product-presentation-line1-left">
                        <img class="bot-img" src="../Assets/keyboard-test.png" alt="Image de votre clavier">
                    </div>
                    <div class="product-presentation-line1-right">
                        <p class="product-presentation-text"> Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. </p>
                    </div>
                </div>
                <div class="product-presentation-line2">
                    <div class="product-presentation-line2-left">
                        <p class="product-presentation-text"> Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. </p>
                    </div>
                    <div class="product-presentation-line2-right">
                        <img class="bot-img" src="../Assets/keyboard-test.png" alt="Image de votre clavier">
                    </div>
                </div>
            </div>
            <p class="custom-title"> Fiche produit</p>


        </div>
    </div>

    <?php 

    include("../php/database.php");


    $q = $db->prepare("SELECT * FROM Attribut WHERE IDProduit = :IDProduit");
    $q->execute([
        'IDProduit' => 1,
    ]
    );
    $q = $q->fetch();


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