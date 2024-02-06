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
    <link rel="stylesheet" href="../styles/comparateur.css">
</head>
<body>
<?php  
    include("../php/database.php");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    
    if (isset($_POST['IDProduct']))
        {
            $IDProduit = $_POST['IDProduct'];
        }
    else
        {
            echo "Aucune donnée";
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
                    <a href="index.html">SUPPORT/SAV</a>
                    <a href="index.html">FAQ</a>
                    <a href="index.html">CONTACT</a>
                </div>
                <div class="navbar_search">
                    <form action="" class="search">
                        <input type="text" placeholder="Rechercher un produit">
                    </form>
                </div>
            </div>
        </div>
    </header>
    
    
<h1>comparateur</h1>

<div>
    <img class="img_pr" src="../Assets/Clavier1.webp" alt=""  /> 
    <img class="img_pr"src="../Assets/Clavier2.webp" alt=""  />
    <img class="img_pr"src="../Assets/Clavier3.jpg" alt="" />
   </div>
   <div>

   </div>

    <footer class="footer">
        <div class="footer-container unselectable">
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