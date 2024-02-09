<?php

    include ('../php/database.php'); 
    require("../php/config.php");

     //$IDUser = $_SESSION["user"]["IDUser"];
     $IDUser = 1;

     $q = $db->prepare("DELETE FROM Favoris WHERE IDUser = :IDUser AND IDProduit = :IDProduit");
     $q->execute([
        "IDUser"=> $IDUser,
        "IDProduit"=> $_POST["IDProduit"],
     ]);

    echo '<script>window.close()</script>';