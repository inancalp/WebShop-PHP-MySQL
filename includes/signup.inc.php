<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS

        $errors = [];

        if(is_input_empty($username, $email, $password)){
            $errors['empty_input'] = "Fill in all fields!";
        }

        if(is_email_invalid($email)){
            $errors['invalid_email'] = "Invalid Email used!";
        }

        if(is_username_taken($pdo, $username)){
            $errors['username_taken'] = "Username already taken!";
        }

        if(is_email_registered($pdo, $email)){
            $errors['email_used'] = "Email already registered!";
        }


        // FILE INCLUDE A SAFER WAY TO START SESSION.
        require_once 'config_session.inc.php';

        if(!empty($errors)){

            $_SESSION['errors_signup'] = $errors;


            //signupData for to autofill correct parts
            $signupData = [
                "username" => $username,
                "email" => $email
            ];

            $_SESSION['signupData'] = $signupData;

            header("Location: ../index.php");
            die();
        } else {

            create_user($pdo, $username, $password, $email);
            
            header("Location: ../index.php?signup=success");
            
            $pdo = null;
            $stmt = null;

            die();
        }


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {

    header("Location: ../index.php");
    // just to be sure to stop execution.
    die();
}