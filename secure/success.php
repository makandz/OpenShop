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
if (!$order && $_GET['token']) {
    echo "shoot, something went wrong.";
    die();
}

$twilio_number = "+16473606201";

$client = new Client($twilo[0], $twilo[1]);
try {
    $client->messages->create(
        // Where to send a text message (your cell phone?)
        '+1' . $order['phone'],
        array(
            'from' => $twilio_number,
            'body' => 'Your order has been confirmed, it will be shipped shortly.'
        )
    );
} catch (Exception $e) {}

Orders_addOrder($order['first'], $order['last'], $order['email'], $order['phone'], $_GET['token']);
$pass['order_number'] = $_GET['token'];
$pass['user'] = $order;
$pass['total'] = $_SESSION['total'];

foreach ($_SESSION['cart'] ?? [] as $key => $a) {
    Products_updateQuantity($key, $a * -1);
}

require_once "${path}/models/render.php";

session_destroy();

?>