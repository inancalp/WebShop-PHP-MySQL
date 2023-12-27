<?php

include_once("server/users.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
            // dd($_POST);
        if(isset($_POST['inactivate'])){
            $user_id = htmlspecialchars($_POST['user_id']);
            $result = UsersDB::updateUserAccountStatus($user_id, "inactive");
            if(!$result) {
                dd("SOMETHING WENT WRONG UPDATING USER'S ACCOUNT STATUS TO INACTIVE");
            }

        }

        if(isset($_POST['activate'])){
            $user_id = htmlspecialchars($_POST['user_id']);
            $result = UsersDB::updateUserAccountStatus($user_id, "active");
            if(!$result) {
                dd("SOMETHING WENT WRONG UPDATING USER'S ACCOUNT STATUS TO ACTIVE");
            }
        }

        if(isset($_POST['set_admin'])){
            $user_id = htmlspecialchars($_POST['user_id']);
            $result = UsersDB::updateUserType($user_id, "admin");
            if(!$result) {
                dd("SOMETHING WENT WRONG UPDATING USER TYPE TO ADMIN");
            }
        }

        if(isset($_POST['set_user'])){
            $user_id = htmlspecialchars($_POST['user_id']);
            $result = UsersDB::updateUserType($user_id, "user");
            if(!$result) {
                dd("SOMETHING WENT WRONG UPDATING USER TYPE TO USER");
            }
        }


        header("Location: /users");
        exit();
    }
}

abort(404);