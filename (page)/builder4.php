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
    <link rel="stylesheet" href="../styles/builder2.css">
    <link rel="stylesheet" href="../styles/custom.css">
</head>
<body>
    <?php  
    require("../php/database.php");
    //require("../php/config.php");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    $IDUser = $_SESSION["user"]["IDUser"];
    $IDUser = 1;


    $q = $db->prepare("SELECT * FROM Customs JOIN (Attribut JOIN Produit ON Produit.IDProduit = Attribut.IDProduit) ON Customs.IDProduit=Produit.IDProduit WHERE Customs.IDCustom = :ID");
    $q->execute([
        'ID' => $_POST["IDCustom"],
    ]);
    $q = $q->fetch();
    $Reference = $q["Modele"];

    $q_avis = $db->prepare("SELECT * FROM (Avis INNER JOIN Users ON Avis.IDUser = Users.IDUser) JOIN Customs ON Customs.IDProduit=Avis.IDProduit WHERE Customs.IDCustom = :ID ORDER BY RAND () LIMIT 4;");
    $q_avis->execute([
        'ID' => $_POST["IDCustom"],
    ]);
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
        <div class="ligne2">
            <div class="left">
                <div class="box-choice"> 1 </div>
                <div class="box-choice"> 2 </div>
                <div class="box-choice"> 3 </div>
                <p class="choice-text"> Etape 4: options </p>
            </div>
            <div class="right"> 
                <div class="save-box" id="save-config-btn" onclick="SaveConfig()"> Sauvegarder ma configuration</div>
            </div>
        </div>
    </div>


    <div class="clavier" id="">
        <div class="ligne" id="">
            <button class="t30" id="0">esc</button>
            <button class="t30" id="1">1</button>
            <button class="t30" id="2">2</button>
            <button class="t30" id="3">3</button>
            <button class="t30" id="4">4</button>
            <button class="t30" id="5">5</button>
            <button class="t30" id="6">6</button>
            <button class="t30" id="7">7</button>
            <button class="t30" id="8">8</button>
            <button class="t30" id="9">9</button>
            <button class="t30" id="10">0</button>
            <button class="t30" id="11">-</button>
            <button class="t30" id="12">+</button>
            <button class="t30" id="13">←</button>
        </div>
        <div class="ligne" id="">
            <button class="t40" id="14">↔</button>
            <button class="t30" id="15">Q</button>
            <button class="t30" id="16">W</button>
            <button class="t30" id="17">E</button>
            <button class="t30" id="18">R</button>
            <button class="t30" id="19">T</button>
            <button class="t30" id="20">Y</button>
            <button class="t30" id="21">U</button>
            <button class="t30" id="22">I</button>
            <button class="t30" id="23">O</button>
            <button class="t30" id="24">P</button>
            <button class="t30" id="25">[</button>
            <button class="t30" id="26">]</button>
            <button class="t40" id="27">\</button>
        </div>
        <div class="ligne" id="">
            <button class="t50" id="28">▼</button>
            <button class="t30" id="29">A</button>
            <button class="t30" id="30">S</button>
            <button class="t30" id="31">D</button>
            <button class="t30" id="32">F</button>
            <button class="t30" id="33">G</button>
            <button class="t30" id="34">H</button>
            <button class="t30" id="35">J</button>
            <button class="t30" id="36">K</button>
            <button class="t30" id="37">L</button>
            <button class="t30" id="38">;</button>
            <button class="t30" id="39">"</button>
            <button class="t60" id="40">◄</button>
        </div>
        <div class="ligne" id="">
            <button class="t60" id="41">▲</button>
            <button class="t30" id="42">Z</button>
            <button class="t30" id="43">X</button>
            <button class="t30" id="44">C</button>
            <button class="t30" id="45">V</button>
            <button class="t30" id="46">B</button>
            <button class="t30" id="47">N</button>
            <button class="t30" id="48">M</button>
            <button class="t30" id="49">&lt;</button>
            <button class="t30" id="50">&gt;</button>
            <button class="t30" id="51">/</button>
            <button class="t80" id="52">▲</button>
        </div>
        <div class="ligne" id="">
            <button class="t40" id="53">ctr</button>
            <button class="t40" id="54">⊞</button>
            <button class="t40" id="55">alt</button>
            <button class="t180" id="56"></button>
            <button class="t40" id="57">alt</button>
            <button class="t40" id="58">⊞</button>
            <button class="t40" id="59">fn</button>
            <button class="t40" id="60">ctr</button>
        </div>
    </div>

    <form action="" id="form-action" method="POST" id="form" class="option-div">
        <div class="option-container">
            <div class="row-btn">
                <div id="arrow">_</div>
                <input type="button" id="toggle-option" value="Options" onclick="toggleOption()">
            </div>

            <div class="choice">
                <input type="checkbox" class="option" name="option1" id="opt1">
                <label for="opt1">Option1</label>
            </div>
            <div class="choice">
                <input type="checkbox" class="option" name="option2" id="opt2">
                <label for="opt2">Option2</label>
            </div>
            <div class="choice">
                <input type="checkbox" class="option" name="option3" id="opt3">
                <label for="opt3">Option3</label>
            </div>
            <div class="choice">
                <input type="checkbox" class="option" name="option4" id="opt4">
                <label for="opt4">Option4</label>
            </div>
        </div>

        <div class="achat-container">
            <div class="top-row">
                <input type="number" name="prix" id="prix" value="<?php
                    $prix = floatval($q["Prix"]);
                    switch($q["BackplateColor"]){
                        case "#ffffff": {$prix += 5; break;}
                        case "#cd853f": {$prix += 5; break;}
                    }
                    switch($q["KeycapColor"]){
                        case "#0000ff": {$prix += 91; break;}
                        case "#ff0000": {$prix += 31; break;}
                        case "#582900": {$prix += 122; break;}
                    }
                    echo $prix;
                ?>" readonly>
                <p id="euro">€</p>
                <input type="number" min="1" name="amount" id="amount" value="1">
                <p id="qt">Quantité</p>
            </div>  
            <input type="submit" value="Poursuivre l'achat" class="btn-submit">
        </div>
        <input type="hidden" name="prixUnit" id="prixUnit" value="<?php echo $prix; ?>">
        <input type="hidden" name="IDCustom" value="<?php echo $_POST["IDCustom"]; ?>">
        <input type="hidden" name="data" id="data" value="<?php echo $_POST["data"]; ?>">
        <input type="hidden" id="data" value="">

    </form>


    <div class="custom-bot">
        <hr class="black-line">
        <div class="product-info">
            <p class="custom-title"> Présentation du produit</p>
    <?php 

      echo      '<div class="product-presentation">
                <div class="product-presentation-line1">
                    <div class="product-presentation-line1-left">
                        <img class="bot-img" src="../Assets/'.$q["Path1"].'" alt="Image du clavier1">
                    </div>
                    <div class="product-presentation-line1-right">
                        <p class="product-presentation-text">'.$q["Description1"].'  </p>
                    </div>
                </div>
                <div class="product-presentation-line2">
                    <div class="product-presentation-line2-left">
                        <p class="product-presentation-text"> '.$q["Description2"].' </p>
                    </div>
                    <div class="product-presentation-line2-right">
                        <img class="bot-img" src="../Assets/'.$q["Path2"].'" alt="Image du clavier2">
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

    <script src="../script/fillKey.js"></script>

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
    
    <script src="../script/Builder4.js"></script>
</body>