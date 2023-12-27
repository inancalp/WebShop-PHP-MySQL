<?php

include_once("server/users.php");

if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){

    $users = UsersDB::getUsers($_SESSION['user']['user_id']);
    // dd($users);

    view("views/admin/users/show.view.php", [
        'users' => $users
    ]);
    exit();
}

abort(404);