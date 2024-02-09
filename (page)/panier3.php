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
    <link rel="stylesheet" href="../styles/panier3.css">
</head>
<body>
    <?php 
        require("../php/database.php");
        require("../php/config.php");

        $IDUser = $_SESSION["user"]["IDUser"];

        $Prenom = $_POST["prenom"];
        $Nom = $_POST["nom"];
        $Adresse = $_POST["adresse"];
        $Adresse2 = $_POST["adresse2"];
        $CodePostal = $_POST["CP"];
        $Ville = $_POST["ville"];
        $Pays = $_POST["pays"];
        $Info = $_POST["info"];
        $Telephone = $_POST["telephone"];
    

        $q = $db ->prepare("INSERT INTO Livraison VALUES (NULL, :IDUser, :Prenom, :Nom, :Adresse, :Adresse2, :CodePostal, :Ville, :Pays, :InfoSupplementaires, :Telephone, :PointRelais)");
        $q -> execute([
            "IDUser"=> $IDUser,
            "Prenom"=> $Prenom,
            "Nom"=> $Nom,
            "Adresse"=> $Adresse,
            "Adresse2"=> $Adresse2,
            "CodePostal"=> $CodePostal,
            "Ville"=> $Ville,
            "Pays"=> $Pays,
            "InfoSupplementaires"=> $Info,
            "Telephone"=> $Telephone,
            "PointRelais"=> 0
        ]);

        $IDLivraison = $db->lastInsertId();
        $IDPanier = $_POST["DataPanier"];
        


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
                        <a href="./SearchCustom.php">GALERIE</a>
                        <a href="#">SUPPORT/SAV</a>
                        <a href="#">FAQ</a>
                        <a href="#">CONTACT</a>
                    </div>
                    <div class="navbar_search">
                        <form action="" method="GET" class="search">
                            <input type="search" placeholder="Rechercher un produit" id="search" name="research">
                            <?php if(isset($_GET['research'])){header("Location: ./Search.php?research=".$_GET['research']);}?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>


    <div class="panier3-top">
        <div class="ligne2">
            <div class="left">
                <p class="box-choice"> 1 </p>
                <div class="box-choice"> 2 </div>
                <div class="choice-text"> Etape 3: Livraison </div>
                <div class="box-choice"> 4 </div>
            </div>
        </div>
    </div>

    <div class="panier3-mid">

        <div class="line">
            <div class="line-left">
                <img src="../Assets/Apps-Colissimo.jpg" alt="Logo de colissimo" width="15%">
                <p class="mid-text"> Retrait en point relais</p>
            </div>
            <div class="line-right">
                <div class="save-box1" id="check-box1" onclick="SetClickedBox(this.id, 1)"> </div>
            </div>
        </div>


        <div class="line">
            <div class="line-left">
                <img src="../Assets/Apps-Colissimo.jpg" alt="Logo de colissimo" width="15%">
                <p class="mid-text"> Livraison à domicile + frais supplémentaires </p>
            </div>
            <div class="line-right">
                <div class="save-box2" id="check-box2" onclick="SetClickedBox(this.id, 0)"> </div>
            </div>
        </div>
        
        <form action="panier4.php" id="form-livraison" method="POST">
            <input type="hidden" name="DataPanier" id="DataPanier" value="<?php print_r($IDPanier); ?>">
            <input type="hidden" name="DataLivraison" id="DataLivraison" value="<?php echo $IDLivraison; ?>">    
            <input type="hidden" name ="data2" id="data2" value="">
            <div class="save-box" id="save-config-btn">
                <input class="bouton_continuer" type="submit" value="Valider" onclick="BeforeNextPage()">
                <input type="hidden" name="Data" value="<?php print_r($_POST["Data"]);?>" id="Data">
            </div>
        </form>

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
    
    <script src="../script/index.js"></script>
    <script src="../script/panier3.js"></script>

</body>
</html>