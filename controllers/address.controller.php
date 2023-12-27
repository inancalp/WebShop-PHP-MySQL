<?php
include_once('server/addresses.php');
include_once('server/users.php');
include_once('validator.php');

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
        // dd($_SESSION['user']['address_id']);
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
        dd("CHECK DB ADRESSES");
        exit();

    }
}

abort(404);