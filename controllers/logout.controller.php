<?php
include_once('server/users.php');
include_once('validator.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["logout"])){
        $_SESSION = [];
        session_destroy();

        header("Location: /");
        exit();
    }
}


