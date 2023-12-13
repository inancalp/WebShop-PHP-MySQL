<?php

function getProducts() {
    include('connection.php');

    $stmt = $connection->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->get_result();

    $stmt->close();
    $connection->close();

    return $products;
}