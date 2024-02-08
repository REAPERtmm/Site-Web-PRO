<?php
if (isset($_POST['token'])) {
    $token = $_POST['token'];
}else{
    $token = uniqid();
}

// En-têtes pour spécifier le format de l'e-mail
$headers2 = "MIME-Version: 1.0" . "\r\n";
$headers2 .= "Content-Transfer-Encoding: 8bit" . "\r\n";
$headers2 .= "Content-type: text/html; charset=utf-8" . "\r\n";
if (mail($_POST['email'], "Code de vérification", "Vôtre code de vérification est : " . $token, $headers2)) {
    echo "<p style='color: green'>Vous avez reçu un mail de vérification.</p>";
    echo "<form method='POST' action=''>";
    echo "<label class='form-label' for='code'>Entrer de code de vérification</label>";
    echo "<input class='form-input' type='text' name='code' id='code' required />";
    // MARABOO
    echo "<input type='hidden' name='email' value='".$_POST['email']."' />";
    echo "<input type='hidden' name='adresse' value='".$_POST['adresse']."' />";
    echo "<input type='hidden' name='pays' value='".$_POST['pays']."' />";
    echo "<input type='hidden' name='tel' value='".$_POST['tel']."' />";
    echo "<input type='hidden' name='subject' value='".$_POST['subject']."' />";
    echo "<input type='hidden' name='Message' value='".$_POST['Message']."' />";
    echo "<input type='hidden' name='nom' value='".$_POST['nom']."' />";
    echo "<input type='hidden' name='token' value='".$token."' />";
    
    echo '<input class="form-submit" type="submit" value="Vérifier" name="formsent">';
    echo "</form>";

    if (isset($_POST['code'])) {
        if ($_POST['code'] == $token) {
            echo "<p style='color: green'>Code de vérification correct.</p>";
            
            $to = "snowstorm@alwaysdata.net";
            $subject = $_POST['subject'];
            $message = "<div style='width: 100%; text-align: center'>" . $_POST['nom'] . "<br>" . $_POST['email'] . "<br>" . $_POST['adresse'] . ", " . $_POST['pays'] . "<br>" . $_POST['tel'] . "\r\n" . "<br>" . $_POST['Message'] . "</div>";

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
                echo "<p style='color: green'>L'e-mail a été envoyé avec succès.</p>";
                // header("Location: ../index.php");
            } else {
                echo "<p style='color: red'>Erreur lors de l'envoi de l'e-mail.</p>";
            }
        } else {
            echo "<p style='color: red'>Code de vérification incorrect. \nUn nouveau code vous a été envoyer.</p>";
        }
    }
};
