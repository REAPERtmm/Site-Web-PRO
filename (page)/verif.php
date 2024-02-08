<?php
$token = uniqid();
// En-têtes pour spécifier le format de l'e-mail
$headers2 = "MIME-Version: 1.0" . "\r\n";
$headers2 .= "Content-Transfer-Encoding: 8bit" . "\r\n";
$headers2 .= "Content-type: text/html; charset=utf-8" . "\r\n";
if (mail($_GET['email'], "Code de vérification", "Vôtre code de vérification est : " . $token, $headers2)) {
    echo "<p style='color: green'>Vous avez reçu un mail de vérification.</p>";
    echo "<form method='POST' action='../index.php'>";
    echo "<label class='form-label' for='code'>Entrer de code de vérification</label>";
    echo "<input class='form-input' type='text' name='code' id='code' required />";
    echo "<button class='form-submit'>Vérifier</button>";
    echo "</form>";

    if (isset($_POST['code'])) {
        if ($_POST['code'] == $token) {
            echo "<p style='color: green'>Code de vérification correct.</p>";
        } else {
            echo "<p style='color: red'>Code de vérification incorrect.</p>";
        }
    }
};