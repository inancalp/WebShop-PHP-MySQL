<?php 

// (.) seperates query from path, then grabs query.
$query = parse_url($_SERVER['REQUEST_URI'])['query'];

// (.) seperates query to "key => value".
parse_str($query, $query_parameters);

// dd($query_parameters);

// (.) sanitize the value.
$product_id = htmlspecialchars($query_parameters['product_id']);


// dd(getcwd());
// go back index.php if no product id retrieved.
if(!isset($product_id)){
    header("location: index.php");
} else {
    include('server/get_product.php');  // $product & $category comes here.
    
    $product = getProduct($product_id);
    $category = getCategory($product);

    include('views/product.view.php');
}


