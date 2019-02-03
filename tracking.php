<?php

$path = ".";
$pass['title'] = "OpenShop - Tracking Order";
$pass['desc'] = "Track the status of your current order!";
$page = "tracking";

require_once "models/main.php";

$pass['tracking'] = false;
$pass['failed'] = false;

$pass['order'] = Order_getOrder($_GET['order'] ?? false);
if (!$pass['order'] && ($_GET['order'] ?? false))
    $pass['failed'] = true;
else if ($_GET['order'] ?? false) {
    $pass['tracking'] = true;
}

require_once "models/render.php";

?>