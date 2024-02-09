<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/product1.css">
    <script src="https://kit.fontawesome.com/d3255ff586.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
    include ('../php/database.php'); 
    require("../php/config.php");
    require("../php/forceconnect.php");

    $IDProduit = $_POST["IDProduit"];
    $IDUser = $_SESSION["user"]["IDUser"];

    $qp = $db->prepare("SELECT * FROM Produit WHERE IDProduit = :IDProduit");
    $qp->execute([
        "IDProduit"=> $IDProduit
    ]);

    $qf = $qp->fetch();

    $Nom = $qf["Nom"];
    $desc1 = $qf["Description1"];
    $desc2 = $qf["Description2"];
    $ImgPath = $qf["ImgPath"];
    
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
                        <?php if(isset($_GET['research'])){header("Location: ./Search.php?research=".$_GET['research']);}?>
                    </form>
                </div>
            </div>
        </div>
    </header>
<!-- _____________________________________________________________________________________________ -->

    <div class="div1">
        <div class="div2">
            <img src="../Assets/<?php echo $ImgPath ?>" class="img-de-clavier-la-classe-est-pas-trop-longue" title="image de clavier">
        </div>
        <div class="div4">
            <div class="div9">
                <h1 class="text_3"><?php echo $Nom; ?></h1>
                <h1 class="text_2"><?php echo $desc1; echo "\n"; echo $desc2; ?> </h1>
                <div class="div5">
                    <h1 class="text_11">En stock</h1>
                    <div class="div6">
                        <h1 class="text_1">Quantité</h1>
                        <input type="number" class="lavardenombrearentrepourlaquantité" id="quantity" value="1">
                    </div>
                </div>
                <div class="div7">
                    <div class="div7left">
                        <a href="#repere">
                            <input type="submit" class="pourcent" name="fiche-btn" id="fiche-btn" value="Fiche technique">
                        </a>
                    </div>
                    <div class="div7right">
                        <a href="#repere2">
                            <input type="submit" class="pourcent" name="avis-btn" id="avis-btn" value="Avis">
                        </a>
                    </div>
                </div>
            </div>
            <div class="div8">
                <form action="" method="POST" id="form-panier">
                    <?php 
                    $checkq = $db->prepare('SELECT * FROM Paniers WHERE IDUser = :IDUser AND IDProduit = :IDProduit');
                    $checkq->execute([
                        'IDUser'=> $IDUser,
                        "IDProduit"=> $_POST["IDProduit"],
                    ]);
                    if($checkq->rowCount() != 0) {
                        $checkqf = $checkq->fetchAll();
                        foreach($checkqf as $key => $value) {
                            if($value["IsBought"] == 1) {
                                echo '<input name="avis" type="text" placeholder="Veuillez rentrez un commentaire" value="">';
                                echo'<label for=""> Note </label>';
                                echo '<input name="avis-note" type="number" min="0" max="5" value="5">';
                                echo '<input name="avis-btn" type="submit" value="Envoyer le commentaire">';
                        }
                    }
    
                        
                    }
                    ?>
                    <input type="submit" class="pourcent" name="acheter-btn" id="acheter-btn" onclick="SetForm()" value="Acheter">
                    <input type="hidden" id="hidden-quant" name="hidden-quant" value="">
                    <input type="hidden" id="IDProduit" name="IDProduit" value=" <?php echo $IDProduit ?>">
                    <input type="hidden" id="IDUser" name="IDUser" value=" <?php echo $IDUser ?>">
                    <input type="submit" class="pourcent" name="ajouter-btn" id="ajouter-btn" onclick="SetForm()" value="Ajouter au panier">
                    <input type="submit" class="pourcent" name="fav-btn" id="fav-btn" value="Mettre en favoris">
                </form>
                <?php 
                if(isset($_POST["ajouter-btn"]) || isset($_POST["acheter-btn"])) { 
                    $check = $db->prepare('SELECT * FROM Paniers WHERE IDUser = :IDUser AND IDProduit = :IDProduit');
                    $check->execute([
                        'IDUser'=> $IDUser,
                        'IDProduit' => $IDProduit
                    ]);
                    if($check->rowCount() == 0) {
                        $query = $db->prepare('INSERT INTO Paniers VALUES(:IDUser, 0,NULL,:IDProduit,NULL,:Amount,0)');
                        $query->execute([
                            "IDUser" => $IDUser,
                            "IDProduit" => $IDProduit,
                            "Amount" => $_POST["hidden-quant"],
                        ]);
                    } else {
                        $checkf = $check->fetch();
                        $query2 = $db->prepare("UPDATE Paniers SET Amount = :Amount WHERE IDProduit = :IDProduit AND IDUser = :IDUser");
                        $query2->execute([
                            "Amount"=> $checkf["Amount"] + $_POST["hidden-quant"],
                            "IDProduit" => $IDProduit,
                            "IDUser"=> $IDUser,
                        ]);
                    }
                    echo 'Produit ajouté avec succès !';
                    if (isset($_POST["acheter-btn"])) {
                        header("Location: panier.php");
                    }
                }
                if(isset($_POST["fav-btn"])) {
                    $q = $db->prepare("INSERT INTO Favoris VALUES (NULL, :IDProduit, :IDUser)");
                    $q->execute([
                        "IDProduit"=> $_POST["IDProduit"],
                        "IDUser"=> $IDUser,
                    ]);
                    echo 'Produit ajouté au favoris avec succès !';
                }
                
                if(isset($_POST['avis-btn'])) {
                    $q = $db->prepare('INSERT INTO Avis VALUES(NULL, :IDUser, :IDProduit, :NoteAvis, :TexteAvis)');
                    $q->execute([
                        'IDUser'=> $IDUser,
                        'IDProduit'=> $_POST['IDProduit'],
                        'NoteAvis'=> $_POST['avis-note'],
                        'TexteAvis' => $_POST['avis'],
                    ]);
                }




                ?>
            </div>
        </div>
    </div>

    <div class="separ"></div>
    <h1 class="text_3">vous aimerez également :</h1>
    
    <div class="div0">

    <?php 
        $q_autre = $db->prepare('SELECT * FROM Produit WHERE IDProduit != :IDProduit ORDER BY RAND () LIMIT 3');
        $q_autre->execute([
            "IDProduit" => $IDProduit,
        ]);
        $q_autref = $q_autre->fetchAll();
        foreach ($q_autref as $key => $value) {
            echo '<form class="A" method="POST">';
            $ImgPathAutre = $value['ImgPath'];
            $NomAutre = $value['Nom'];
            echo '<button >';
            echo '<img class="D" src="../Assets/'.$ImgPathAutre.'" title="image de produit">';
            echo '<input type="hidden" name="IDProduit" value="'.$value["IDProduit"].'">';
            echo '<h1 class="text_1">'.$NomAutre.'</h1>';
            echo '</button>';
            echo'</form>';
        }
        

    ?>
    </div>

    <div>
        <div class="product-info">


                <?php 
                $q = $db->prepare("SELECT * FROM Attribut WHERE IDProduit = :IDProduit");
                $q->execute([
                    'IDProduit' => $IDProduit,
                ]
                );
                if($q->rowCount() != 0) {
                    $q = $q->fetch();
                
                    $Reference = $q["Modele"];

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


                    echo '<div class="product-sheet" id="repere">';
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
                }

                ?>
        </div>

    </div>
    <div class="rate-box" id="repere2">
        <?php 
         
                $q_avis = $db->prepare("SELECT * FROM Avis INNER JOIN Users ON Avis.IDUser = Users.IDUser WHERE Avis.IDProduit = :IDProduit ORDER BY RAND () LIMIT 4;");
                $q_avis->execute([
                    'IDProduit' => $IDProduit,
                ]
                );
                $q_avis = $q_avis->fetchAll();
            
        
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
<script src="../script/product1.js"></script>

</body>
</html>