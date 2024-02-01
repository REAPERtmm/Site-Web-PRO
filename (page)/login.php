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
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    
    <?php if (isset($_POST['FormsentLogin'])){include '../php/database.php'; global $db; $Mail = $_POST['login-email']; $Password = $_POST['login-password']; $Request = $db->query("SELECT Count(*) FROM Users WHERE Email='$Mail' AND Mdp='$Password'"); $Request = $Request->fetch(); if ($Request[0] == 1) {header("Location: ../index.html");}else {echo '<div style="color: red; margin-top: 2rem">Pseudo ou mot de passe invalide !</div>';}} 
    if (isset($_POST['FormsentRegister'])){include '../php/database.php'; global $db; $Mail = $_POST['register-email']; $Password = $_POST['register-password']; $Password_verified = $_POST['register-password-verified']; $Nom = $_POST['register-nom']; $Prenom = $_POST['register-prenom']; $DateNaissance = $_POST['register-date']; $Check = $db->query("SELECT Count(*) FROM Users WHERE Email='$Mail'"); $Check = $Check->fetch(); if ($Check[0] == 1) {echo '<div style="color: red; margin-top: 2rem">Adresse email déjâ utilisé !</div>';}else {$Request = $db->query("INSERT INTO Users(IDUser, Email, Mdp, Nom, Prenom, DateNaissance) VALUE(0, '$Mail', '$Password', '$Nom', '$Prenom', '$DateNaissance')"); header("Location: ../index.html");}} ?>

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
                        <a href="../index.html">NOS PRODUITS</a>
                        <a href="../index.html">PERSONNALISER</a>
                        <a href="./Search.html">GALERIE</a>
                        <a href="../index.html">SUPPORT/SAV</a>
                        <a href="../index.html">FAQ</a>
                        <a href="../index.html">CONTACT</a>
                    </div>
                    <div class="navbar_search">
                        <form action="" class="search">
                            <input type="search" placeholder="Rechercher un produit" id="search">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>

    <section>
        <form action="" method="POST">
            <h3 class="form-title">Formulaire de connexion</h3>
            <div class="form-content">
                <div>
                    <label for="login-Email">Email</label>
                    <input type="email" name="login-email" placeholder="Email" id="login-Email" required>
                </div>
                <div>
                    <label for="login-password">Mot de passe</label>
                    <input type="password" name="login-password" placeholder="Password" id="login-password" required>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="toggle-register" name="toggle-register"/>
                    <label for="toggle-register">Se souvenir de moi</label>
                </div>
            </div>
            <div class="form-submit">
                <a class="social-btn" href=""><i class="fab fa-google"></i> Google</a>
                <input name="FormsentLogin" class="button" type="submit" value="Connexion"/>
            </div>
        </form>

        <form action="" method="POST">
            <h3 class="form-title">Formulaire d'inscription</h3>
            <div class="form-content">
                <div>
                    <label for="register-Email">Email</label>
                    <input type="email" name="register-email" placeholder="Email" id="register-Email" required>
                </div>
                <div>
                    <label for="register-password">Mot de passe</label>
                    <input type="password" name="register-password" placeholder="Password" id="register-password" required>
                </div>
                <div>
                    <label for="register-password-verified">Confirmer le mot de passe</label>
                    <input type="password" name="register-password-verified" placeholder="Password" id="register-password-verified" required>
                    <span id="error_msg"></span>
                </div>
                <div>
                    <label for="register-nom">Nom</label>
                    <input type="text" name="register-nom" placeholder="Nom" id="register-nom" required>
                </div>
                <div>
                    <label for="register-prenom">Prénom</label>
                    <input type="text" name="register-prenom" placeholder="Prenom" id="register-prenom" required>
                </div>
                <div>
                    <label for="register-date">Date de naissance</label>
                    <input type="date" name="register-date" id="register-date" required>
                </div>
            </div>
            <div class="form-submit">
                <a class="social-btn" href=""><i class="fab fa-google"></i> Google</a>
                <input name="FormsentRegister" class="button" id="FormsentRegisterSubmit" type="submit" value="Valider"/>
            </div>
        </form>
    </section>

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
    <script src="../script/login.js"></script>

</body>
</html>
