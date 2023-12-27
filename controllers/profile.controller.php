<?php


if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin"){
    abort(404);
}

// if authenticated user or admin is trying to reach for it's own profile:
if(isset($_GET['user_id']) && isset($_SESSION['user'])){
    if($_GET['user_id'] == $_SESSION['user']['user_id'] || $_SESSION['user']['user_type'] == 'admin'){
        
        require_once("views/profile.view.php");
        exit();
    }
}

abort(404);