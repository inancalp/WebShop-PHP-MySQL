<?php

class Validator {

    static $errors;

    static function email($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    static function pwd($pwd) {
        if (strlen($pwd) >= 8) {
            return true;
        } 
        return false;
    }

    static function retype_pwd($pwd, $retype_pwd) {
        if ($pwd == $retype_pwd) {
            return true;
        } 
        return false;
    }




    static function productName($product_name) {
        if (strlen($product_name) > 0) {
            return true;
        } 
        return false;
    }
    static function productCategory($product_category) {
        if (strlen($product_category) > 0) {
            return true;
        } 
        return false;
    }
    static function productPrice($product_price) {
        if ($product_price > 0) {
            return true;
        } 
        return false;
    }
    static function productQuantity($product_quantity) {
        if ($product_quantity > 0) {
            return true;
        } 
        return false;
    }

    static function productImage($product_image) {

        $pattern = '/^[a-zA-Z0-9_-]+\.(jpg|jpeg|png)$/i';
        // Check if the product image matches the pattern
        if (preg_match($pattern, $product_image)) {
            return true;
        }
    
        return false;
    }

    static function addressCheck($input) {
        if (strlen($input) > 0) {
            return true;
        } 
        return false;
    }


}