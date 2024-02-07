<?php

//   if (isset($_POST['envoie'])) {
    
//     $token = uniqid();
//     $MAIL = $_POST['email'];
//     $url = "https://destiny-2-4life.alwaysdata.net/pages/token?token=$token&mail=$MAIL";
    
//     include 'database.php';
//     global $db;

//     $hashedPassword = password_hash($token, PASSWORD_DEFAULT);

//     $sql = $db->prepare("UPDATE UserAccounts SET Mdp=:mdp WHERE Mail=:mail");
//     $sql->execute([
//         'mdp' => $hashedPassword,
//         'mail' => $MAIL,
//     ]);

//     $to = $_POST['email'];
//     $subject = "RESET Password";
//     $message = "Bonjour, Voici votre lien pour la réinitialisation du mot de passe : $url";

//     // En-têtes pour spécifier le format de l'e-mail
//     $headers = "MIME-Version: 1.0" . "\r\n";
//     $headers .= "Content-Transfer-Encoding: 8bit" . "\r\n";
//     $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";

//     if (mail($to, $subject, $message, $headers)) {
//         echo "<p style='color: green'>L'e-mail a été envoyé avec succès.</p>";
//         header("Location: ../pages/login.php#");
//         sleep(1);
//     } else {
//         echo "<p style='color: red'>Erreur lors de l'envoi de l'e-mail.</p>";
//     }
//   }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
</head>
<body>
    

    <form action="" method="POST">
        <h3 class="form-title">Récupération du mot de passe</h3>
        <div class="form-content">
            <div>
                <label for="email">Email</label>
                <input type="email" name="login-email" placeholder="Email" id="email" required>
            </div>
            
            <div>
                <label for="date">Date de naissance</label>
                <input type="date" name="date" id="date" required>
            </div>

            <input name="FormsentLogin" class="button" type="submit" value="Connexion"/>
        </div>
    </form>


</body>
</html>

<?php
    if (isset($_POST['FormsentLogin'])) {
        
        if (condition) {
            # code...
        }
    }

?>