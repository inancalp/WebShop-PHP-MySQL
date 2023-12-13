<?php

function getProduct($product_id) {

    include_once "server/connection.php";
    $connection = getConnection();

    // Function logic goes here
    $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();

    
    $stmt->close();
    $connection->close();

    return $product;
}



function getCategory($product) {
    include_once "server/connection.php";
    $connection = getConnection();

    $stmt = $connection->prepare("SELECT * FROM categories WHERE category_id = " . $product['category_id']);
    $stmt->execute();
    $category = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    $connection->close();

    return $category;
}
