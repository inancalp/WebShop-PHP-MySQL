<?php

include_once "server/connection.php";

class ProductsDB {

    static function getProducts() {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->get_result();
    
        $stmt->close();
        $connection->close();
    
        return $products;
    }
    
    
    static function getProduct($product_id) {
        $connection = ConnectionDB::getConnection();
    
        // Function logic goes here
        $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $product = $stmt->get_result()->fetch_assoc();
    
        
        $stmt->close();
        $connection->close();
    
        return $product;
    }
    
    
    
    static function getCategory($product) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("SELECT * FROM categories WHERE category_id = " . $product['category_id']);
        $stmt->execute();
        $category = $stmt->get_result()->fetch_assoc();
    
        $stmt->close();
        $connection->close();
    
        return $category;
    }
    
    
    static function updateAmountLeft($product_id, $amount_left) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("UPDATE products SET amount_left = ? WHERE product_id = ?");
        $stmt->bind_param("ii", $amount_left, $product_id);
        $stmt->execute();
    
        $stmt->close();
        $connection->close();
    
    }
}