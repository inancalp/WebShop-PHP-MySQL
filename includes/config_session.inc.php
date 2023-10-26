<?php

// (!) STUDY THIS PAGE



// check what's these for:
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);


session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,
]);

session_start();


// if user is logged in to the website:
if (isset($_SESSION['user_id'])) {
    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id_loggedin();
    } 
    else {
        $interval = 60 * 30;
        if(time() - $_SESSION['last_regeneration'] >= $interval){
            regenerate_session_id_loggedin();
        }
    }
}
// if user is not logged in to the website:
else {
    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id();
    } 
    else {
        $interval = 60 * 30;
        if(time() - $_SESSION['last_regeneration'] >= $interval){
            session_regenerate_id();
        }
    }
}



function  regenerate_session_id_loggedin() {
    session_regenerate_id(true);
   
    $new_session_id = session_create_id();

    $user_id = $_SESSION['user_id'];
    $session_id = $new_session_id . "_" . $user_id;
    session_id($session_id);
    
    $_SESSION['last_regeneration'] = time();
}


function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

