<?php
include_once('server/addresses.php');
include_once('server/users.php');
include_once('validator.php');

if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
    // abort(404);
    dd("Here?");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['save_address'])) {
        $address['country'] = htmlspecialchars($_POST['country']);
        $address['street'] = htmlspecialchars($_POST['street']);
        $address['house_number'] = htmlspecialchars($_POST['house_number']);
        $address['bus_number'] = htmlspecialchars($_POST['bus_number']);
        $address['city'] = htmlspecialchars($_POST['city']);
        $address['zip_code'] = htmlspecialchars($_POST['zip_code']);
        $address['address_description'] = htmlspecialchars($_POST['address_description']);

        // validations later.
        if(!Validator::addressCheck($address['country'])){
            $_SESSION['errors']['address']['country'] = "Country Invalid.";
        }
        if(!Validator::addressCheck($address['street'])){
            $_SESSION['errors']['address']['street'] = "Street Invalid.";
        }
        if(!Validator::addressCheck($address['house_number'])){
            $_SESSION['errors']['address']['house_number'] = "House Number Invalid.";
        }
        if(!Validator::addressCheck($address['bus_number'])){
            $_SESSION['errors']['address']['bus_number'] = "Bus Number Invalid.";
        }
        if(!Validator::addressCheck($address['city'])){
            $_SESSION['errors']['address']['city'] = "City Invalid.";
        }
        if(!Validator::addressCheck($address['zip_code'])){
            $_SESSION['errors']['address']['zip_code'] = "ZIP Code Invalid.";
        }


        if(isset($_SESSION['errors'])) {
            $_SESSION['inputs'] = [
                'country' => $address['country'],
                'street' => $address['street'],
                'house_number' => $address['house_number'],
                'bus_number' => $address['bus_number'],
                'city' => $address['city'],
                'zip_code' => $address['zip_code'],
                'address_description' => $address['address_description'],
            ];

            header("Location: /profile?user_id=" . $_SESSION['user']['user_id']);
            exit();
        }


        if(empty($_SESSION['user']['address_id'])){

            $address_id = AddressesDB::createAddress($address);
            if($address_id){
                UsersDB::updateUserAddressId($_SESSION['user']['user_id'], $address_id);
                $_SESSION['user']['address_id'] = $address_id;
            }
            else{
                dd("Address could not be Created!");
            }
        }
        else {
            AddressesDB::updateAddress($_SESSION['user']['address_id'], $address);
        }
        $_SESSION['user']['address'] = $address;
        
        
        
        header("Location: /profile?user_id=" . $_SESSION['user']['user_id']);
        exit();

    }
}

abort(404);