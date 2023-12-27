<?php

include_once('server/orders.php');

if($_SERVER['REQUEST_METHOD'] == "GET"){



    $orders = OrdersDB::getOrders($_SESSION['user']['user_id']);
    
    // will use:
        // $orders['order_date']
        // $orders['order_status']





    $payments = [];
    for($i = 0; $i < count($orders); $i++){
        $payments[$i] = OrdersDB::getPayment($orders[$i]['payment_id']);
    }

    // will use:
        // $payments['payment_status']
        // $payments['total_price']



    // will use:
        // $products['name']

    

    





    include("views/orders.view.php");
    exit();
    // dd(['orders' => $orders, 'payments' => $payments]);
}

abort(404);