<?php

$path = ".";
$pass['title'] = "OpenShop - Open Source Shop";
$pass['desc'] = "An open source shop to make selling and buying goods simple and convenient.";
$page = "sample_admin";

require_once "models/main.php";

require "${path}/vendor/autoload.php";
require "${path}/secure/config.php";

use Twilio\Rest\Client;

if (isset($_GET['ship'])) {
    $order = Order_getWaitingInfo($_GET['ship']);
    if (!$order['ship']) {
        Order_updateShipping(1, $_GET['ship']);
        $twilio_number = "+16473606201";

        $client = new Client($twilo[0], $twilo[1]);
        try {
            $client->messages->create(
                // Where to send a text message (your cell phone?)
                '+1' . $order['phone'],
                array(
                    'from' => $twilio_number,
                    'body' => 'Your order has been shipped, plan to see it in a few days at your door ;)'
                )
            );
        } catch (Exception $e) {}
    }
}

$pass['orders'] = Orders_getOrders();

require_once "models/render.php";

?>