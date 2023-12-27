<?php

include('server/payments.php');
include('server/orders.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // CHECKOUT BUTTON CLICKED:
    if(isset($_POST['checkout'])){

        //user's information and addresses etc.
        if(isCartEmpty()){
            header("Location: /");
            exit();
        }

        if(empty($_SESSION['user']['address'])){
            $_SESSION['errors']['address'] = "Please enter an address before the Check-Out.";
            header("Location: /cart");
            exit();
        }

        // dd($_SESSION);
        // PAYMENT
        $payment['total_price'] = number_format(calculateTotalPrice(), 2);
        $payment['status'] = "paid";
        $payment['date'] = date_create()->format("Y-m-d H:i:s");
        $payment_id = PaymentsDB::createPayment($payment);
        if(!$payment_id) {
            dd("Something went wrong with Payment");
        }

        // ORDER
        $order['payment_id'] = $payment_id;
        $order['user_id'] = $_SESSION['user']['user_id'];
        $order['order_date'] = date_create()->format("Y-m-d H:i:s");
        $order['order_status'] = "pending";
        $order_id = OrdersDB::createOrder($order);
        if(!$order_id) {
            dd("Something went wrong with Order");
        }

        foreach($_SESSION['cart'] as $product) {
            $order_products_id = OrdersDB::createOrderProducts($order_id, $product);
            // dd($order_products_id);
            if(!$order_products_id){
                dd("Something went wrong with Fetching products into an order.");
            }
        }

        // dd($debug);


        unset($_SESSION['cart']);
        $payment = [];
        $order = [];

        header("Location: /orders");
    }
}


function isCartEmpty() {
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
        return false;
    }
    return true;
}

function calculateSubtotal($product) {
    return floatval($product['quantity']) * floatval($product['price']);  
}

function  calculateTotalPrice() {
    $total_price = 0;

    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $product){
            $total_price += floatval($product['price']) * intval($product['quantity']) ;
        }
    }

    $_SESSION['total_price'] = $total_price;
    return $total_price;
}