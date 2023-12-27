<?php
include_once('server/products.php');
include_once('functions.php');

if(isset($_POST['input'])){
    $input = htmlspecialchars($_POST['input']);

    if($input == ""){
        $input = "%";
    }
    $products = ProductsDB::getProductsLike($input);


    view("views/home.view.php",[
        "products" => $products
    ]);

    exit();
}

