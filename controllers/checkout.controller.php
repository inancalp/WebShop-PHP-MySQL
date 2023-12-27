<?php

include_once('server/payments.php');
include_once('server/orders.php');
include_once('server/products.php');


if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
    abort(404);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // dd($_SESSION);
    if(isset($_POST['checkout'])){

        if(isCartEmpty()){
            header("Location: /");
            exit();
        }

        if(empty($_SESSION['user']['address'])){
            $_SESSION['errors']['address'] = "Please enter an address before the Check-Out.";
        }

        foreach($_SESSION['cart'] as $product){
            $productDB = ProductsDB::getProduct($product['product_id']);
            if($productDB['amount_left'] < $product['quantity']){
                $_SESSION['errors']['amount_left'][$product['product_id']] = "Requested amount for the product: ". $product['name'] . " is not available. Try amount: " . $productDB['amount_left'] . " or below.";
            }
        }

        if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            header("Location: /cart");
            exit();
        }

        foreach($_SESSION['cart'] as $product){
            $productDB = ProductsDB::getProduct($product['product_id']);
            $amount_left = $productDB['amount_left'] - $product['quantity'];
            $result = ProductsDB::updateAmountLeft($product['product_id'], $amount_left);
            if(!$result) {
                dd("SOMETHING WENT WRONG WHILE >> ProductsDB::updateAmountLeft");
            }
        }


        $payment['total_price'] = number_format(calculateTotalPrice(), 2);
        $payment['status'] = "paid";
        $payment['date'] = date_create()->format("Y-m-d H:i:s");
        $payment_id = PaymentsDB::createPayment($payment);
        if(!$payment_id) {
            dd("Something went wrong with Payment");
        }

        $order['payment_id'] = $payment_id;
        $order['user_id'] = $_SESSION['user']['user_id'];
        $order['order_date'] = date_create()->format("Y-m-d H:i:s");
        $order['order_status'] = "pending";
        $order_id = OrdersDB::createOrder($order);
        if(!$order_id) {
            dd("Something went wrong with Order");
        }

        foreach($_SESSION['cart'] as $product) {
            $product['subtotal'] = calculateSubtotal($product);
            $order_products_id = OrdersDB::createOrderProducts($order_id, $product);
            if(!$order_products_id){
                dd("Something went wrong with Fetching products into an order.");
            }
        }

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


function dbUpdateAmountLeft($product, $requested_quantity) {

    $amount_left = intval($product['amount_left']) - intval($requested_quantity);
    $product_id = $product['product_id'];
    ProductsDB::updateAmountLeft($product_id, $amount_left);
}