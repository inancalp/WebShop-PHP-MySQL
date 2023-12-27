<?php

include_once "server/connection.php";

class PaymentsDB {

    static function createPayment($payment) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("INSERT INTO payments (total_price, payment_status, payment_date) VALUES (?, ?, ?)");
        $stmt->bind_param(
            "sss",
            $payment['total_price'],
            $payment['status'],
            $payment['date']
        );
        $stmt->execute();
    
        // Fetch payment_id for further use if needed
        $payment_id = $connection->insert_id;
    
        $stmt->close();
        $connection->close();
    
        return $payment_id ? $payment_id : false;
    }
    

}

