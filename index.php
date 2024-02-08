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
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/index.css">
</head>
<body>
    

    <header class="unselectable">
        <div class="header">
            <div class="header-grp">
                <div class="header_top">
                    <div class="logo">
                        <img src="./Assets/logo-removebg-preview.png" alt="Logo" class="logo-img">
                        <a href="index.php"><p class="logo-name">SNOWSTORM.GG</p></a>
                    </div>
                    <div class="logo">
                        <a href="./(page)/panier.php"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                        <a href="./(page)/login.php"><i class="fa-solid fa-user fa-beat"></i></a>
                        <img src="./Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                    </div>
                </div>
                
                <div class="header_bot">
                    <div class="navbar_link">
                        <a href="./(page)/Product-1.html">NOS PRODUITS</a>
                        <a href="./(page)/personnaliser.php">PERSONNALISER</a>
                        <a href="./(page)/Search.php">GALERIE</a>
                        <a href="./(page)/support.php">SUPPORT/SAV</a>
                        <a href="./(page)/faq">FAQ</a>
                        <a href="./(page)/page contact.html.">CONTACT</a>
                    </div>
                    <div class="navbar_search">
                        <form action="" method="GET" class="search">
                            <input type="search" placeholder="Rechercher un produit" id="search" name="research">
                            <?php if(isset($_GET['research'])){header("Location: ./(page)/Search.php?research=".$_GET['research']);}?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>
    
    <div class="background-carrousel">
        <div class="carrousel">
            <div class="image-carrousel-on image-carrousel" id="Clavier1"></div>
            <div class="image-carrousel-off image-carrousel" id="Clavier2"></div>
            <div class="image-carrousel-off image-carrousel" id="Clavier3"></div>
            <div class="image-carrousel-off image-carrousel" id="Clavier4"></div>
            <div class="carrousel-btn-div">
                <input type="button" class="carrousel-btn-off carrousel-btn" id="btn-1" onclick="forced_set(0)">
                <input type="button" class="carrousel-btn-off carrousel-btn" id="btn-2" onclick="forced_set(1)">
                <input type="button" class="carrousel-btn-off carrousel-btn" id="btn-3" onclick="forced_set(2)">
                <input type="button" class="carrousel-btn-off carrousel-btn" id="btn-4" onclick="forced_set(3)">
            </div>
        </div>
    </div>


    <div class="best-offers-bg">
        <div class="best-offers">
            <div class="offers">
                <p class="offers-title"> <b>Nos meilleures ventes</b></p>
                <div class="offers-product">
                    <a href="" class="offers-compare"> <span><i class="fa-solid fa-plus"></i></span> Comparer </a>
                    <img class="offers-img" src="./Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller">
                    <p class="offers-model"> Référence modèle </p>
                </div>
            </div>

            <div class="offers">
                <p class="offers-title"> <b>Nos Nouveautés</b></p>
                <div class="offers-product">
                    <a href="" class="offers-compare"> <span><i class="fa-solid fa-plus"></i></span> Comparer </a>
                    <img class="offers-img" src="./Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller">
                    <p class="offers-model"> Référence modèle </p>
                </div>
            </div>

            <div class="offers" id="best-selling">
                <p class="offers-title"> <b>Nos classiques</b></p>
                <div class="offers-product">
                    <a href="" class="offers-compare"> <span><i class="fa-solid fa-plus"></i></span> Comparer </a>
                    <img class="offers-img" src="./Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller">
                    <p class="offers-model"> Référence modèle </p>
                </div>
            </div>

            
            <div class="offers" id="best-selling">
                <p class="offers-title"> <b>Nos kits préfaits</b></p>
                <div class="offers-product">
                    <a href="" class="offers-compare"> <span><i class="fa-solid fa-plus"></i></span> Comparer </a>
                    <img class="offers-img" src="./Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller">
                    <p class="offers-model"> Référence modèle </p>
                </div>
            </div>

            
            <div class="offers" id="best-selling">
                <p class="offers-title"> <b>Nos kits préfaits</b></p>
                <div class="offers-product">
                    <a href="" class="offers-compare"> <span><i class="fa-solid fa-plus"></i></span> Comparer </a>
                    <img class="offers-img" src="./Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller">
                    <p class="offers-model"> Référence modèle </p>
                </div>
            </div>

            
            <div class="offers" id="best-selling">
                <p class="offers-title"> <b>Nos kits préfaits</b></p>
                <div class="offers-product">
                    <a href="" class="offers-compare"> <span><i class="fa-solid fa-plus"></i></span> Comparer </a>
                    <img class="offers-img" src="./Assets/Clavier-Carousel-2.jpeg" alt="Image du clavier best seller">
                    <p class="offers-model"> Référence modèle </p>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer">
        <div class="footer-container unselectable">
            <img src="./Assets/logo-removebg-preview.png" alt="Logo de Snowstorm" id="footer-img">
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
    
    <script src="./script/app.js"></script>
    <script src="./script/index.js"></script>
</body>
</html>