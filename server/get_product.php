<?php

include('connection.php');


//$product
// $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = ?");
// $stmt->bind_param("i", $product_id);
// $stmt->execute();
// $product = $stmt->get_result()->fetch_assoc();


// //$category
// $stmt = $connection->prepare("SELECT * FROM categories WHERE category_id = " . $product['category_id']);
// $stmt->execute();
// $category = $stmt->get_result()->fetch_assoc();


// $stmt->close();
// $connection->close();


function getProduct($product_id) {

    
    include('connection.php');

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
    include('connection.php');

    $stmt = $connection->prepare("SELECT * FROM categories WHERE category_id = " . $product['category_id']);
    $stmt->execute();
    $category = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    $connection->close();

    return $category;
}
