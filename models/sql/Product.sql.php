<?php

/* Product SQL */

function Product_getProducts() {
    $query = "SELECT id, name, description, quantity, image, price
        FROM products";
    $exec = new SQL($query, []);
    return $exec->Execute(false, true);
}

function Products_getProductInfo(int $productId) {
    $query = "SELECT id, name, description, quantity, image, price
        FROM products
        WHERE id = ?
        LIMIT 1";
    $exec = new SQL($query, [$productId]);
    return $exec->Execute(false);
}

function Orders_addOrder(string $first, string $last, string $email, string $phone) {
    $query = "INSERT INTO orders (id, first, last, email, phone) 
    VALUES (NULL, ?, ?, ?, ?);";
    $exec = new SQL($query, [$first, $last, $email, $phone]);
    return $exec->Execute(false);
}

?>