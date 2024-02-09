<?php 
include '../php/database.php';
global $db;

header("Cache-Control: no-cache");


if (!empty($_POST['credential'])) {

    if (
        empty($_COOKIE['g_csrf_token']) || empty($_POST['g_csrf_token']) || $_COOKIE['g_csrf_token'] != $_POST['g_csrf_token']
    ) {
        echo 'Invalid CSRF token';
        exit();
    }

    $clientId = "463202083643-85r6bih9kcvt7en94rnmbdh52s4jagnb.apps.googleusercontent.com";
    $client = new Google_Client(['client_id' => $clientId]);  // Specify the CLIENT_ID of the app that accesses the backend
    
    $idToken = $_POST['credential'];
    $user = $client->verifyIdToken($idToken);

    if ($user) {
        $_SESSION['user'] = $user;
        
        $Mail = $user['email'];
        $Check = $db->query("SELECT Count(*) FROM Users WHERE Email='$Mail'"); $Check = $Check->fetch(); 
        if ($Check[0] == 0) {
            header("Location: ./googlelogin.php");
            exit();
        }else {
            $IDCLIENT =  $db->query("SELECT IDUser FROM Users WHERE Email='$Mail'"); 
            $IDCLIENT = $IDCLIENT->fetch(); 
            $_SESSION['user'] = array('email' => $Mail, 'IDUser' => $IDCLIENT[0]);
            header("Location: ./profil.php");
            exit();
        }

    } else {
        // Invalid ID token
        echo "Erreur lors de l'authentification";
    }

}

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
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>

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
                    <a href="./Search.php">NOS PRODUITS</a>
                    <a href="./personnaliser.php">PERSONNALISER</a>
                    <a href="./SearchCustom.php">GALERIE</a>
                    <a href="./support.php">SUPPORT/SAV</a>
                    <a href="#">FAQ</a>
                    <a href="./page-contact.html">CONTACT</a>
                </div>
                <div class="navbar_search">
                    <form action="" class="search">
                        <input type="text" placeholder="Rechercher un produit">
                        <?php if(isset($_GET['research'])){header("Location: ./Search.php?research=".$_GET['research']);}?>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <?php 
    if (isset($_POST['FormsentLogin'])){
        $Mail = $_POST['login-email']; 
        $Password = $_POST['login-password']; 
        $mdp = $db->query("SELECT Mdp FROM Users WHERE Email='$Mail'");
        $mdp = $mdp->fetch();
        if (empty($mdp)) {
            echo '<div style="color: red; margin-top: 2rem">Adresse mail ou mot de passe invalide !</div>';
        } else {
            $PasswordVerify = password_verify($Password, $mdp[0]);
            if ($PasswordVerify) {
                $IDCLIENT =  $db->query("SELECT IDUser FROM Users WHERE Email='$Mail'"); 
                $IDCLIENT = $IDCLIENT->fetch(); 
                $_SESSION['user'] = array('email' => $Mail, 'IDUser' => $IDCLIENT[0]); 
                header("Location: ./profil.php"); 
                exit();
            }else {
                echo '<div style="color: red; margin-top: 2rem">Adresse mail ou mot de passe invalide !</div>';
            }
        }
    }
    
    if (isset($_POST['FormsentRegister'])){
        $Mail = $_POST['register-email']; 
        $Password = $_POST['register-password']; 
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
        $Nom = $_POST['register-nom']; 
        $Prenom = $_POST['register-prenom']; 
        $DateNaissance = $_POST['register-date']; 
        $Check = $db->query("SELECT Count(*) FROM Users WHERE Email='$Mail'"); 
        $Check = $Check->fetch(); 
        if ($Check[0] == 1) {
            echo '<div style="color: red; margin-top: 2rem">Adresse mail déjâ utilisé !</div>';
        }else {
            $Request = $db->query("INSERT INTO Users(IDUser, Email, Mdp, Nom, Prenom, DateNaissance) VALUE(0, '$Mail', '$hashedPassword', '$Nom', '$Prenom', '$DateNaissance')"); 
            $IDCLIENT =  $db->query("SELECT IDUser FROM Users WHERE Email='$Mail'"); 
            $IDCLIENT = $IDCLIENT->fetch(); 
            $_SESSION['user'] = array('email' => $Mail, 'IDUser' => $IDCLIENT[0]); 
            header("Location: ./profil.php");
        }
    } 
    ?>

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
                <div>
                    <a class="forgot-mdp" href="./tokendrag.php">Mot de passe oublié</a>
                </div>
            </div>
            <div class="form-submit">
                <div id="g_id_onload"
                    data-client_id="463202083643-85r6bih9kcvt7en94rnmbdh52s4jagnb.apps.googleusercontent.com"
                    data-context="signin"
                    data-ux_mode="popup"
                    data-login_uri="https://snowstorm.alwaysdata.net/(page)/login.php"
                    data-auto_prompt="false">
                </div>
                <div class="g_id_signin"
                    data-type="standard"
                    data-shape="rectangular"
                    data-theme="filled_blue"
                    data-text="signin"
                    data-size="large"
                    data-logo_alignment="left">
                </div>

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
                <div id="g_id_onload"
                    data-client_id="463202083643-85r6bih9kcvt7en94rnmbdh52s4jagnb.apps.googleusercontent.com"
                    data-context="signin"
                    data-ux_mode="popup"
                    data-login_uri="https://snowstorm.alwaysdata.net/(page)/login.php"
                    data-auto_prompt="false">
                </div>
                <div class="g_id_signin"
                    data-type="standard"
                    data-shape="rectangular"
                    data-theme="filled_blue"
                    data-text="signin"
                    data-size="large"
                    data-logo_alignment="left">
                </div>

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
    <script src="https://accounts.google.com/gsi/client" async></script>

</body>
</html>
