<?php

$path = ".";
$pass['title'] = "OpenShop - Cart";
$pass['desc'] = "What's currently in your cart?";
$page = "cart";

require_once "models/main.php";

if (isset($_POST['delete'])) {
    $cart = $_SESSION['cart'] ?? [];
    if (isset($cart[$_POST['delete']]))
        unset($cart[$_POST['delete']]);
    $_SESSION['cart'] = $cart;
}

if (isset($_POST['id'])) {
    $cart = $_SESSION['cart'] ?? [];
    if (isset($cart[$_POST['id']]))
        $cart[$_POST['id']] += intval($_POST['amount']);
    else $cart[$_POST['id']] = intval($_POST['amount']);
    $_SESSION['cart'] = $cart;
    $pass['cart_count'] = count($_SESSION['cart']);
}

$cart = $_SESSION['cart'] ?? [];
$cart_items = [];
$total = 0;
foreach ($cart as $key => $a) {
    $temp = Products_getProductInfo($key);
    if ($a <= $temp['quantity'] || $temp['quantity'] == -1) {
        $temp['quantity'] = $a;
        $total += round($a * ($temp['price'] / 100), 2);
        $cart_items[] = $temp;
    } else {
        unset($cart[$key]);
        $_SESSION['cart'] = $cart;
    }
}

$pass['total'] = $total;
$pass['cart'] = $cart_items;

require_once "models/render.php";

?>