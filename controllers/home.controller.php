<?php

require_once('server/products.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    dd($_POST);
}


view("views/home.view.php",[
    "products" => ProductsDB::getProducts()
]);