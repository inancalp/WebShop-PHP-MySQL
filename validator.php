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

}