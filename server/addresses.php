<?php

include_once "server/connection.php";


class AddressesDB {
    static function createAddress($address) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("INSERT INTO addresses (country, city, zip_code, street, house_number, bus_number, address_description) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssssss",
            $address['country'],
            $address['city'],
            $address['zip_code'],
            $address['street'],
            $address['house_number'],
            $address['bus_number'],
            $address['address_description']
        );
        $stmt->execute();
        $address_id = $connection->insert_id;
    
        $stmt->close();
        $connection->close();
    
        return $address_id ? $address_id : false;
    }



    static function updateAddress($address_id, $address) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("UPDATE addresses SET country=?, city=?, zip_code=?, street=?, house_number=?, bus_number=?, address_description=? WHERE address_id=?");
        $stmt->bind_param(
            "sssssssi",
            $address['country'],
            $address['city'],
            $address['zip_code'],
            $address['street'],
            $address['house_number'],
            $address['bus_number'],
            $address['address_description'],
            $address_id
        );
        
        $stmt->execute();
        $rows_affected = $stmt->affected_rows;
    
        $stmt->close();
        $connection->close();
    
        return $rows_affected ? true : false;
    }
    
    static function getAddress($address_id) {
        $connection = ConnectionDB::getConnection();
    
        $stmt = $connection->prepare("SELECT * FROM addresses WHERE address_id = ?");
        $stmt->bind_param("i", $address_id);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $address = $result->fetch_assoc();
    
        $stmt->close();
        $connection->close();
    
        return $address ? $address : false;
    }
}

