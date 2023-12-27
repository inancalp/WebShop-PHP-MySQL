<?php

include_once "server/connection.php";

class UsersDB {

    static function getUsers($user_id) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("SELECT * FROM users WHERE user_id != ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);
    
        $stmt->close();
        $connection->close();
    
        return $users;
    }
    

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

    static function updateUserAddressId($user_id, $address_id) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("UPDATE users SET address_id=? WHERE user_id=?");
        $stmt->bind_param("ii", $address_id, $user_id);
        
        $stmt->execute();
        $rowsAffected = $stmt->affected_rows;
    
        $stmt->close();
        $connection->close();
    
        return $rowsAffected ? true : false;
    }


    static function updateUserAccountStatus($user_id, $status) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("UPDATE users SET account_status=? WHERE user_id=?");
        $stmt->bind_param("si", $status, $user_id);
        
        $stmt->execute();
        $rowsAffected = $stmt->affected_rows;
    
        $stmt->close();
        $connection->close();
    
        return $rowsAffected ? true : false;
    }

    static function updateUserType($user_id, $type) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("UPDATE users SET user_type=? WHERE user_id=?");
        $stmt->bind_param("si", $type, $user_id);
        
        $stmt->execute();
        $rowsAffected = $stmt->affected_rows;
    
        $stmt->close();
        $connection->close();
    
        return $rowsAffected ? true : false;
    }

}

