<?php 
include('server/products.php');

if(!isset(parse_url($_SERVER['REQUEST_URI'])['query'])){
    abort(404);
}
$query = parse_url($_SERVER['REQUEST_URI'])['query'];

parse_str($query, $query_parameters);

// dd($query_parameters);

$product_id = htmlspecialchars($query_parameters['product_id']);

if(!isset($product_id)) {
    header("location: index.php");
} 
else {
    $product = ProductsDB::getProduct($product_id);

    
    if(!$product || $product['is_active'] == 0) {
        abort(404);
    }

    $category = ProductsDB::getCategory($product);


    view("views/product.view.php", [
        "product" => $product,
        "category" => $category
    ]);
}