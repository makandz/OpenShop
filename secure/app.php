<?php

require 'vendor/autoload.php';
$paypal = new \PayPal\Rest\ApiContext(new \PayPal\Auth\OAuthTokenCredential($paypal_config[0], $paypal_config[1]));
// $paypal->setConfig(
//     array(
//         'mode' => 'live'
//     )
// );

?>