<?php

$path = ".";
$pass['title'] = "OpenShop - Tracking Order";
$pass['desc'] = "Track the status of your current order!";
$page = "tracking";

require_once "models/main.php";

$pass['tracking'] = false;
$pass['failed'] = false;

$pass['order'] = Order_getOrder($_GET['order'] ?? false);
if (($_GET['order'] ?? false) && $pass['order'])
    $pass['tracking'] = true;
elseif (($_GET['order'] ?? false) && !$pass['order'])
    $pass['failed'] = true;

require_once "models/render.php";

?>