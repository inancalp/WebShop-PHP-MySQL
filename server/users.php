<?php

include_once "server/connection.php";

class UsersDB {
    static function getUser($email) {
        $connection = ConnectionDB::getConnection();
        
        $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
    
        $stmt->close();
        $connection->close();
    
        return !empty($user) ? $user : false;
    }


    static function createUser($user) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("INSERT INTO users (user_type, account_status, first_name, last_name, birth_date, email, pwd) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssssss",
            $user['user_type'],
            $user['account_status'],
            $user['first_name'],
            $user['last_name'],
            $user['birth_date'],
            $user['email'],
            $user['pwd'],
        );
        $stmt->execute();
    
        //fetch user_id for the session
        $user_id = $connection->insert_id;
    
        $stmt->close();
        $connection->close();
    
        return $user_id ? $user_id : false;
    }
}

