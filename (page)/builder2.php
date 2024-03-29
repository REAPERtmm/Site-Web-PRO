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
    <link rel="stylesheet" href="../styles/builder2.css">
    <link rel="stylesheet" href="../styles/custom.css">
    <?php
    include '../php/database.php';
    require("../php/config.php");
    require("../php/forceconnect.php");
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
        <?php
        $IDUser = $_SESSION["user"]["IDUser"];


        $IDCustom = $_POST["IDCustom"];
        $query = $db->prepare("SELECT IDProduit FROM Customs WHERE IDCustom=:ID");
        $query->execute(['ID' => $IDCustom]);
        $IDProduit = $query->fetch()["IDProduit"];



        $q = $db->prepare("SELECT * FROM Attribut WHERE IDProduit = :IDProduit");
        $q->execute(
            [
                'IDProduit' => $IDProduit,
            ]
        );
        $q = $q->fetch();

        $Reference = $q["Modele"];

        $qp = $db->prepare("SELECT * FROM Produit WHERE IDProduit = :IDProduit");
        $qp->execute(
            [
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
        $q_avis->execute(
            [
                'IDProduit' => $IDProduit,
            ]
        );
        $q_avis = $q_avis->fetchAll();
        ?>

    </header>
    <!-- _____________________________________________________________________________________________ -->

    <div class="custom-top">
        <div class="ligne2">
            <div class="left">
                <div class="box-choice"> 1 </div>
                <p class="choice-text"> Etape 2 : Choix de la couleur </p>
                <div class="box-choice"> 3</div>
                <div class="box-choice"> 4 </div>
            </div>
            <form action="../php/load_key_in_page.php" target="_blank" class="save-conf" id="form">
                <input type="submit" class="save-box" value="sauvgarder la configuration" onclick="extract()">
                <input type="hidden" name="data" id="data" value=<?php echo $_POST["data"]; ?>>
                <input type="hidden" name="IDCustom" value=<?php echo $_POST["IDCustom"]; ?>>
            </form>
        </div>
    </div>

    </div>

    <div class="div2" id="">
        <div class="sd2-1" id="">
            <h1 class="text_3">Cible:</h1>
            <h1 class="text_3">Couleur:</h1>
        </div>
        <div class="sd2-2" id="">
            <div class="cible" id="">
                <button class="" id="cible_1">Touche</button>
                <button class="" id="cible_2">Aa</button>
            </div>
            <button class="couleur" id="C-0" title="couleur rouge"> </button>
            <button class="couleur" id="C-9" title="couleur maron"> </button>
            <button class="couleur" id="C-1" title="couleur vert"> </button>
            <button class="couleur" id="C-3" title="couleur cyan"> </button>
            <button class="couleur" id="C-4" title="couleur azur"> </button>
            <button class="couleur" id="C-5" title="couleur bleu"> </button>
            <button class="couleur" id="C-6" title="couleur jaune"> </button>
            <button class="couleur" id="C-7" title="couleur beige"> </button>
            <button class="couleur" id="C-8" title="couleur violet"> </button>
            <button class="couleur" id="C-2" title="couleur chartreuse"> </button>
            <button class="couleur" id="C-10" title="couleur coral"> </button>
            <button class="couleur" id="C-11" title="couleur crimson"> </button>
            <button class="couleur" id="C-12" title="couleur fushia"> </button>
            <button class="couleur" id="C-13" title="couleur greenyellow"> </button>
            <button class="couleur" id="C-14" title="couleur hotpink"> </button>
            <button class="couleur" id="C-15" title="couleur orangered"> </button>
            <button class="couleur" id="C-16" title="couleur gray"> </button>
            <button class="couleur" id="C-17" title="couleur lightgray"> </button>
            <button class="couleur" id="C-18" title="couleur blanc"> </button>
            <button class="couleur" id="C-19" title="couleur noir"> </button>
            <h1 class="text_4" id="gab"> Current </h1>
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

    <div class="masse">
        <div class="div4" id="">
            <h1 class="text_3" id="">Keys groups</h1>
            <div class="sd4-1" id="">
                <button class="img" id="Keys" onclick="repaint('Keys')"><img src="../Assets/clavier design2.png"
                        class="img-grp" id="" title="image groups de touche 1"></button>
                <button class="img" id="Modifier" onclick="repaint('Modifier')"><img src="../Assets/clavier design3.png"
                        class="img-grp" id="" title="image groups de touche 2"></button>
                <button class="img" id="OS" onclick="repaint('OS')"><img src="../Assets/clavier design4.png"
                        class="img-grp" id="" title="image groups de touche 3"></button>
            </div>
        </div>
        <input type="Submit" value="suivant" onclick="BeforeNextPage()">
    </div>
    <div class="custom-bot">
        <hr class="black-line">
        <div class="product-info">
            <p class="custom-title"> Présentation du produit</p>


            <?php

            echo '<div class="product-presentation">
                <div class="product-presentation-line1">
                    <div class="product-presentation-line1-left">
                        <img class="bot-img" src="../Assets/' . $path1 . '" alt="Image du clavier : ' . $keyboard_name . '">
                    </div>
                    <div class="product-presentation-line1-right">
                        <p class="product-presentation-text">' . $desc1 . '  </p>
                    </div>
                </div>
                <div class="product-presentation-line2">
                    <div class="product-presentation-line2-left">
                        <p class="product-presentation-text"> ' . $desc2 . ' </p>
                    </div>
                    <div class="product-presentation-line2-right">
                        <img class="bot-img" src="../Assets/' . $path2 . '" alt="Image du clavier : ' . $keyboard_name . '">
                    </div>
                </div>
            </div>
            <p class="custom-title"> Fiche produit</p>


        </div>
    </div>'

                ?>


            <?php


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
                            <p class="pseudo"> <i class="fa-solid fa-user"></i> ' . $Prenom . ' ' . $Nom . ' </p>
                        </div>
                        <div class="rate-text">
                            <p class="text">' . $Texte . '</p>
                        </div>
                        <div class="star-box">';

                    for ($i = 0; $i < 5; $i++) {
                        if ($i < $Note) {
                            echo '<i class="fa-solid fa-star filled"></i>';
                        } else {
                            echo '<i class="fa-regular fa-star unfilled"></i>';
                        }
                    }
                    ;


                    echo '
                        </div>
                    </div>';

                }
                ;
                ?>
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
            <script src="../script/builder2.js"></script>

</body>

</html>