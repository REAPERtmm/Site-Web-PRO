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
    <link rel="stylesheet" href="../styles/favorite.css">
    <?php 
        include '../php/database.php'; 
        require("../php/config.php");
        if(!isset($_SESSION['user']['IDUser'])){$_SESSION['user']['IDUser'] = 1;}

        $q_fav = $db->prepare('SELECT * FROM (Favoris INNER JOIN  Produit ON Favoris.IDProduit = Produit.IDProduit)  WHERE Favoris.IDUser = 1');
        $q_fav->execute([
            //"ID" => $_SESSION['user']['IDUser']
        ]);
        $result = $q_fav->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $IDProduit = $row["IDProduit"];
            $IDUser = $row["IDUser"];
        }
        


        

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

    <div class="div1" id="">
        <h1 class="text_3" id="">Étape 1 : favoris</h1>
        <h1 class="étape" id="">2</h1>
        <h1 class="étape" id="">3</h1>
        <h1 class="étape" id="">4</h1>
        <h1 class="étape" id="">5</h1>
    </div>
    <div class="div2" id="">
        <h1 class="produit" id="">Produit</h1>
        <h1></h1>
        <h1 class="produit" id="">Sélectionner</h1>
        <h1 class="prix" id="">Prix</h1>
        <h1 class="quant" id="">Quantité</h1>
        <h1></h1>
        
        <?php 
            $i = 0;
            foreach($result as $row){
                echo '<img class="img_pr" src="../Assets/'. $row["ImgPath"] .'" alt="image du produit"  id="i-'.$i.'">';
                echo '<h1 class="nom_pr" id="n-'.$i.'">' . $row["Nom"]. '</h1>';
                echo '<button class="FavBtn" onclick="SelecFav('.$i.')" id="b-'.$i.'">  </button>';
                echo '<p class="prix_pr" id="p-'.$i.'">' . $row["Prix"] . '€</p>';
                echo '<input type="number" name="quant_pr" class="quant_pr" id="q-'.$i.'" value="1" readonly>';
                echo '<input type="hidden"  id="id-'.$i.'" value="'.$row["IDProduit"].'" readonly>';
                echo '  <div class="btn-div"  id="d-'.$i.'">
                            <button class="bouton_modifier" onclick="ModifyRow('.$i.')"><img class="modifier" src="https://icones.pro/wp-content/uploads/2022/07/icone-crayon-bleu.png" height="100%"></button>
                            <button class="delet" onclick="DeleteRow('.$i.')">supprimer</button>
                        </div>';
                    $i++;
                    }
        
        ?>
    </div>
    <div class="div3" id="">
        <div class="sd3-1" id="">

        </div>
        <div class="sd3-2" id="">
            <h1 class="text_2" id="">Sous-total :</h1>
            <h1 class="" id="Total"><?php $total = 0; foreach($result as $row){$total += floatval($row["Prix"]);} echo $total; echo '€'; ?></h1>
        </div>
    </div>
    <div class="div4" id="">

        <form action="../php/update_fav.php" target="_blank" method="post" class="sd4-2" id="form-next">
            <input class="bouton_continuer" type="submit" value="Transférer dans le panier">
            <input type="hidden" name="Amount" value="" id="Amount">
            <input type="hidden" name="IDProduit" value="" id="IDProduit">
            <input type="hidden" name="Data" value="" id="Data-0">
            <input type="hidden" name="ArticlesAmount" id="Panier" value="<?php echo count($result); ?>">
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
    
    <script src="../script/favorite.js"></script>
    <script src="../script/index.js"></script>
</body>
</html>