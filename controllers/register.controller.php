<?php
include_once('server/users.php');
include_once('validator.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["register"])){   

        $pwd = htmlspecialchars($_POST['pwd']);
        $retype_pwd = htmlspecialchars($_POST['retype_pwd']);
        $user = [
            'user_type' => 'user',
            'account_status' => 'active',
            'first_name' => htmlspecialchars($_POST['first_name']),
            'last_name' => htmlspecialchars($_POST['last_name']),
            'birth_date' => htmlspecialchars($_POST['birth_date']),
            'email' => htmlspecialchars($_POST['email']),
            'pwd' => password_hash($pwd, PASSWORD_BCRYPT)
        ];
        

        if(!Validator::email($user['email'])){
            $_SESSION['errors']['email'] = "Invalid Email.";
        }

        if(!Validator::pwd($pwd)){
            $_SESSION['errors']['pwd'] = "Password should include at least 8 characters.";
        }

        if(!Validator::retype_pwd($pwd, $retype_pwd)){
            $_SESSION['errors']['retype_pwd'] = "Retyped Password did not match the original.";
        }


        

        // dd($user);
        $user_exist = UsersDB::getUser($user['email']);

        if($user_exist){
            $_SESSION['errors']['email'] = "Email already in use.";
        }

        if(isset($_SESSION['errors'])) {
            $_SESSION['inputs'] = [
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'birth_date' => $user['birth_date'],
                'email' => $user['email'],
            ];

            header("Location: /register");
            exit();
        }

        $user_id = UsersDB::createUser($user); 
        if(!$user_id){
            dd("USER COULDN'T CREATED.");
        }

        $_SESSION['user'] = $user;
        header("Location: /");
        exit();
    }
}



