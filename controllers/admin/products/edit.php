<?php

include_once("server/products.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
    
        if(isset($_POST['inactivate'])){
            $product_id = htmlspecialchars($_POST['product_id']);
            $result = ProductsDB::updateProductStatus($product_id, 0);
            if(!$result) {
                dd("SOMETHING WENT WRONG UPDATING PRODUCT STATUS TO INACTIVE");
            }

        }

        if(isset($_POST['activate'])){
            $product_id = htmlspecialchars($_POST['product_id']);
            $result = ProductsDB::updateProductStatus($product_id, 1);
            if(!$result) {
                dd("SOMETHING WENT WRONG UPDATING PRODUCT STATUS TO ACTIVE");
            }
        }

        if(isset($_POST['edit_amount'])){
            $product_id = htmlspecialchars($_POST['product_id']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $result = ProductsDB::updateAmountLeft($product_id, $quantity);
            if(!$result) {
                dd("SOMETHING WENT WRONG UPDATING PRODUCT STATUS TO ACTIVE");
            }
        }

        header("Location: /products");
        exit();
    }
}

abort(404);