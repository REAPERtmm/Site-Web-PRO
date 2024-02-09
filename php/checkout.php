<?php
require '../php/database.php';
require '../vendor/autoload.php';


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

$prix = $_POST['Data'];
$prix = floatval($prix) * 100;

$stripe_secret_key = "sk_test_51Oh0CYAM1e9hGOmlQ5Dn28i31c2ZynxclLV63T4ONYU9Kj1a8LDxPjn7MbbnMXmZbj1Gaq879TCwhenp4RM9fN9S00mNOwPML8";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "https://snowstorm.alwaysdata.net/(page)/success.php",
    'line_items' => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "eur",
                "unit_amount" => $prix,
                "product_data" => [
                    "name" => "Produits",
                ]
            ]
        ]
    ]
]);

http_response_code(303);
header('location: ' . $checkout_session->url);

?>
