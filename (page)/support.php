<?php 
require '../php/config.php';
include '../php/database.php';
global $db;

?>

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
    <link rel="stylesheet" href="../styles/support.css">
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
                        <a href="./support.php">SUPPORT/SAV</a>
                        <a href="#">FAQ</a>
                        <a href="./page contact.html">CONTACT</a>
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

    <div class="container">
        <h1>Envoyer un mail au SAV</h1>

        <form class="form-container" method="POST" action="" >
            <div class="">
                <label class="form-label" for="nom">Nom</label>
                <input class="form-input" type="text" name="nom" id="nom" required />
            </div>
            
            <div class="">
                <label class="form-label" for="pays">Pays</label>
                <input class="form-input" type="text" name="pays" id="pays" required />
            </div>

            <div class="">
                <label class="form-label" for="adresse">Adresse</label>
                <input class="form-input" type="text" name="adresse" id="adresse" required />
            </div>

            <div class="">
                <label class="form-label" for="email">Email</label>
                <input class="form-input" type="email" name="email" id="email" required />
            </div>

            <div class="">
                <label class="form-label" for="tel">Téléphone</label>
                <input class="form-input" type="tel" name="tel" id="tel" required />
            </div>
            
            <div class="">
                <label class="form-label" for="subject">Subject</label>
                <input class="form-input" type="text" name="subject" id="subject" required />
            </div>
            
            <div class="">
                <label class="form-label" for="Message">Message</label>
                <textarea class="form-textarea" id="Message" name="Message" required></textarea>
            </div>

            <button class="form-submit">Envoyer</button>
        </form>

        <?php
        if (isset($_POST['formsent'])) {

            $to = "snowstorm@alwaysdata.net";
            $subject = $_POST['subject'];
            $message = "<div style='width: 100%; text-align: center'>" . $_POST['nom'] . "<br>" . $_POST['email'] . "<br>" . $_POST['adresse'] . ", " . $_POST['pays'] . "<br>" . $_POST['tel'] . "\r\n" . $_POST['Message'] . "</div>";
            // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
            $message = wordwrap($message, 70, "\r\n");
            
            // En-têtes pour spécifier le format de l'e-mail
            $headers = "From: " . $_POST['email'] . "\r\n";
            $headers .= "Reply-To: " . $_POST['email'] . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Transfer-Encoding: 8bit" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            // Envoyer l'e-mail
            ini_set('SMTP','smtp-snowstorm.alwaysdata.net');
            $mailSent = mail($to, $subject, $message, $headers);

            // Vérifier si l'e-mail a été envoyé avec succès
            if ($mailSent) {
                echo "<p style='color: red'>L'e-mail a été envoyé avec succès.</p>";
            } else {
                echo "<p style='color: red'>Erreur lors de l'envoi de l'e-mail.</p>";
            }
            $mmm = $_POST['email'];
            header("Location: ./verif.php?email=$mmm");
            exit();
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

</body>
</html>
