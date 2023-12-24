<?php

class ConnectionDB {

    static function getConnection(){
        $connection = mysqli_connect(
            "localhost",
            "root",
            "",
            "php-webshop"
        ) or die("Error: no connection can be made to the host");
    
        return $connection;
    }
}