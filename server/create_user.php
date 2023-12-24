<?php

include_once "server/connection.php";

function createUserDB($email, $pwd_hashed) {
    $connection = ConnectionDB::getConnection();

    $stmt = $connection->prepare("INSERT INTO users (email, pwd) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $pwd_hashed);
    $stmt->execute();

    //fetch user_id for the session
    $user_id = $connection->insert_id;

    $stmt->close();
    $connection->close();

    return $user_id;
}