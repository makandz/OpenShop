<?php

$path = ".";
$pass['title'] = "OpenShop - Cart";
$pass['desc'] = "What's currently in your cart?";
$page = "cart";

require_once "models/main.php";

if (isset($_POST)) {
    $cart = $_SESSION['cart'] ?? [];
    $cart[] = [$_POST['id'], $_POST['amount']];
    $_SESSION['cart'] = $cart;
    $pass['cart_count'] = count($_SESSION['cart']);
}

require_once "models/render.php";

?>