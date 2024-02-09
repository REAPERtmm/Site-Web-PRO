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
    <link rel="stylesheet" href="../styles/custom.css"> 
</head>
<body>
    <?php  
    require("../php/database.php");
    require("../php/config.php");
    require("../php/forceconnect.php");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    $IDUser = $_SESSION["user"]["IDUser"];

    if(!isset($_POST["IDCustom"]) || $_POST["IDCustom"] == -1){
        if(isset($_POST["IDProduit"])){
            $IDProduit = $_POST['IDProduct'];
        } else
        {
            $IDProduit = 1;
        }
        $query = $db->prepare("INSERT INTO Customs(IDCustom, IDUser, IDProduit) VALUES (NULL, :User, :IDP)");
        $query->execute(['IDP'=>$IDProduit, 'User'=>$IDUser]);
        $IDCustom = $db->lastInsertId();
    } else {
        $IDCustom = $_POST["IDCustom"];
        $query = $db->prepare("SELECT IDProduit FROM Customs WHERE IDCustom=:ID");
        $query->execute(['ID'=>$IDCustom]);
        $IDProduit = $query->fetch()["IDProduit"];
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
            <div class="header_top">
                <div class="logo">
                    <img src="../Assets/logo-removebg-preview.png" alt="Logo" class="logo-img">
                    <p class="logo-name">SNOWSTORM.GG</p>
                </div>
                <div class="logo">
                    <a href="../(page)/Search.html"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                    <a href="../(page)/login.html"><i class="fa-solid fa-user fa-beat"></i></a>
                    <img src="../Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                </div>
            </div>

            <div class="header_bot">
                <div class="navbar_link">
                    <a href="index.html">NOS PRODUITS</a>
                    <a href="index.html">PERSONNALISER</a>
                    <a href="../(page)/Search.html">GALERIE</a>
                    <a href="./support.php">SUPPORT/SAV</a>
                    <a href="index.html">FAQ</a>
                    <a href="./page-contact.html">CONTACT</a>
                </div>
                <div class="navbar_search">
                    <form action="" class="search">
                        <input type="text" placeholder="Rechercher un produit">
                    </form>
                </div>
            </div>
        </div>
    </header>


    <div class="custom-top">
        <div class="ligne1">
            <p class="reference"> <?php echo $Reference ?> </p>
        </div>
        <div class="ligne2">
            <div class="left">
                <p class="choice-text"> Etape 1: choix du clavier</p>
                <div class="box-choice"> 2 </div>
                <div class="box-choice"> 3 </div>
                <div class="box-choice"> 4 </div>
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
        <div class="other-choice">
            <div class="keycaps-line">
                <p class="mid-keycaps-text"> Choix du Switch : 
                    <span id="choice-keycaps-user"> 
                        <?php  
                        if(isset($_POST["keycaps-color"])){
                            switch($_POST["keycaps-color"]){
                                case "#0000ff": {echo "Switch Bleu"; break;}
                                case "#ff0000": {echo "Switch Rouge"; break;}
                                case "#582900": {echo "Switch Marron"; break;}
                            }
                        } 
                        ?> 
                    </span>
                </p>
                <a class="help" href="https://www.cybertek.fr/blog/peripheriques/clavier-pc/quel-type-de-switch-choisir-pour-son-clavier" >Comment choisir son switch </a>
                <div class="dropdown">
                    <button class="keycaps-choice-box dropbtn" onclick="Dropdown()">Afficher les différents switch</button>
                    <div id="myDropdown" class="dropdown-content">
                        <button id="#0000ff"  onclick="SetKeycaps(this.id, 'Switch Bleu')" class="dropdown-button"> Switch Bleu (total: 91$)</button>
                        <button id="#ff0000" onclick="SetKeycaps(this.id, 'Switch Rouge')" class="dropdown-button"> Switch Rouge (total: 31$) </button>
                        <button id="#582900" onclick="SetKeycaps(this.id, 'Switch Marron')" class="dropdown-button"> Switch Marron (total: 122$) </button>
                    </div>
                </div>
            </div>

            <div class="backplate-line">
                <div class="gauche">
                    <p class="backplate-color-text">Couleur de la backplate</p>
                    <div class="backplate">
                        <button id="#bbbbbb" class="backplate-btn <?php if(isset($_POST["backplate-color"]) && $_POST["backplate-color"] == "#bbbbbb"){echo "clicked-btn";} ?>" onclick="SetBackplate(this.id)">
                            <div class="dot grey" ></div>
                            <p class="backplate-text"> Gris </p>
                        </button>
                    </div>
                    <div class="backplate">
                        <button id="#000000" class="backplate-btn <?php if(isset($_POST["backplate-color"]) && $_POST["backplate-color"] == "#000000"){echo "clicked-btn";} ?>" onclick="SetBackplate(this.id)">
                            <div class="dot black" ></div>
                            <p class="backplate-text"> Noir </p>
                        </button>
                    </div>
                    <div class="backplate">
                        <button id="#ffffff" class="backplate-btn <?php if(isset($_POST["backplate-color"]) && $_POST["backplate-color"] == "#ffffff"){echo "clicked-btn";} ?>" onclick="SetBackplate(this.id)">
                            <div class="dot white" ></div>
                            <p class="backplate-text"> Blanc + 5$ </p>
                        </button>
                    </div>
                    <div class="backplate">
                        <button id="#cd853f" class="backplate-btn <?php if(isset($_POST["backplate-color"]) && $_POST["backplate-color"] == "#cd853f"){echo "clicked-btn";} ?>" onclick="SetBackplate(this.id)">
                            <div class="dot peru" ></div>
                            <p class="backplate-text"> Peru + 5$ </p>
                        </button>
                    </div>
                </div>

                <div class="droite">
                    <div class="next-box" id="next-btn" onclick="NextPage()"> Suivant </div>
                </div>
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
        <input type="hidden" id="backplate-color" name="backplate-color" value="<?php if(isset($_POST["backplate-color"])){echo $_POST["backplate-color"];}else{echo "undefine";} ?>">
        <input type="hidden" id="keycaps-color" name="keycaps-color" value="<?php if(isset($_POST["keycaps-color"])){echo $_POST["keycaps-color"];}else{echo "undefine";} ?>">
        <input type="hidden" id="data" name="data" value="">
        <input type="hidden" name="IDCustom" value=<?php echo $IDCustom;?>>    
    </form>


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