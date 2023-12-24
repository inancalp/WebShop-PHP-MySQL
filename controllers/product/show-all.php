<?php
include('server/products.php');

view("views/home.view.php",[
    "products" => ProductsDB::getProducts()
]);