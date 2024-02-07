<?php
include 'database.php'; 

$A = $_POST["Alphanumerique"];
$OS = $_POST["OS"];

$q = $db->prepare("UPDATE Customs SET langue=:a, OS=:os WHERE IDCustom=:ID");
$q->execute([
    'ID' => $_POST["IDCustom"],
    'a' => $A,
    'os' => $OS
]);

echo "<script>window.close()</script>"
?>