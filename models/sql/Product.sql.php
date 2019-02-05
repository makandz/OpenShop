<?php

/* Product SQL */

function Product_getProducts() {
    $query = "SELECT id, name, description, quantity, image, price
        FROM products";
    $exec = new SQL($query, []);
    return $exec->Execute(false, true);
}

function Orders_getOrders() {
    $query = "SELECT id, first, last, phone, token, ship
        FROM orders";
    $exec = new SQL($query, []);
    return $exec->Execute(false, true);
}

function Order_getOrder(string $token) {
    $query = "SELECT id, first, last, ship
        FROM orders
        WHERE token = ?
        LIMIT 1";
    $exec = new SQL($query, [$token]);
    return $exec->Execute(false);
}

function Products_getProductInfo(int $productId) {
    $query = "SELECT id, name, description, quantity, image, price
        FROM products
        WHERE id = ?
        LIMIT 1";
    $exec = new SQL($query, [$productId]);
    return $exec->Execute(false);
}

function Order_getWaitingInfo(int $orderId) {
    $query = "SELECT ship, phone
        FROM orders
        WHERE id = ?
        LIMIT 1";
    $exec = new SQL($query, [$orderId]);
    return $exec->Execute(false);
}

function Orders_addOrder(string $first, string $last, string $email, string $phone, string $token) {
    $query = "INSERT INTO orders (id, first, last, email, phone, token, ship) 
    VALUES (NULL, ?, ?, ?, ?, ?, 0);";
    $exec = new SQL($query, [$first, $last, $email, $phone, $token]);
    return $exec->Execute(true);
}

function Products_updateQuantity(int $productId, int $incamount) {
    $query = "UPDATE products
    SET quantity = quantity + ?
    WHERE id = ? AND quantity != -1";
    $exec = new SQL($query, [$incamount, $productId]);
    return $exec->Execute(true);
}

function Order_updateShipping(int $shipping, int $orderId) {
    $query = "UPDATE orders
    SET ship = ?
    WHERE id = ?";
    $exec = new SQL($query, [$shipping, $orderId]);
    return $exec->Execute(true);
}

?>