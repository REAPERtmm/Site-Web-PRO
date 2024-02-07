<?php

require '../vendor/autoload.php';

// $prix = $_POST['Data'];
$prix = 2999;

$stripe_secret_key = "sk_test_51Oh0CYAM1e9hGOmlQ5Dn28i31c2ZynxclLV63T4ONYU9Kj1a8LDxPjn7MbbnMXmZbj1Gaq879TCwhenp4RM9fN9S00mNOwPML8";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost:80/(page)/success.html",
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