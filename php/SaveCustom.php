<?php 
include 'database.php';

$BackplateColor = $_POST["backplate-color"];
$KeycapsColor = $_POST["keycaps-color"];
$IDCustom = $_POST["IDCustom"];

$qc = $db->prepare("UPDATE Customs SET BackplateColor=:BackplateColor, KeycapColor=:KeycapColor WHERE IDCustom=:IDCustom");
$qc ->execute([
    "IDCustom"=> $IDCustom,
    "BackplateColor"=> $BackplateColor,
    "KeycapColor"=> $KeycapsColor
]);

echo '<script>window.close()</script>'
?>