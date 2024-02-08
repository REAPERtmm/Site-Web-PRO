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
    <link rel="stylesheet" href="../styles/panier2.css">
</head>
<body>

<?php  
    require("../php/database.php");
    require("../php/config.php");

    $IDUser = $_SESSION["user"]["IDUser"];

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
                            <?php if(isset($_GET['research'])){header("Location: ../Search.php?research=".$_GET['research']);}?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>

<!-- ________________________________________________________________________________________________________ -->
    <div class="panier-top">
        <div class="ligne1">
            <div class="left">
                <p class="box-choice"> 1 </p>
                <div class="choice-text"> Etape 2 : Adresse </div>
                <div class="box-choice"> 3 </div>
                <div class="box-choice"> 4 </div>
            </div>
        </div>
    </div>
    <div class="panier-mid">
        <form action="./panier3.php" method="POST" class="forml">
            <div class="form-info">
                <p class="form-text">Prénom*</p>
                <input type="text" name="prenom" id="prenom" required>
                <p class="form-text">Nom*</p>
                <input type="text" name="nom" id="nom" required>
                <p class="form-text">Adresse*</p>
                <input type="text" name="adresse" id="adresse" required>
                <p class="form-text">adresse 2</p>
                <input type="text" name="adresse2" id="adresse2">
                <p class="form-text">Code postal*</p>
                <input type="number" name="CP" id="CP" required>
                <p class="form-text">Ville*</p>
                <input type="text" name="ville" id="ville" required>
                <p class="form-text">Pays*</p>
                <input type="text" name="pays" id="pays" required>
                <p class="form-text">Informations supplémentaires</p>
                <input type="text" name="info" id="info">
                <p class="form-text">Téléphone*</p>
                <input type="text" name="telephone" id="telephone" required>
            </div>

            <input class="bouton_continuer" type="submit" value="Valider" onclick="BeforeNextPage()">
            <input type="hidden" name="Data" value="<?php print_r($_POST["Data"]);?>" id="Data">
        </form>
    </div>



<!-- ________________________________________________________________________________________________________ -->
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
    
    <script src="./script/index.js"></script>
</body>
</html>