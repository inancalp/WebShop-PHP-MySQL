<?php
include_once('server/users.php');
include_once('server/addresses.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])){   

        $pwd = htmlspecialchars($_POST['pwd']);
        $email = htmlspecialchars($_POST['email']);
        $user = UsersDB::getUser($email);
        



        if(!$user || !password_verify($pwd, $user['pwd'])){
            $_SESSION['errors']['login'] = "User could not be validated.";
        }

        if($user['account_status'] == "inactive"){
            $_SESSION['errors']['login'] = "User account status: Inactive.";
        }

        if(isset($_SESSION['errors'])) {
            $_SESSION['inputs'] = [
                'email' => $user['email']
            ];

            header("Location: /login");
            exit();
        } 

        
        $address = AddressesDB::getAddress($user['address_id']);

    
        
        $_SESSION['user'] = $user ? $user : "";
        $_SESSION['user']['address'] = $address;

        // dd($_SESSION);
        header("Location: /");
        exit();
    }
}


if($_SERVER["REQUEST_METHOD"] == "GET"){

    if(isset($_SESSION['user'])){
        header("Location: /");
        exit();
    }

    require_once("views/login.view.php");
    exit();
}