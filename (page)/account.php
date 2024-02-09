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
    <link rel="stylesheet" href="../styles/account.css">
</head>
<?php 
    require("../php/database.php");
    require("../php/config.php");
    require("../php/forceconnect.php");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    $IDUser = $_SESSION["user"]["IDUser"];

    $q = $db->prepare("SELECT * FROM Users WHERE IDUser =:IDUser");
    $q->execute([
        "IDUser" => $IDUser
    ]);
    $qf = $q->fetch();



    $Emaile = $qf["Email"];
    $Password = password_hash($qf["Mdp"], PASSWORD_DEFAULT);


    if(isset($_POST["emaile"])) {
        $Emaile = $_POST["emaile"];
    }


    if(isset($_POST["password"])) {
        $Password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }

    $qu = $db->prepare("UPDATE Users SET Email = :Email, Mdp = :Mdp WHERE IDUser = :IDUser");
    $qu->execute([
        "Email"=> trim($Emaile),
        "Mdp"=> $Password,
        "IDUser"=> $IDUser
    ]);

?>
<body>

    
<header class="unselectable">
        <div class="header">
            <div class="header-grp">
                <div class="header_top">
                    <div class="logo">
                        <img src="../Assets/logo-removebg-preview.png" alt="Logo" class="logo-img">
                        <p class="logo-name">SNOWSTORM.GG</p>
                    </div>
                    <div class="logo">
                        <a href="../(page)/Search.html"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                        <a href="../(page)/login.php"><i class="fa-solid fa-user fa-beat"></i></a>
                        <img src="../Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                    </div>
                </div>

                <div class="header_bot">
                    <div class="navbar_link">
                        <a href="../index.php">ACCUEIL </a>
                        <a href="./historique.php">HISTORIQUE</a>
                        <a href="./favorite.php">FAVORIS</a>
                        <a href="./personnaliser.php">SAUVEGARDES</a>
                        <a href="./account.php">COMPTE</a>
                    </div>
                    <div class="navbar_search">
                        <form action="" class="search">
                            <input type="search" placeholder="Rechercher un produit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>

    <p class="title"> Espace client </p>
    <div class="info-modif">
        <form action="account.php" method="POST">
            <label for="">E-mail</label>
            <input name="emaile" type="text" value="<?php echo trim($Emaile);?>" required>
            <label for="">Mot de passe</label>
            <input name="password" type="password" value="">
            <input type="submit" value="Sauvegarder les modifications" name="edit-info-submit">
        </form>
    </div>
    <div class="newsletter">
        <p class="subtitle"> Envie d'être au courant des dernières collections ?  </p>
        <p class="subtitle"> Inscrivez vous à la newsletter pour être à jour dans les actus !</p>
        <form action="account.php" method="POST">
            <input type="submit" value="S'inscrire par mail" name="newsletter-submit">
        </form>
        <?php 
            if(isset($_POST["newsletter-submit"])) {
                $qn = $db->prepare("UPDATE Users SET Newsletter = 1 WHERE IDUser = :IDUser");
                $qn->execute([
                    "IDUser"=> $IDUser
                ]);
                echo 'Vous avez été inscrit avec succès !';
            }
        
        
        ?>
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
    
    <script src="../script/app.js"></script>
    <script src="../script/index.js"></script>
</body>
</html>



