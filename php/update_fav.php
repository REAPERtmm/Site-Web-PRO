<?php

    include ('../php/database.php'); 
    require("../php/config.php");

     //$IDUser = $_SESSION["user"]["IDUser"];
     $IDUser = 1;

    $check = $db->prepare('SELECT * FROM Paniers WHERE IDUser = :IDUser AND IDProduit = :IDProduit');
    $check->execute([
        'IDUser'=> $IDUser,
        'IDProduit' => $_POST["IDProduit"]
    ]);
    if($check->rowCount() == 0) {
        $query = $db->prepare('INSERT INTO Paniers VALUES(:IDUser, 0,NULL,:IDProduit,NULL,:Amount,0)');
        $query->execute([
            "IDUser" => $IDUser,
            "IDProduit" => $_POST["IDProduit"],
            "Amount" => $_POST["Amount"],
        ]);
    } else {
        $checkf = $check->fetch();
        $query2 = $db->prepare("UPDATE Paniers SET Amount = :Amount WHERE IDProduit = :IDProduit AND IDUser = :IDUser");
        $query2->execute([
            "Amount"=> $checkf["Amount"] + $_POST["Amount"],
            "IDProduit" => $_POST["IDProduit"],
            "IDUser"=> $IDUser,
        ]);
    }

    echo '<script>window.close()</script>';