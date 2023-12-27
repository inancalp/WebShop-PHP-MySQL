<?php

include_once("server/products.php");
include_once("validator.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
    
        if(isset($_POST['add_product'])){

            $product['product_name'] = htmlspecialchars($_POST['product_name']);
            $product['product_category'] = htmlspecialchars($_POST['product_category']);
            $product['product_price'] = htmlspecialchars($_POST['product_price']);
            $product['product_quantity'] = htmlspecialchars($_POST['product_quantity']);
            $product['is_active'] = 1;
            $product['product_image'] = htmlspecialchars($_POST['product_image']);


            if(!Validator::productName($product['product_name'])){
                $_SESSION['errors']['product_name'] = "Product Name should be at least 1 character.";
            }
            if(!Validator::productCategory($product['product_category'])){
                $_SESSION['errors']['product_category'] = "Product Category should be at least 1 character.";
            }
            if(!Validator::productPrice($product['product_price'])){
                $_SESSION['errors']['product_price'] = "Product Price should be higher than nothing.";
            }
            if(!Validator::productQuantity($product['product_quantity'])){
                $_SESSION['errors']['product_quantity'] = "Product Quantity should be higher than nothing.";
            }
            if(!Validator::productImage($product['product_image'])){
                $_SESSION['errors']['product_image'] = "Product image should follow name convention: (productName).(jpg, jpeg, png)";
            }


            if(isset($_SESSION['errors'])) {
                $_SESSION['inputs'] = [
                    'product_name' => $product['product_name'],
                    'product_category' => $product['product_category'],
                    'product_price' => $product['product_price'],
                    'product_quantity' => $product['product_quantity'],
                    'is_active' => $product['is_active'],
                    'product_image' => $product['product_image'],
                ];
    
                header("Location: /products/create");
                exit();
            }

            ProductsDB::addProduct($product);

            header("Location: /products/create");
            exit();
        }

    }
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
        include_once("views/admin/products/create.view.php");
        exit();
    }
}

abort(404);