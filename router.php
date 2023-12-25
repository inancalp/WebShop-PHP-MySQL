<?php



// Simple Router
// (.) Seperates query from path.
// EX: "product?product_id=3" => "product" == path
// See product.controller.php for query example.
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    "/" => "controllers/home.controller.php",
    "/cart" => "controllers/cart/main.php",
    "/checkout" => "controllers/checkout.controller.php",
    "/user-settings" => "controllers/user.controller.php",
    "/login" => "views/login.view.php",
    "/login/create" => "controllers/login.controller.php",
    "/register" => "views/register.view.php",
    "/register/create" => "controllers/register.controller.php",
    "/products/show" => "controllers/product/show.php",
    "/cart/add" => "controllers/cart/add.php",
    "/logout" => "controllers/logout.controller.php"
];

if(array_key_exists($uri, $routes)){
    require_once($routes[$uri]);
}
else {
    $status_code = 404;
    http_response_code($status_code);
    view("views/abort.view.php", [
        "status_code" => $status_code
    ]);
}
