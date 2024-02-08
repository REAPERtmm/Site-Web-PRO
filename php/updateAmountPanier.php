<?php

include 'database.php';

for($i = 0 ; $i < $_POST["ArticlesAmount"] ; $i++){
    $row = explode("-", $_POST["article-".$i]);
    print_r($row);

    $q = $db->prepare("UPDATE Paniers SET Amount=:new WHERE IDPanier=:ID");
    $q->execute(["new" => $row[1], "ID" => $row[0]]);
}


echo "<script>window.close()</script>"
?>