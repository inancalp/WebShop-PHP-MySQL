<?php

include_once "server/connection.php";
include_once "functions.php";

class User {
    private $id;
    private $email;
    private $passwordHash;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->setPassword($password);
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

    public function setPassword($password) {
        $this->passwordHash = password_hash($password, PASSWORD_BCRYPT);
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->passwordHash);
    }

    public function setId($user_id) {
        $this->id = $user_id;
    }
}

class UserModel {
    private $db;

    public function __construct() {
        $this->db = ConnectionDB::getConnection();
    }

    public function saveUser(User $user) {
        $stmt = $this->db->prepare("INSERT INTO users (email, pwd) VALUES (?, ?)");

        $email = $user->getEmail();
        $pwd = $user->getPasswordHash();

        $stmt->bind_param("ss", $email, $pwd);
        $stmt->execute();

        //(!) check if there is a better solution.
        $user_id = $stmt->insert_id;
        $stmt->close();
        $user->setId($user_id);
        // dd($user);
        return $user;
    }
    

    public function getUserById($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();
            $user = new User($userData['email'], $userData['password']);
            $user->setId($userData['user_id']);

            return $user;
        } 
        else {
            return null;
        }
    }

}
