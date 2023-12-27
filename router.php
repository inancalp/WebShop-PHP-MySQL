<?php


// (.) Seperates query from path.
// EX: "product?product_id=3" => "product" == path
// See product.controller.php for query example.
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    "/" => "controllers/home.controller.php",
    "/login" => "controllers/login.controller.php",
    "/login/create" => "controllers/login.controller.php",
    "/register" => "controllers/register.controller.php",
    "/register/create" => "controllers/register.controller.php",
    "/products/show" => "controllers/product/show.php",
    "/cart" => "controllers/cart/main.php",
    "/cart/add" => "controllers/cart/add.php",
    "/checkout" => "controllers/checkout.controller.php",
    "/logout" => "controllers/logout.controller.php",
    "/profile" => "controllers/profile.controller.php",
    "/address/store" => "controllers/address.controller.php",
    "/orders" => "controllers/order.controller.php",
    "/ajax" => "controllers/ajax.controller.php",
    "/users" => "controllers/admin/users/show.php",
    "/users/edit" => "controllers/admin/users/edit.php",
    "/products" => "controllers/admin/products/show.php",
    "/products/create" => "controllers/admin/products/create.php",
    "/products/edit" => "controllers/admin/products/edit.php",
];

if(array_key_exists($uri, $routes)){
    require_once($routes[$uri]);
}
else {
    abort(404);
}
