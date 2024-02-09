<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d3255ff586.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/penguin" rel="stylesheet">
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/search.css">
    <?php 
        include '../php/database.php';
        require("../php/config.php");
        require("../php/forceconnect.php");
        if(!isset($_GET["ASC"])){ $_GET["ASC"] = "off";};
        if(!isset($_GET["research"])){ $_GET["research"] = "";};
        if(!isset($_GET["loadedAmount"])){ $_GET["loadedAmount"] = "4";};
    ?>
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
                        <a href="./SearchCustom.php">GALERIE</a>
                        <a href="#">SUPPORT/SAV</a>
                        <a href="#">FAQ</a>
                        <a href="#">CONTACT</a>
                    </div>
                    <div class="navbar_search">
                        <form action="" method="GET" class="search">
                            <input type="search" placeholder="Rechercher un produit" id="search" name="research">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>

    <form action="Search.php" method="get" class="form-galerie" id="form-reload">
        <div class="IsAsc">
            <input type="checkbox" name="ASC" id="Checkbox-Asc" <?php if($_GET["ASC"]=="on"){echo "checked";}?>>
            <div class="Title-Checkbox">Prix croissant</div>
            <input type="hidden" name="loadedAmount" value="<?php echo $_GET["loadedAmount"]; ?>" id="loadedAmount">
            <input type="submit" value="Submit">
        </div>
    </form>
    <div class="catalogue" id="catalogue">
        <?php 
            $_SQL_Search = "%" . $_GET["research"] . "%";

            if($_GET["ASC"] == "on"){
                $q = $db->prepare("SELECT * FROM Produit WHERE Nom like :search ORDER BY Prix ASC LIMIT " . $_GET["loadedAmount"]);
            }else{
                $q = $db->prepare("SELECT * FROM Produit WHERE Nom like :search ORDER BY Prix DESC LIMIT " . $_GET["loadedAmount"]);      
            }
            $q->execute([
                "search" => $_SQL_Search,
            ]);
            $q = $q->fetchAll();

            foreach ($q as $key => $value) {
                echo '<form action="Product-1.php" method="post" class="product">';
                    echo '<button class="img-product">';
                        echo '<img src="../Assets/' . $value["ImgPath"] . '" alt="image" width="100%" height="100%">';
                    echo '</button>';
                    echo '<h1 class="title-product">' . $value["Nom"] . '</h1>';
                    echo '<i class="price-product">' . $value["Prix"] . '€</i>';
                    
                    echo '
                        <input type="hidden" name="IDProduit" value="'.$value["IDProduit"].'">
                    ';

                    $qAvis = $db->prepare("SELECT (TexteAvis) FROM Avis INNER JOIN Users ON Users.IDUser = Avis.IDUser WHERE Avis.IDProduit = :ID ORDER BY RAND () LIMIT 1");
                    $qAvis->execute([
                        "ID" => $value["IDProduit"]
                    ]);
                    $qAvis = $qAvis->fetch();

                    echo '<p class="Avis">' . $qAvis["TexteAvis"] . '</p>';
                echo "</form>";
            }
        ?>
    </div>

    <input type="button" value="Charger Plus ..." id="btn-load-more" onclick="load_12new()">
    
    <script src="../script/ScrollHereOnLoad.js"></script>
    
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
    
    <script src="../script/search.js"></script>
</body>
</html>