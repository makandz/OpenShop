<?php

$path = ".";
$pass['title'] = "OpenShop - Open Source Shop";
$pass['desc'] = "An open source shop to make selling and buying goods simple and convenient.";
$page = "index";

require_once "models/main.php";

$pass['products'] = Product_getProducts();

require_once "models/render.php";

?>