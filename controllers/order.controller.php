<?php

include_once('server/orders.php');
include_once('server/products.php');


if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
    abort(404);
}

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_SESSION['user'])){
    $orders = OrdersDB::getOrders($_SESSION['user']['user_id']);

    for($i = 0; $i < count($orders); $i++){
        $orders[$i]['payment'] = OrdersDB::getPayment($orders[$i]['payment_id']);
    }

    for($i = 0; $i < count($orders); $i++){
        $orders[$i]['orders_products'] = OrdersDB::getOrdersProducts($orders[$i]['order_id']);
    }
    
    for($i = 0; $i < count($orders); $i++){
        for($j = 0; $j < count($orders[$i]['orders_products']); $j++){
            $orders[$i]['products'][$j] = ProductsDB::getProduct($orders[$i]['orders_products'][$j]['product_id']);
        }
    }
    include("views/orders.view.php");
    exit();
}

abort(404);