<?php

function getProducts() {
    include_once "server/connection.php";
    $connection = getConnection();

    $stmt = $connection->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->get_result();

    $stmt->close();
    $connection->close();

    return $products;
}