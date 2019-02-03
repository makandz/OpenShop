<?php

$path = "..";
$pass['title'] = "OpenShop - Order Success!";
$pass['desc'] = "Your order has been a success.";
$page = "secure/success";

require "${path}/vendor/autoload.php";
require "${path}/secure/config.php";

use Twilio\Rest\Client;

require_once "${path}/models/main.php";

$order = $_SESSION["user"] ?? false;
if (!$order) {
    echo "shoot, something went wrong.";
    die();
}

// A Twilio number you own with SMS capabilities
$twilio_number = "+16473606201";

$client = new Client($twilo[0], $twilo[1]);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+1' . $order['phone'],
    array(
        'from' => $twilio_number,
        'body' => 'Your order has been confirmed, it will be shipped shortly.'
    )
);

$pass['products'] = Orders_addOrder($order['first'], $order['last'], $order['email'], $order['phone']);

require_once "${path}/models/render.php";

?>