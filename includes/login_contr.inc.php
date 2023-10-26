<?php 

declare(strict_types=1);


// if user is found it is an array; else it's a boolean:false
function is_username_wrong(bool|array $result) {

    // if result is false
    if(!$result){
        return true;
    }
    else {
        return false;
    }
}


// if user is found it is an array; else it's a boolean:false
function is_password_wrong(string $password, string $hashed_password) {
    
    // if password can't be verified
    if(!password_verify($password, $hashed_password)){
        return true;
    }
    else {
        return false;
    }
}


function is_input_empty(string $username, string $password) {
    if(empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}
