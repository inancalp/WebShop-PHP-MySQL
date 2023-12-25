<?php
include_once('server/users.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])){   

        $pwd = htmlspecialchars($_POST['pwd']);
        $email = htmlspecialchars($_POST['email']);
        $user = UsersDB::getUser($email);

        if(!$user || !password_verify($pwd, $user['pwd'])){
            $_SESSION['errors']['login'] = "User could not be validated.";
        }

        if(isset($_SESSION['errors'])) {
            $_SESSION['inputs'] = [
                'email' => $user['email']
            ];

            header("Location: /register");
            exit();
        } 

        $_SESSION['user'] = $user;
        header("Location: /");
        exit();
    }
}
