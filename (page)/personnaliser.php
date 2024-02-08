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
    <link rel="stylesheet" href="../styles/personnaliser.css">
    <?php include '../php/database.php'; $IDUser = 1;?>
</head>
<body>
    
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



    <div class="best-offers-bg">
        <div class="best-offers">
            <?php 
            $q = $db->prepare('SELECT Produit.Nom, Produit.ImgPath, Produit.IDProduit, Customs.IDCustom FROM Customs JOIN Produit ON Customs.IDProduit = Produit.IDProduit WHERE IDUser=:ID');
            $q->execute([
                'ID'=>$IDUser,
            ]);
            $count = $q->rowCount();
            $datas = $q->fetchAll();
            for($i= 0;$i<9;$i++){
                echo '
                <div class="offers">
                    <div class="offers-product">
                        <form action="custom.php" method="POST">
                            <div>';
                if($i < $count){
                    echo                '<button type="submit"> <img class="offers-img" src="../Assets/'.$datas[$i]["ImgPath"].'" alt="Image du clavier best seller"></button>';
                    echo                '<input type="hidden" name="IDProduct" value="'.$datas[$i]["IDProduit"].'">';
                    echo                '<input type="hidden" name="IDCustom" value="'.$datas[$i]["IDCustom"].'">';
                    echo '  </div>        
                        </form>           
                        <p class="offers-model"> '.$datas[$i]["Nom"].' </p>
                        <p class="offers-model"> ???€ </p>
                    </div>';
                } else{
                    echo                '<button type="submit"> <img class="offers-img" src="../Assets/Clavier1.webp" alt="Image du clavier best seller"></button>';
                    echo                '<input type="hidden" name="IDProduct" value="1">';
                    echo                '<input type="hidden" name="IDCustom" value="-1">';
                    echo '  </div>        
                        </form>           
                        <p class="offers-model"> ?Name? </p>
                        <p class="offers-model"> ???€ </p>
                    </div>';
                }
                echo '
                </div>';
            }
            
            ?>
            <!-- <div class="offers">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div>
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="1">
                            <input type="hidden" name="IDCustom" value="1">
                        </div>        
                    </form>           
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div>

            <div class="offers">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div href="custom.php">
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="2">
                            <input type="hidden" name="IDCustom" value="2">
                        </div>        
                    </form> 
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div>

            <div class="offers" id="best-selling">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div href="custom.php">
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="2">
                            <input type="hidden" name="IDCustom" value="3">
                        </div>        
                    </form>                   
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div>

            
            <div class="offers">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div href="custom.php">
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="2">
                            <input type="hidden" name="IDCustom" value="4">
                        </div>        
                    </form>              
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div>

            <div class="offers">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div href="custom.php">
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="2">
                            <input type="hidden" name="IDCustom" value="5">
                        </div>        
                    </form> 
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div>

            <div class="offers" id="best-selling">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div href="custom.php">
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="2">
                            <input type="hidden" name="IDCustom" value="6">
                        </div>        
                    </form>              
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div>

            <div class="offers">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div href="custom.php">
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="2">
                            <input type="hidden" name="IDCustom" value="7">
                        </div>        
                    </form>            
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div>

            <div class="offers">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div href="custom.php">
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="2">
                            <input type="hidden" name="IDCustom" value="8">
                        </div>        
                    </form> 
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div>

            <div class="offers" id="best-selling">
                <div class="offers-product">
                    <form action="custom.php" method="POST">
                        <div href="custom.php">
                            <button type="submit"> <img class="offers-img" src="../Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller"></button>
                            <input type="hidden" name="IDProduct" value="2">
                            <input type="hidden" name="IDCustom" value="9">
                        </div>        
                    </form>           
                    <p class="offers-model"> Référence modèle </p>
                    <p class="offers-model"> Prix </p>
                </div>
            </div> -->

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

</body>