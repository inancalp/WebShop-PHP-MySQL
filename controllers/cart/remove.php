<?php


if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
    abort(404);
}

if(!isset($_SESSION['user'])){
    header("Location: /login");
    exit();
}

$requested_quantity = -$requested_quantity;
removeProductFromCart($product_id);
// dbUpdateAmountLeft($product, $requested_quantity);


