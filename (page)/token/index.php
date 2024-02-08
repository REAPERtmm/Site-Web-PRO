<?php

if (isset($_GET['token']) || !empty($_GET['token'])){
    include '../../php/database.php';
    global $db;
    
    $mail = $_GET['mail'];

    $Check = $db->query("SELECT Count(*) FROM Users WHERE Email='$mail'");
    $Check = $Check->fetch();

    if ($Check) {
    ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Récupération du mot de passe</title>
        </head>
        <body>
            <form method="POST">
                <label for="newPassword">Nouveau mot de passe :</label>
                <input type="password" name="newPassword">
                <input type="submit" value="Confirmer">
            </form>
        </body>
        </html>

    <?php
    }
}

if (isset($_POST['newPassword'])) {
   
    $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

    $sql = $db->query("UPDATE Users SET Mdp='$hashedPassword' WHERE Email='$mail'");

    echo "Mot de passe modifié avec succès !";
    echo '<script>window.close()</script>';
    sleep(1);
}

?>