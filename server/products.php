<?php

include_once "server/connection.php";

class ProductsDB {
    
    static function addProduct($product) {
        $connection = ConnectionDB::getConnection();
    
        // Check if the category exists
        $category_id = self::getCategoryIdByName($product['product_category']);
    
        // If the category does not exist, add it
        if (!$category_id) {
            $category_id = self::addCategory($product['product_category']);
        }
    
        $stmt = $connection->prepare("INSERT INTO products (category_id, name, price, amount_left, is_active, product_image) VALUES (?, ?, ?, ?, ?, ?)");
        
        // Assuming $product is an associative array containing product information
        $stmt->bind_param("isdiis", $category_id, $product['product_name'], $product['product_price'], $product['product_quantity'], $product['is_active'], $product['product_image']);
    
        $stmt->execute();
        $stmt->close();
        $connection->close();
    }
    
    static function getCategoryIdByName($category_name) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("SELECT category_id FROM categories WHERE name = ?");
        $stmt->bind_param("s", $category_name);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $category_id = $row['category_id'];
        } else {
            $category_id = false;
        }
    
        $stmt->close();
        $connection->close();
    
        return $category_id;
    }
    
    static function addCategory($category_name) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $category_name);
        $stmt->execute();
    
        // Get the ID of the newly added category
        $category_id = $stmt->insert_id;
    
        $stmt->close();
        $connection->close();
    
        return $category_id;
    }

    









    static function getProductsLike($input) {
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->prepare("SELECT * FROM products WHERE `name` LIKE ?");
        $wild_card = '%' . $input . '%';
        $stmt->bind_param("s", $wild_card);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        
    
        $stmt->close();
        $connection->close();
    
        return $products;
    }
    
    

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
        $success = $stmt->execute();
    
        $stmt->close();
        $connection->close();
    
        return $success;
    }


    static function updateProductStatus($product_id, $status){
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("UPDATE products SET is_active=? WHERE product_id=?");
        $stmt->bind_param("ii", $status, $product_id);
        
        $stmt->execute();
        $rowsAffected = $stmt->affected_rows;
    
        $stmt->close();
        $connection->close();
    
        return $rowsAffected ? true : false;
    }
}