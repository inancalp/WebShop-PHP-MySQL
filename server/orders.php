<?php

include_once "server/connection.php";

class OrdersDB {

    static function createOrder($order) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("INSERT INTO orders (payment_id, user_id, order_date, order_status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param(
            "iiss",
            $order['payment_id'],
            $order['user_id'],
            $order['order_date'],
            $order['order_status']
        );
        $stmt->execute();
    
        //fetch order_id for further use if needed
        $order_id = $connection->insert_id;
    
        $stmt->close();
        $connection->close();
    
        return $order_id ? $order_id : false;
    }
    

    static function createOrderProducts($order_id, $product) {
        $connection = ConnectionDB::getConnection();
        
        // dd(['$product' => $product, '$order_id' => $order_id]);
        $stmt = $connection->prepare("INSERT INTO orders_products (order_id, product_id, product_amount, subtotal) VALUES (?, ?, ?, ?)");
        $stmt->bind_param(
            "iiid",
            $order_id,
            $product['product_id'],
            $product['quantity'],
            $product['subtotal']
        );
        $stmt->execute();
        $order_products_id = $connection->insert_id;
        $stmt->close();
        $connection->close();
        return $order_products_id ? $order_products_id : false;
    }
    

    static function getOrders($user_id) {
        $connection = ConnectionDB::getConnection();

        $stmt = $connection->prepare("SELECT * FROM orders WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $orders = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        $connection->close();

        return $orders;
    }


    static function getPayment($payment_id) {
        $connection = ConnectionDB::getConnection();

        $stmt = $connection->prepare("SELECT * FROM payments WHERE payment_id = ?");
        $stmt->bind_param("i", $payment_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $payment = $result->fetch_assoc();

        $stmt->close();
        $connection->close();

        return $payment;
    }



    static function getOrdersProducts($order_id) {
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->prepare("SELECT * FROM orders_products WHERE order_id = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $order_products = [];
    
        while ($row = $result->fetch_assoc()) {
            $order_products[] = $row;
        }
    
        $stmt->close();
        $connection->close();
    
        return $order_products;
    }
    
}

