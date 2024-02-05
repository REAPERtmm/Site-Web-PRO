<?php 
require '../php/config.php';

$user = $_SESSION['user'];
print_r($user);
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

    <section>
        <form action="" method="POST">
            <h3 class="form-title">Formulaire d'inscription</h3>
            <div class="form-content">
                <div>
                    <label for="register-Email">Email</label>
                    <input type="email" name="register-email" value="<?php print_r($user['email'])?>" id="register-Email" required disabled>
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
                <input name="FormsentRegister" class="button" id="FormsentRegisterSubmit" type="submit" value="Valider"/>
            </div>
        </form>
    </section>

    <script src="../script/app.js"></script>
    <script src="../script/login.js"></script>
    <script src="https://accounts.google.com/gsi/client" async></script>

</body>
</html>
