<?php

require("../php/database.php");
require("../php/config.php");

$IDPanier = $_POST['DataPanier'];
$test = explode(' ', $IDPanier);
$size = sizeof($test);

// print_r($test[6][0]);
// $testt = $test[6];
// print($testt);
// $testtt = $test[12];
// $testttt = explode(')', $testtt);
// print($testttt[0]);



for ($i = 6; $i < $size; $i+=6) {

    $q = $db->prepare("UPDATE Paniers SET IsBought= 1 WHERE IDPanier=:IDPanier");
    $q->execute([
        "IDPanier"=> $test[$i][0],
    ]);
}   

echo '<script>window.close()</script>';