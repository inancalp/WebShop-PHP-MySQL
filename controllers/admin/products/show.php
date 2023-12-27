<?php

include_once("server/products.php");

if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){

    $products = ProductsDB::getProducts();

    view("views/admin/products/show.view.php", [
        'products' => $products
    ]);
    exit();
}

abort(404);