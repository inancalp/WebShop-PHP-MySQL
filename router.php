<?php



// Simple Router
// (.) Seperates query from path.
// EX: "product?product_id=3" => "product" == path
// See product.controller.php for query example.
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    "/" => "controllers/home.controller.php",
    "/product" => "controllers/product.controller.php",
    "/cart" => "controllers/cart.controller.php",
    "/checkout" => "controllers/checkout.controller.php",
    "/user-settings" => "controllers/user.controller.php",
    "/login" => "controllers/login.controller.php",
    "/register" => "controllers/register.controller.php"
];

if(array_key_exists($uri, $routes)){
    require($routes[$uri]);
}
else {
    $status_code = 404;
    http_response_code($status_code);
    dd("$status_code Not Found.");
}
