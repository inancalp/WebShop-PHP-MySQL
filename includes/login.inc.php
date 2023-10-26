<?php

// checking the request method
// (!) later on make a routes.php file and add the condition there.
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("Location: ../index.php");
    die();
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_contr.inc.php';
        require_once 'login_model.inc.php';



        // ERROR HANDLERS
        $errors = [];


        // (!) seperate it into individual parts
        if(is_input_empty($username, $password)){
            $errors['empty_input'] = "Fill in all fields!";
        }

        // pdo @ require_once 'dbh.inc.php';
        $result = get_user($pdo, $username);


        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login information!";
        } 

        // or result["pwd"] (?)
        if(!is_username_wrong($result) && is_password_wrong($password, $result["pwd"])) {
            $errors["login_incorrect"] = "
                Incorrect login information! <br> 
                \$result[\"pwd\"]: " . $result["pwd"] . " <br>
                \$password: " . $password . " <br>
            " . password_verify($password, $result["pwd"]);
        }


        // FILE INCLUDE A SAFER WAY TO START SESSION.
        require_once 'config_session.inc.php';

        if(!empty($errors)){

            $_SESSION['errors_login'] = $errors;

            header("Location: ../index.php");
            die();
         }
        

         $new_session_id = session_create_id();
         $session_id = $new_session_id . "_" . $result["id"];
         session_id($session_id);


         $_SESSION['user_id'] = $result['id'];
         $_SESSION['user_username'] = htmlspecialchars($result['username']);

         $_SESSION['last_regeneration'] = time();

         header('Location: ../index.php?login=success');
         $pdo = null;
         $stmt = null;

         die();

    } 
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}