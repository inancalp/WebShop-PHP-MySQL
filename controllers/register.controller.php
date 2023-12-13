<?php

include_once "models/user.model.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // if register clicked @register.view.php
    if(isset($_POST["register"])){
        
        $email = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['pwd']);
        $pwd_hashed = password_hash($pwd, PASSWORD_BCRYPT);

        $user = new User($email, $pwd_hashed);
        $user_model = new UserModel();
        $user = $user_model->saveUser($user);

        fetchUserSession($user);
        navigateToCart();
    }

    // (!)change logic later
    navigateToHome();
}



function isEmailInUse() {
    //
    return false;
}

// returns class instances
// function createUser() {
//     $email = htmlspecialchars($_POST['email']);
//     $pwd = htmlspecialchars($_POST['pwd']);
//     $pwd_hashed = password_hash($pwd, PASSWORD_BCRYPT);

//     include("server/create_user.php");
//     $user_id = createUserDB($email, $pwd_hashed);

//     return $user_id;
// }

function navigateToCart() {
    dd($_SESSION);
    header("Location: cart");
    exit;
}

function navigateToHome() {
    header("Location: /");
    exit;
}

function fetchUserSession($user) {
    $_SESSION['user_id'] = $user->getId();
    $_SESSION['user_email'] = $user->getEmail();
    
}