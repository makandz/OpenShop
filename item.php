<?php

$path = ".";
$pass['title'] = "OpenShop - View a Product";
$pass['desc'] = "View product information on OpenShop, the open source shop.";
$page = "item";

require_once "models/main.php";

$pass['product'] = Products_getProductInfo($_GET['id'] ?? false);
if ($pass['product']['quantity'] == -1) $pass['product']['quantity'] = 100;

if (!$pass['product']) {
    echo "<h1>Item no longer exists</h1><p>Return to <a href='${path}/index.php'>home</a></p>";
    die();
}

require_once "models/render.php";

?>